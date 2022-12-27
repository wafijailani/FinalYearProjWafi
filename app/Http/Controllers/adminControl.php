<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class adminControl extends Controller
{
    public function viewUsers()
    {
    $values = DB::table('users')->where('usertype','=','0')->get();
    return view('admin.viewallusers', compact (('values')));
    }

    public function destroy($id)
    {
    User::destroy($id); 
    return redirect()->back()->with('status','User deleted successfully');
    }
}
