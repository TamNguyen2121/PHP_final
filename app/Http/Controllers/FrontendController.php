<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Location;

class FrontendController extends Controller
{
    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'image' => 'required|image',
            'message' => 'required|min:100',
        ]);
    
        $contact = Contact::create($request->all());
    
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/contact/'), $image_new_name);
            $contact->image = '/storage/contact/' . $image_new_name;
            $contact->save();
        }

        Session::flash('message-send','Contact message send successfully');
        return redirect()->back();
    }

    public function search()
    {
        $userSearch = request()->input('userSearch');
        $postQuery = Post::orderBy('created_at', 'ASC');
        $locationQuery = Location::orderBy('created_at', 'ASC');
    
        if ($userSearch) { // Thay $postKey thành $userSearch
            $postQuery->where(function ($subQuery) use ($userSearch) {
                $subQuery->where('id', '=', $userSearch)
                         ->orWhere('title', 'like', '%' . $userSearch . '%');
                        //  ->orWhere('location', 'like', '%' . $userSearch . '%')
                        //  ->orWhere('author', 'like', '%' . $userSearch . '%');
            });

            $locationQuery->where(function ($subQuery) use ($userSearch) {
                $subQuery->where('id', '=', $userSearch)
                         ->orWhere('name', 'like', '%' . $userSearch . '%')
                         ->orWhere('address', 'like', '%' . $userSearch . '%');
            });
        }
    
        $post = $postQuery->paginate(20);
        $location = $locationQuery->paginate(20);
        
        return view('website.search', compact('post', 'location'));

    }
}
