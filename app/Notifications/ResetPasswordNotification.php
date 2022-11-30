<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
	use Queueable;

	public $token;

	public function __construct($token)
	{
		$this->token = $token;
	}

	public function via($notifiable)
	{
		return ['mail'];
	}

	public function toMail($notifiable)
	{
		return (new MailMessage())
			->subject('Recover your password')
			->greeting('Recover password')
			->line('click this button to recover a password')
			->action('RECOVER PASSWORD', $this->token . '?email=' . $notifiable->email)
			->salutation('');
	}
}
