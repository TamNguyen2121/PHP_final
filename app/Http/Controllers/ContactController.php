<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $messages = Contact::latest()->get();
        // if($key = request()->key) {
        //     $messages = Contact::latest()->where('name','like','%'.$key.'%')->get();
        // }
        $messageKey = request()->messageKey;
        $messages = Contact::latest()->when($messageKey, function ($query) use ($messageKey) {
            $query->where('id', '=', $messageKey)
                  ->orWhere('name', 'like', '%' . $messageKey . '%')
                  ->orWhere('email', 'like', '%' . $messageKey . '%')
                  ->orWhere('message', 'like', '%' . $messageKey . '%');
        })->get();
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            $contact = Contact::find($id);

            if($contact) {
                return view('admin.contact.show', compact('contact'));
            } else {
                Session::flash('error', 'Contact message not found.');
                return redirect()->route('dashboard');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if($contact) {
            if(file_exists(public_path($contact->image))) {
                unlink(public_path($contact->image));
            }

            $contact->delete();
            Session::flash('delete_message','Message deleted successfully');
            }
        
        return redirect()->back();
    }
}
    
