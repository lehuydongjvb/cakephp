<?php
namespace App\Controller\Component;
use Cake\Mailer\Email;
use Cake\Controller\Component;
use UsersController;

class SendMailComponent extends Component
{
     public static function sendMail($email)
    {
       
       
        $sendemail = new Email();
        $sendemail->transport('gmail')
        ->to($email)
        ->subject('About')
        ->send('khskdhhasskjskla');
    }
}