<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserProfile(){

        if(Auth::id())
        {
            if(Auth::user()->usertype=="0")
            {
                $user=Auth::id();

                $data=User::where('users.id',$user)->get();
        
                return view('user.profile',compact('data'));
            }
            else
            {
                return redirect()->back();
            }

        }
        else{
            return redirect('login');
        }
        
    }

    public function UpdateUserProfile(Request $req)
    {
        $data=User::find($req->id);
        $file=$req->image;
        if($file)
        {
            $imagename=time().'.'.$file->getClientOriginalExtension();
            $req->image->move('profile\uploads',$imagename);
            $data->image=$imagename;
           
        }
        
        $data->save();

        return redirect()->back();
        

    }
}
