<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
use App\Models\location;
use App\Models\Tag;
use App\Models\Account;
class DashboardController extends Controller
{
    public function index(){   
        $post = post::orderBy('created_at', 'ASC')->take(10)->get();
        $postCount = post::all()->count();
        $locationCount = location::all()->count();
        $tagCount = Tag::all()->count();
        $userCount = account::all()->count();
        return view('admin.dashboard.index',compact('post','postCount','locationCount','tagCount','userCount'));
    }
}
