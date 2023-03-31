<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Queue\ShouldQueue;



class defaultNotify extends Mailable

{

    use Queueable, SerializesModels;



    /**

     * Create a new message instance.

     *

     * @return void

     */



    public $subject;

    public $body;



    public function __construct($subject,$body)

    {

        //

        $this->subject = $subject;

        $this->body = $body;

    }



    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()

    {

        return $this->view('emails.defaultNotify')

            ->with([

                'subject' => $this->subject,

                'body' => $this->body,

            ]);

    }



//    Mail::to($request->user())->send(new defaultNotify($subject,$body));

}

