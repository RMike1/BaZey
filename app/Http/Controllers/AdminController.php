<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.project_dashboard');
    }

    public function Categories()
    {
       if(Auth::id())
       {
        if(Auth::user()->usertype=='1')
        {
            $data=Category::all();

            return view('admin.categories',compact('data'));
        }
        else
        {
            return redirect()->back();
        }
       }
       else
       {
        return redirect('login');
       }
        
       
    }

    public function Store(Request $req)
    {

        $req->validate([
        'name'=>'required',
        'description'=>'required'
]);
      
        $data=new Category;
        $data->name=$req->name;
        $data->description=$req->description;
        
        
            $file=$req->image;
            if($file)
        {
            $imagename=time().'.'.$file->getClientOriginalExtension();
            $req->image->move('uploads',$imagename);
            $data->image=$imagename;
        }
    
            $data->save();
            return redirect()->back()->with('message','category created successfull!..');
      
       
   
    }

    public function Edit(Request $req, $id)
    {

        $item=Category::find($id);
        $item->name=$req->name;

        $value=$item->description=$req->description;
        if($value)
        {
           $item->description=$req->description;

        }

       
        $file=$req->image;

        if( $file)

        {
        
        $imagename=time().'.'.$file->getClientOriginalExtension();
        
        $req->image->move('uploads',$imagename);
        $item->image=$imagename;
        }
        $item->save();
        return redirect('categories')->with('message','category updated successfull!..');
    }

     public function Edit_category($req)
    {
        $value= Category::find($req);
     
     
        return view('admin.edit_category',compact('value'));
    }

    public function Delete($req)
    {
        $data= Category::find($req);
        $data->delete($req);
        return redirect()->back();
    }

    // Admin Dashboard 2 ===================

    public function dashboard_2(){

        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.dashboard2');

            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            return redirect('login');       
        }
        
    }

}
