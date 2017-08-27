<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // AM FUNCTIONA BA SHEWAYAKY AUTOMATICY RUN ABE WA EMA PEWYSTA LAGAL AMA AW USERA BNERYN KA HAMANA
        // WA BASHTRYN REGA BO NARDN AW REGAYAY SARAWAYA KA LAREGAY constructor USERAKA BNERYN
        // WA PEWYST NAKA compact YAN with BAKAR BENYN HAR XOR BA AUTOMATICY AW USERA ANERE
        return $this->text('emails.welcome');
    }
}
