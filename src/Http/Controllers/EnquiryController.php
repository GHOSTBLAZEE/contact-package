<?php

namespace Suraj\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Suraj\Contact\Mail\ContactMail;
use Suraj\Contact\Models\Contact;

class EnquiryController extends Controller
{
    public function contact()
    {
        return view('contact::contact');
    }

    public function enquiry_store(Request $request)
    {
        // $request->validate([
        //     'email_id' => 'email',
        //     'mobile_number' => 'numeric'
        // ], [
        //     'mobile_number.numeric' => 'Enter a Valid Mobile Number',
        //     'email_id.email' => 'Enter a Valid Email Id',
        // ]);

        $enquiry = Contact::create([
            'email_id' => $request->email_id,
            'mobile_number' => $request->mobile_number,
        ]);

        Mail::to(config('contact.send_email_to'))->send(new ContactMail($enquiry));

        return redirect()->back()->with('status', 'Connected Successfully');
    }
}
