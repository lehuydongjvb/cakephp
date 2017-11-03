<?php
namespace App\Mailer;


use Cake\Mailer\Email;

class UserMailer extends Mailer
{
    public static function welcome()
    {
        print_r('abc');die;
        // $email = new Email('default');
        // $email->from(['abc@gmail.com' => 'My Site'])
        // ->to('lehuydong250.jvb@gmail.com')
        // ->subject('About')
        // ->send('khskdhhasskjskla');
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }

}