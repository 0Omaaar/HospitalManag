<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DoctorLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function store(DoctorLoginRequest $request): RedirectResponse
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DOCTOR);
        }else{
            return redirect()->back()->withErrors(['name' => 'Email Or Password invalid !']);
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
//
    }
}
