<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class TestController extends Controller
{
    public function storeSecret(Request $request)
    {
        $request->user()->fill([
            'token' => Crypt::encryptString($request->token)
        ])->save();
    }

    public function Decrept(Request $request)
    {
        try {
            $decrypted = Crypt::decryptString($request);
        } catch (DecryptException $exception) {
            die($exception);
        }
    }


    public function Reset_Password(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

}
