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
        request()->validate([
            'userSearch' => 'required',
        ]);
        $userSearch = request()->input('userSearch');
        $postQuery = Post::orderBy('created_at', 'ASC')
        ->select('posts.*', 'locations.name as location_name', 'accounts.username as author')
        ->leftJoin('locations', 'posts.location_id', '=', 'locations.id')
        ->leftJoin('accounts', 'posts.account_id', '=', 'accounts.id')
        ->leftJoin('post_tag', 'posts.id', '=', 'post_tag.post_id')
        ->leftJoin('tags', 'post_tag.tag_id', '=', 'tags.id');

    
        if ($userSearch) { 
            $postQuery->where(function ($subQuery) use ($userSearch) {
                $subQuery->where('posts.id', '=', $userSearch)
                         ->orWhere('posts.title', 'like', '%' . $userSearch . '%')
                         ->orWhere('locations.name', 'like', '%' . $userSearch . '%')
                         ->orWhere('accounts.username', 'like', '%' . $userSearch . '%')
                         ->orWhere('tags.name', 'like', '%' . $userSearch . '%');
            });

        }
    
        $post = $postQuery->paginate(20);
        
        return view('website.search', compact('post'));

    }
}
