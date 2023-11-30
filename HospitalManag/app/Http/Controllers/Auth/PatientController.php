<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PatientLoginRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(PatientLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::PATIENT);
        }else{
            return redirect()->back()->withErrors(['name' => 'Email Or Password invalid !']);
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
//
    }
}
