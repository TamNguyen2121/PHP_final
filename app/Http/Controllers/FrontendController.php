<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use App\Models\post;

class FrontendController extends Controller
{
  public function home(){
    $post = post::with('location','account','Tag')->orderBy('created_at','ASC')->take(9)->get();
    $FirstPost = $post->splice(0,2);
    $MiddlePost = $post->splice(0,1);
    $LastPost = $post->splice(0,2);

    $footerPost = post::with('location','account','Tag')->inRandomOrder()->limit(5)->get();
    $firstFooterPost = $footerPost->splice(0,1);
    $middleFooterPost = $footerPost->splice(0,2);
    $lastFooterPost = $footerPost->splice(0,1);
    $endFooterPost = $footerPost->splice(0,1);
    // return $FirstPost ;
    $recentPosts = post::with('location','account','Tag')->orderBy('created_at','ASC')->paginate(6);
    // dd($recentPosts->links());
    return view('website.home',compact(['post','recentPosts','FirstPost','MiddlePost','LastPost','firstFooterPost','middleFooterPost','lastFooterPost','endFooterPost']));
  }
  public function about(){
    return view('website.about');
  }
  public function all_post(){
    
    $post = post::with('location','account','Tag')->orderBy('created_at','ASC')->paginate(12);
    // dd($post);
    // $post = post::with('location','account','Tag')->orderBy('created_at','ASC')->paginate(6)->get();
    // dd($post);
    return view('website.all_post',compact(['post']));
  }
  public function contact(){
    return view('website.contact');
  }
  public function post($id){

    $post = Post::with('location','account','Tag')->where('id',$id)->first();
    
  //   $originalPost = Post::find(17);
  //   $similarPosts = Post::where('id', '<>',17) // Loại trừ bài viết gốc
  //                   ->where('title', 'like', '%' . $originalPost->title . '%')
  //                   ->get();
  //  dd($similarPosts);
    $popularPost = post::with('location','account')->limit(6)->get();
    // dd($popularPost);
    if($post){
      return view('website.post',compact('post','popularPost'));
    }else{
      return redirect('/');
    }
   
  }


    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'image' => 'required|max:255',
            'message' => 'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('message-send','Contact message send successfully');
        return redirect()->back();
    }
}
