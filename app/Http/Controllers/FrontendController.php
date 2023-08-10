<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Contact;

class FrontendController extends Controller
{
    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'image' => 'required|max:255',
            'message' => 'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('success','Contact message send successfully');
        return redirect()->back();
    }
}
