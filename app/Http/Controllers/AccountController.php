<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Account;
use App\Models\Account as ModelsAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Image;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function dashboard(){
        Session::put('page','dashnoard'); 
        return view('admin.Dashboard.index'); 
    }

    
    
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rule = [
                'email' => 'required|email|max:255', 
                'password' => 'required|max:50'
            ];

            $customMessage = [
                'emnail.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request,$rule,$customMessage);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password!");
            }
        }
        return view('auth.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function profile(Request $request){
        Session::put('page','profile');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rule = [
                'user_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                'phone_num' => 'required|numeric|digits:10',
                'admin_image' => 'image',
            ];

            $customMessage = [
                'user_name.required' => 'Name is required',
                'user_name.regex' => 'Valid Name is required',
                'user_name.max' => 'Valid Name is required',
                'phone_num.required' => 'Phone number is required',
                'phone_num.numeric' => 'Valid Phone number is required',
                'phone_num.digits' => 'Phone number is not valid',
                'admin_image.image' => 'Valid Image is required,'
            ];

            $this->validate($request,$rule,$customMessage);

            //Upload Image
            if($request-> hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //Get image Extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/img/photos/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }
            }
            else{
                $imageName = "";
            }
            //Update Profile
           ModelsAccount::where('email',Auth::guard('admin')->user()->email)->Update(['username'=>$data['user_name'],'mobile'=>$data['phone_num'],'image'=>$imageName]);
            return redirect()->back()->with("success_message","Profile Updated");
        }
        return view('admin.Profile.profile');
    }
}
