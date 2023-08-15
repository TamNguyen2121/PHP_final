<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Session;
use App\Models\location;
use App\Models\post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = post::orderBy('created_at', 'ASC')->paginate(7);
        return view('admin.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tag =Tag::all();
        $location = location::all();
        return view('admin.post.create', compact(['location', 'Tag']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'content' => 'required',
            'account_id'=>'required',
            'location' => 'required',
        ]);

        $post = post::create([
            'title' => $request->title,
            'image' => 'image.jpg',
            'content' => $request->content,
            'account_id' => $request->account_id,
            'location_id' => $request->location,
            'published_at' => Carbon::now(),
        ]);
       
        $post->Tag()->attach($request->Tag);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $Tag = Tag::all();
        $location = location::all();
        $Account = Account::all();
        return view('admin.post.show', compact(['post', 'location', 'Tag','Account']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $Tag = Tag::all();
        $location = location::all();
        return view('admin.post.edit', compact(['post', 'location', 'Tag']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            // 'image' => 'required',
            'content'=>'required',
            'location'=>'required'
        ]);
        
        $post->title = $request->title;
        // $post->image = $request->image;
        $post->content = $request->content;
        $post->location_id = $request->location;

        $post->Tag()->sync($request->Tag);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
           
        }
        $post->save();
        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post){
            if(file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }

            $post->delete();
            Session::flash('success', 'Post deleted successfully');
        }

        return redirect()->back();
    }


    // public function countPostsByAddress($LocationId)
    // {
    //     $locations = Location::all(); 

    //     $postCounts = []; 
    
    //     foreach ($locations as $location) {
    //         $postCounts[$location->id] = $this->countPostsByAddress($location->id);
    //     }
    //     return $postCounts;
    // }

}