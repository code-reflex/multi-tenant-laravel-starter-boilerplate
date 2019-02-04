<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{    

    public function registrationCreate()
    {
    	return view('tenantRegistration');
    }

    public function registrationStore(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'location' => 'required|min:6',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:6',
            'captcha' => 'required|captcha'
        ]);

        return redirect('/');

    }

    public function registerRefreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
}
