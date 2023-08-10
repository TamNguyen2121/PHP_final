<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderBy('created_at','ASC')->paginate(20);
        return view('admin.Post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 'hello';
        $location=location::all();
        return view('admin.Post.create',compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|title',
            'image'=> 'required|image',
            'content'=>'required',
            'location_id'=>'required',
        ]);
        $post = Post::create([

            'title' => $request->title,
            'content'=>$request->content,
            'image'=> 'image.ipg',
            // 'account_id' => auth()->
        ]);
    }

   

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
