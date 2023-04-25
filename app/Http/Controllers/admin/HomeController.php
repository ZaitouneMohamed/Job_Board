<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use PhpCsFixer\DocBlock\Tag;

class HomeController extends Controller
{
    public function Categorieslist() {
        return view('admin.categories');
    }

    public function Users_list()
    {
        return view('admin.users');
    }
    
    public function Tags_list()
    {
        $tags = Tags::paginate(5);
        return view('admin.tags',compact("tags"));
    }

    public function view_user($id)
    {
        $user = User::find($id);
        return view('admin.view_user',compact('user'));
    }

    public function annonces_list()
    {
        return view('admin.jobs.index');
    }

    public function assign_role_to_user(Request $request , $id) {
        User::find($id)->assignRole($request->role_name);
        return redirect()->back();
    }

    public function remove_role_from_user(Request $request,$id) {
        User::find($id)->removeRole($request->role_name);
        return redirect()->back();
    }

    public function assign_permission_to_user(Request $request , $id) {
        User::find($id)->givePermissionTo($request->permission_name);
        return redirect()->back();
    }

    public function remove_permission_from_user(Request $request,$id) {
        User::find($id)->revokePermissionTo($request->permission_name);
        return redirect()->back();
    }
}
