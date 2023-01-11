<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Newscrape;
use App\Models\Update;
use Validator;

class Control extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function redirectFunct()
    {
        $typeuser=Auth::user()->usertype;

        if ($typeuser=='1')
        {
            return view ("admin.landingpage");
        }

        else
        {
            return view("users.landingpage");
        }
    }

    public function viewNews()
    {
    $values = DB::table('newscrapes')->paginate(10);
    return view('users.viewnews', compact (('values')));
    }

    public function viewMap()
    {
    return view('users.viewmap');
    }

    public function storeImage(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images-news'), $imageName);

        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image', $imageName);
    }

    public function index1()
    {
        return view('image-form');
    }

    
    public function postUpdates()
    {
        return view('users.postupdates');
    }

    public function storeUpdates(Request $request)
    {
        if(Auth::user()->status==0)
        {
            return redirect()->back()->withErrors(['msg' => 'You have been suspended by the admin. Please contact admin via email at admin.myflood@gmail.com']);
        }

        else
        {
        $request->validate(['image'=>'required|image']);
        $newid=Auth::user()->name;
        $update = new Update;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images-news'), $imageName);
        $update->image = $request->input('image',$imageName);
        $update->title = $request->input('title');
        $update->image_text = $request->input('image_text');
        $update->name = $newid;
        $update->save();
        return redirect()->back()->with('status','Posted !');
        }
    }

    public function viewUpdates()
    {
        $values = Update::orderBy('id', 'desc')->get();
        return view('users.viewupdates', compact (('values')));
    }

    public function viewOwnUpdates()
    {
        $values = DB::table('updates')->where('name','=', Auth::user()->name)->get();
        return view('users.viewownupdates', compact (('values')));
    }

    public function deleteOwnUpdates(Update $id)
    {
        unlink(public_path('images-news/'.$id->image));
        $id->delete();
        return redirect()->back()->with('status','Post Deleted Successfully');
    }

    public function editUpdates($id)
    {
        $values = DB::table('updates')->where('id','=',$id)->first();
        return view('users.edit', compact('values'));
    }

    public function Update(Request $request, Update $id)
    {
        

        $imageName = '';
        if ($request->hasFile('file')) {  
          $request->validate(['file'=>'required|image']);
          $imageName = time() . '.' . $request->file->extension();
          $request->file->move(public_path('images-news'), $imageName);
          if ($id->image) {
            unlink(public_path('images-news/'.$id->image));
          }
        } else {
          $imageName = $id->image;
        }
    
        $values = ['title' => $request->title, 'image_text' => $request->image_text,'image' => $imageName];
    
        $id->update($values);
        return redirect()->back()->with('status','Post Updated Successfully');
    }

    public function emergencyContact()
    {
        return view('users.emergencycontacts');
    }

    public function guideList()
    {
        return view('users.guide');
    }

    public function viewSinglePost($id)
    {
    $values = DB::table('newscrapes')->where('id','=',$id)->first();
    return view('users.viewsinglepost', compact (('values')));
    }

}