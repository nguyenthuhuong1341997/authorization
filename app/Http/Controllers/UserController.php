<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Gate;
use DB;
use Auth;

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
        // $this->authorize('view', User::class);
        $users = DB::table('users')
        ->select('users.*')
                ->where('users.id','!=',Auth::id())
                ->get();
        
        return view('index',compact('users'));
    }

    public function create()
    {
        // $this->authorize('create', User::class);
        $user = new User();
        return view('users.create',compact('user'));
    }
    public function store(RoleRequest $request)
    {
        toastr()->info(trans('master.add_successfully'));
        $data= $request->all();
        User::create($data);
        return redirect('users');
    }
    public function edit($id)
    {
        $user= User::find($id);
        return view('users.create',compact('user'));
    }
    public function update(RoleRequest $request, $id)
    {
        toastr()->warning(trans('master.edit_successfully'));
        $data= $request->all();
        $user= User::find($id);
        $user->update($data);
        return redirect('users');
    }
    public function destroy($id)
    {
        
        User::find($id)->delete();
        return response()->json('success');
    }
}
