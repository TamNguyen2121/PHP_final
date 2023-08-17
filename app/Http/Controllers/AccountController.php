<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Account;
use App\Models\Account as ModelsAccount;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

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

                //Remember Email & Pw
                if(isset($data['remember'])&&!empty($data['remember'])){
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }

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
            }else{
                $imageName = "";
            }



            //Update Profile
           ModelsAccount::where('email',Auth::guard('admin')->user()->email)->Update(['username'=>$data['user_name'],'mobile'=>$data['phone_num'],'image'=>$imageName]);
            return redirect()->back()->with("success_message","Profile Updated");
        }
        return view('admin.Profile.profile');
        
    }
    
    public function edituser(Request $request, User $user){
        Session::put('page','profile');
        if($request->isMethod('post')){
            $request->all();

            $rule = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                'gender' => 'required',
                'birthday' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'name.regex' => 'Valid Name is required',
                'name.max' => 'Valid Name is required',
                'gender.required' => 'Gender number is required',
                'birthday.required' => ' Date of Birth is required,'
            ];

            $this->validate($request,$rule,$customMessage);

            // Check if there are any changes before updating
        if ($user->name !== $request->name ||
        $user->gender !== $request->gender ||
        $user->birthday !== $request->birthday ||
        $user->account_id !== $request->account_id) {

            //Update UserInfo
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->account_id = $request->account_id;
            $user->save();
        }
            // ModelsUser::Update(['name'=>$data['name'],'gender'=>$data['gender'],'birthday'=>$data['Date_of_Birth']]);
            return redirect()->back()->with("success_message","Profile Updated");
        }
        return view('admin.Profile.profile');
    }

    public function subadmins(){
        Session::put('page','user');
        $subadmins = ModelsAccount::where('type','subadmin')->get();

        return view('admin.user.index')->with(compact('subadmins'));
    }

    public function updateSubadminStatus(Request $request){
        if($request->ajax()){
            $data = $request ->all();
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ModelsAccount::where('id',$data['subadmin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subadmin_id'=>$data['subadmin_id']]);
        }
    }

    public function addEditSubadmin(Request $request,$id = null){
        if($id==""){
            $title = "Add Subadmin Account";
            $subadmindata = new ModelsAccount;
            $message = "Subadmin Account added successfully";
        }else{
            $title = "Edit Subadmin Account";
            $subadmindata = ModelsAccount::find($id);
            $message = "Subadmin Account updated successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;

            if($id==""){
                $subadminCount = ModelsAccount::where('email',$data['email'])->count();
                if($subadminCount>0){
                    return redirect()->back()->with('error_message','Account alrady exists!');
                }
            }
            $rule = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255', 
                'mobile' => 'required|numeric',
                'email' => 'required',
                'image' => 'image',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'name.regex' => 'Valid Name is required',
                'name.max' => 'Valid Name is required',
                'mobile.required' => 'Name is required',
                'mobile.numeric' => 'Valid Moblie is required',
                'image.image' => ' valid image is required,'
            ];

            $this->validate($request,$rule,$customMessage);

             //Upload Image
             if($request-> hasFile('image')){
                $image_tmp = $request->file('image');
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
            }else{
                $imageName = "";
            }
            $subadmindata->image = $imageName;
            $subadmindata->username = $data['name'];
            $subadmindata->mobile = $data['mobile'];
            if($id==""){
                $subadmindata->email = $data['email'];
                $subadmindata->type = 'subadmin';
            }
            if($data['password']!=""){
                $subadmindata->password = bcrypt($data['password']);
            }
            $subadmindata->save();
            return redirect('admin/user')->with('success_message',$message);
        }
        return view('admin.user.add_edit_user')->with(compact('title','subadmindata'));
    }

    public function deleteSubadmin($id){
        ModelsAccount::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Subadmin deleted successfully!');
    }
}
