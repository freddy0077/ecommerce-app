<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewSignUp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $name;
    protected $text;
    protected $shop;
    protected $amount;
    protected $qty;
    public function __construct($name)
    {
        //
        $this->name = $name;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
//    public function toArray($notifiable)
//    {
//        return [
//            //
//        ];
//    }

    public function toSlack($notifiable)
    {
//        $url = url('/invoices/' . $this->invoice->id);

        return (new SlackMessage())
            ->success()
            ->content($this->name->name ." just signed up ")
            ->attachment(function ($attachment)  {
                $attachment->title('New Signup')
                    ->fields([
                        'Name' => $this->name->name,
                        "Phone Number" => $this->name->phone_number ,
                        "Email" => $this->name->email
                    ]);
            });
    }
}
