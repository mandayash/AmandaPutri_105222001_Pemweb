<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu {

	public function auth (Request $request) {

		$credentials = $request->only('email', 'password');
        $loginField = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $loginCredentials = [
            $loginField => $credentials['email'],
            'password' => $credentials['password']
        ];

        if (Auth::attempt($loginCredentials)) {
            $request->session()->regenerate();
            return redirect()->route('event.home');
        }

		return redirect()->back()->withErrors([
            'email' => 'Data Anda tidak sesuai'
        ]);
	}

	public function logout (Request $request) {

		Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('event.home');
	}
}

?>
