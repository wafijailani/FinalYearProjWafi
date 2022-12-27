<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Update;


class adminControl extends Controller
{
    public function viewUsers()
    {
    $values = DB::table('users')->where('usertype','=','0')->where('status','=','1')->get();
    return view('admin.viewallusers', compact (('values')));
    }

    public function viewUsersSuspend()
    {
    $values = DB::table('users')->where('usertype','=','0')->where('status','=','0')->get();
    return view('admin.viewsuspendedusers', compact (('values')));
    }

    public function suspend($id)
    {
    $value = User::find($id);
    $value->status = 0;
    $value->update();
    return redirect()->back()->with('status','User deleted successfully');
    }

    public function reactivate($id)
    {
    $value = User::find($id);
    $value->status = 1;
    $value->update();
    return redirect()->back()->with('status','User deleted successfully');
    }

    public function viewPosts()
    {
        $values = DB::table('updates')->get();
        return view('admin.viewposts', compact (('values')));
    }

    public function deletePosts($id)
    {
        $delete = DB::table('updates')->where('id', '=', $id)->delete();
        return redirect()->back()->with('status','Post deleted successfully');
    }
}
