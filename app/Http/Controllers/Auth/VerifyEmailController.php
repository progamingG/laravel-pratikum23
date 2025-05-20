<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;


class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
           
            return redirect()->intended('dashboard');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
      
        return redirect()->intended('dashboard');
}
}
