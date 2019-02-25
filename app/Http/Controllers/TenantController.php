<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TenantSignupRequest;

class TenantController extends Controller
{    

    public function signupCreate()
    {
    	return view('tenantRegistration');
    }

    public function signupStore(Request $request)
    {
        $tenantData = $request->validate([
            'company' => 'required',
            'location' => 'required|min:6',
            'subdomain' => 'required|min:3|max:10',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:6',
            'captcha' => 'required|captcha'
        ]);

        //send out a tenant signup request confirmation to tenant with cc to super_admin (alternatively, implement the tenant:create functionality here)
        Mail::to($tenantData['email'])
            ->cc(env('SUPER_ADMIN_EMAIL'))
            ->send(new TenantSignupRequest($tenantData));
            //configure queues to queue up the email sending

            session()->flash('alert', ['type' => 'success', 'message' => 'Your request has been submitted and an email has been sent to your email address']);        
            return redirect('/');
    }

    public function signupRefreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
}
