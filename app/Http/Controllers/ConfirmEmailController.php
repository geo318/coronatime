<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class ConfirmEmailController extends Controller
{
	public function sendEmail(EmailVerificationRequest $request)
	{
		$request->fulfill();

		return view('auth.verify-login');
	}

	public function resendEmail(Request $request)
	{
		$request->user()->sendEmailVerificationNotification();

		return view('auth.verify-email');
	}
}
