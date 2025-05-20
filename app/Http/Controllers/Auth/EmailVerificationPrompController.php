<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPrompController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return $request;
        return $request->user()->hasVerifiedEmail() ? 
                redirect()->intended('dashboard') :
            view('auth.verify-email');
    }
}
