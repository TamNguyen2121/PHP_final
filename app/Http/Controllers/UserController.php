<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Session;

class UserController extends Controller
{
//     public function index(){
//         Session::put('page','user');
//         $user =  User::latest()->paginate(20);

//         return view('admin.user.index',compact('user'));
//     }

//     public function destroy(User $user)
//     {
//         if($user){
//             $user->delete();
//             Session::flash('success', 'Post deleted successfully');
//         }

//         return redirect()->back();
//     }
// }
