<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\User;
use  Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

   
    public function Redirect()
    {
        $user=Auth::id();
        if($user)
        
        {

            if(Auth::user()->usertype=='1')
            {

                $data=User::where('users.id','!=',Auth::user()->id)->get();
           

                return view('admin.index',compact('data'));
               
            }
            else
            {
                $data=Category::all();


                return view('user.index',compact('data'));
            }
        }
        else
        {
          return Redirect('login');

        }

    }

    
}

