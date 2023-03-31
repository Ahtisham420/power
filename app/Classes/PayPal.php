<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 28/05/2021
 * Time: 12:21 AM
 */

namespace App\Classes;


use App\Package;
use App\User;
use App\UserPackage;
use App\UserPayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PayPal
{
    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * PayPal constructor.
     */

    protected $access_token;
    protected $return_url;
    protected $cancel_url;
    protected $client_id;
    protected $secret;
    protected $url;
    protected $total;
    protected $sub_total;
    protected $package_id;
    protected $package_description;
    protected $tax;
    protected $shipping;
    protected $handling_fee;
    protected $shipping_discount;
    protected $insurance;
    protected $user_id;
    public $approval_url;
    public $invoice;

    public function __construct()
    {
        $nature = config("app.paypal_nature");
        if ($nature == "sandbox") {
            $this->url = config("app.paypal_sandbox_url");
        } else {
            $this->url = config("app.paypal_live_url");
        }
        $this->return_url = config("app.app_paypal_return_url");
        $this->cancel_url = config("app.app_paypal_cancel_url");
        $this->client_id = config("app.app_paypal_client_id");
        $this->secret = config("app.app_paypal_secret");
        $this->accessToken();
    }

    public function accessToken()
    {
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic ' . base64_encode($this->getClientId() . ":" . $this->getSecret()) // <---
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => $headers,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        $this->access_token = $response->access_token;
        return $this->access_token;
    }

    public function create(
        $user_id = 1,
        $package_id = 4,
        $sub_total = 100,
        $tax = 0,
        $shipping = 0,
        $handling_fee = 0,
        $shipping_discount = 0,
        $insurance = 0
    )
    {
        $this->user_id = $user_id;
        $this->insurance = $insurance;
        $this->shipping = $shipping;
        $this->shipping_discount = $shipping_discount;
        $this->handling_fee = $handling_fee;
        $this->tax = $tax;
        $this->total = ($sub_total + $tax + $shipping + $handling_fee + $insurance) - $shipping_discount;
        $this->sub_total = $sub_total;
        $this->package_id = $package_id;
        $this->invoice = Carbon::now()->timestamp;
        $package = Package::find($this->package_id);
        $user = User::find($this->user_id);
        $pkg_string = $package->name . "_" . $package->role . "_" . $package->id . "_" . $this->invoice;
        $pkg_small_string = $package->name . "_" . $package->id . "_" . $this->invoice;
        $headers = array(
            'Authorization: Bearer ' . $this->getAccessToken(),
            'Content-Type: application/json',
            'Cookie: enforce_policy=ccpa; cookie_check=yes; ui_experience=d_id%3D4fc9259809fd4db7ab200aa80012398d1622061736376; tsrce=unifiedloginnodeweb; x-pp-s=eyJ0IjoiMTYyMjA2MTczNjQyOSIsImwiOiIwIiwibSI6IjAifQ; ts=vreXpYrS%3D1716756134%26vteXpYrS%3D1622063534%26vr%3Daa69dbd21790a48f5b40d6a9fb9076d1%26vt%3Daa69dbd21790a48f5b40d6a9fb9076d0%26vtyp%3Dnew; ts_c=vr%3Daa69dbd21790a48f5b40d6a9fb9076d1%26vt%3Daa69dbd21790a48f5b40d6a9fb9076d0'
        );
        $obj = '{
        "intent": "sale",
              "payer": {
            "payment_method": "paypal"
              },
              "transactions": [{
            "amount": {
                "total": "' . $this->total . '",
                  "currency": "GBP",
                  "details": {
                    "subtotal": "' . $this->sub_total . '",
                    "tax": "' . $this->tax . '",
                    "shipping": "' . $this->shipping . '",
                    "handling_fee": "' . $this->handling_fee . '",
                    "shipping_discount": "' . $this->shipping_discount . '",
                    "insurance": "' . $this->insurance . '"
                  }
                },
                "description": "This is the payment transaction description.",
                "custom": "' . $pkg_string . '",
                "invoice_number": "' . $this->invoice . '",
                "payment_options": {
                "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
                },
                "soft_descriptor": "' . $pkg_small_string . '",
                "item_list": {
                "items": [{
                    "name": "' . $package->name . '",
                    "description": "' . $package->tagline . '",
                    "quantity": "1",
                    "price": "' . $this->total . '",
                    "tax": "' . $this->tax . '",
                    "sku": "' . $package->id . '",
                    "currency": "GBP"
                  }],
                  "shipping_address": {
                    "recipient_name": "' . (!empty($user->first_name) ? $user->first_name : '') . " " . (!empty($user->last_name) ? $user->last_name : '') . '",
                    "line1": "' . (!empty($user->address) ? $user->address : 'Not available') . '",
                    "line2": "' . (!empty($user->address) ? $user->address : 'Not available') . '",
                    "city": "Liverpool",
                    "country_code": "GB",
                    "postal_code": "L2 2DP",
                    "phone": "' . (!empty($user->phone) ? $user->phone : '') . '"
                  }
                }
              }],
              "note_to_payer": "Contact us for any questions on your order.",
              "redirect_urls": {
            "return_url": "' . $this->return_url . '",
                "cancel_url": "' . $this->cancel_url . '"
              }
            }';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/payments/payment",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $obj,
            CURLOPT_HTTPHEADER => $headers,
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        $links = $response->links;
        foreach ($links as $key => $link):
            if ($link->rel == "approval_url") {
                $this->approval_url = $link->href;
            }
        endforeach;
        $user_pkg = UserPackage::where('user_id',$user_id)->where('package_id',$package_id)->where('paid_status',0)->first();
        $user_pkg->starting_paid_date = Carbon::now();
        $user_pkg->pay_id = $response->id;
        if ($user_pkg->save()){
            return UserPayment::create([
                "access_token" => $this->getAccessToken(),
                "user_id" => $this->user_id,
                "pay_id" => $response->id,
                "invoice_number" =>$this->invoice,
                "create_response" => json_encode($response),
            ]);
        }
    }

    public static function executePayment($pay_id = false, $payer_id = false)
    {
        $paypal = new PayPal();
        $user_payment = UserPayment::where("pay_id", "=", $pay_id)->first();
//        dd($user_payment, $pay_id, $payer_id);
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $user_payment->access_token,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $paypal->getUrl() . "/payments/payment/" . $pay_id . "/execute",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
  "payer_id": "' . $payer_id . '"
}',
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);
      $user_pkg = UserPackage::where("pay_id",$pay_id)->first();
      $user_pkg->paid_status = UserPackage::Active;
        if ($user_pkg->save()){
            return UserPayment::where("pay_id", "=", $pay_id)->update(["execute_response" => json_encode($response)]);
        }
    }

    /**
     * @return mixed
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getSubTotal()
    {
        return $this->sub_total;
    }

    /**
     * @return mixed
     */
    public function getPackageId()
    {
        return $this->package_id;
    }

    /**
     * @return mixed
     */
    public function getPackageDescription()
    {
        return $this->package_description;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @return mixed
     */
    public function getHandlingFee()
    {
        return $this->handling_fee;
    }

    /**
     * @return mixed
     */
    public function getShippingDiscount()
    {
        return $this->shipping_discount;
    }

    /**
     * @return mixed
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getApprovalUrl()
    {
        return $this->approval_url;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}