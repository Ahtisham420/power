<?php



namespace App\Notifications;



use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;



class Appnotify extends Notification

{

    use Queueable;



    /**

     * Create a new notification instance.

     *

     * @return void

     */

    private $p;

    private $m;

    private $t;

    private $f;
    
    private $s;

    public function __construct($package=null,$msg=null,$url=null,$flag=null,$subject = "Email Notification From PPC.")
    {
        $this->p=$package;
        $this->m=$msg;
        $this->t=$url;
        $this->f=$flag;
        $this->s = $subject;
    }



    /**

     * Get the notification's delivery channels.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    public function via($notifiable)
    {
        return ['mail'];
    }



    /**

     * Get the mail representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return \Illuminate\Notifications\Messages\MailMessage

     */

    public function toMail($notifiable)
    {
        $s_url="/";
        $b_msg="visit Site";
        if($this->p){
            $d=$this->p;
            $data= nl2br('Congratulation! you selected package against Tagline ='.$d->tagline.'\n'.'Price='.$d->price);
        }
        else if($this->m){
            $d=$this->m;
            $data= "Congratulation! your Package has been ".$d;
        }
        else{
            if($this->f!=null){
                $data="Please Click on reset button and reset your password";
                $s_url= $this->t;
                $b_msg="Reset";
            }
            else{
                $data="Congratulation!You have been Successfully Registered on Power Performance Cars";
                $s_url= $this->t;
                $b_msg="verify";
            }
        }
        return (new MailMessage)
            ->subject($this->s)
            ->line($data)

            ->action($b_msg, url($s_url))

            ->line('Thank you for using our application!');

    }



    /**

     * Get the array representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    public function toArray($notifiable)
    {
        return [
            //
        ];

    }

}

