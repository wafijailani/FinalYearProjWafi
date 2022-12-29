<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Newscrape;
use App\Models\Update;


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
    $values = DB::table('newscrapes')->get();
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

    public function viewUpdates()
    {
        $values = DB::table('updates')->get();
        return view('users.viewupdates', compact (('values')));
    }

    public function viewOwnUpdates()
    {
        $values = DB::table('updates')->where('name','=', Auth::user()->name)->get();
        return view('users.viewownupdates', compact (('values')));
    }

    public function deleteOwnUpdates($id)
    {
        $delete = DB::table('updates')->where('id', '=', $id)->delete();
        return redirect()->back()->with('status','Post Deleted Successfully');
    }

    public function editUpdates($id)
    {
        $values = DB::table('updates')->where('id','=',$id)->first();
        return view('users.edit', compact('values'));
    }

    public function Update(Request $request, $id)
    {
        $values = Update::find($id);
        if (is_null($request->image)) //no pic
        {
            $values->title = $request->input('title');
            $values->image_text = $request->input('image_text');
            $values->update();
            return redirect()->back()->with('status','Post Updated Successfully');
        }
        else
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images-news'), $imageName);
            $values->image = $request->input('image',$imageName);
            $values->title = $request->input('title');
            $values->image_text = $request->input('image_text');
            $values->update();
            return redirect()->back()->with('status','Post Updated Successfully');
        }
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

