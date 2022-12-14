<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Backend.author.profile.index');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image',
            'email'=>'required|email',
        ]);

        $slug = Str::slug($request->name);
        $user = User::findOrFail(Auth::id());

        if ($request->hasFile('image')){
            @unlink($user->image);
            $image = $request->file('image');
            $imageName = time().$slug.'.'.$image->getClientOriginalExtension();
            $imagePath = 'uploads/user/'.$imageName;
            $image->move('uploads/user',$imageName);

            $user->name = $request->name;
            $user->image = $imagePath;
            $user->email = $request->email;
            $user->about = $request->about;
            $user->save();
        }else{
            $user->name = $request->name;
            $user->image = $user->image;
            $user->email = $request->email;
            $user->about = $request->about;
            $user->save();
        }

        return redirect()->route('author.profile')->with('success','Your Profile Updated');

    }

    public function passwordFrom()
    {
        return view('Backend.author.password.form');
    }

    public function passwordCheck(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);
        $hasPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hasPassword)){
            if (!Hash::check($request->password,$hasPassword)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return  redirect()->back()->with('success','Your Password Changed Successfully');
            }
            else{
                return redirect()->back()->with('warning','Your Old Password And New Password Are Same');
            }
        }else{
            return redirect()->back()->with('error','Your Password Are Not Match');
        }
    }

}
