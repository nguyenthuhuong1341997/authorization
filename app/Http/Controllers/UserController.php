<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Gate;
use DB;
use Auth;
use App\Http\Requests\UserRequest;
use Hash;

class UserController extends Controller
{
	var $user;
	public function __construct($foo = null)
	{
		$this->user = new User();
		$this->middleware('auth');
	}
    public function index()
    {
        $users = User::find(Auth::id());
        $users = User::all()
                ->where('id','!=',Auth::id());
        return view('index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $user = new User();
        return view('users.create',compact('user','roles'));
    }
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user1 = new User();
        $user1->name = $data['name'];
        $user1->email = $data['email'];
        $user1->password = Hash::make($data['password']);
        $user1->save();
        /* $user1 = User::create($data);*/
        foreach ($data['role'] as $role) {
            $user = User::find($user1->id);
            $user->roles()->attach($role);
        }
        return redirect('users')->with('flag','Thêm Mới Thành Công !');
    }
    public function edit($id)
    {
        $user= User::find($id);
        $role = $user->roles()->get();
        $roles= Role::all();
        // dd($role[0]->type);
        $array = array();
        foreach ($role as $ro) {
            array_push($array, $ro->type);
        }
        
        return view('users.edit',compact('user','roles','array'));
    }
    public function update(Request $request, $id)
    {
        $data= $request->all();
        // dd($data);
        $user = User::find($data['id']);
        $user->roles()->detach();
        foreach ($data['role'] as $role) {
            $user = User::find($data['id']);
            // $user->roles()->detach();
            $user->roles()->attach($role);
        }
        // $user= User::find($id);
        // $user->update($data);
        return redirect('users')->with('flag','Cập nhật Thành Công !');
    }
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return response()->json(['success']);
        
    }
    public function profile(){
       $user= User::find(Auth::id());
       return view('users.profile',compact('user'));
    }
    public function password(){
       $user= User::find(Auth::id());
       return view('users.password',compact('user'));
    }

    public function updateInfor(Request $req, $id)
    {
       $data = $req->all();
       $user = User::find($id);
       $user->update($data);
       return redirect()->back()->with('flag_edit','Thanh cong');
    }
    public function updatePassword(Request $request,$id){
       $user = User::find($id);
       $data = $request->validate([
           'current_password'=>'required',
           'password'=>'required|min:6',
           'password_confirmation'=>'required|same:password',
       ]);
       if (Hash::check($data['current_password'], $user->password)) {
           $user->password = Hash::make($data['password']);
           $user->save();
           return redirect()->back()->with('flag', 'successfully');
       } else {
           return redirect()->back()->with('flag', 'Not successfully');
       }
    }
}
