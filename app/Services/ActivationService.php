<?php

namespace App\Services;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use App\Activation as Activation;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, Activation $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendReminderMail($user){
        if ($user->activated) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);
        $link = route('user.activate', $token);

        $this->mailer->send('templates.mail.userActivationReminderMail', ['link' => $link], function (Message $m) use ($user) {
            $m->to($user->email)->subject("Activate your account!");
        });
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);
        $link = route('user.activate', $token);

        $this->mailer->send('templates.mail.userActivationMail', ['link' => $link], function (Message $m) use ($user) {
            $m->to($user->email)->subject($user->first_name.' '.$user->last_name);
        });


    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}