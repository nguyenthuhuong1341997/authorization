<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Gate;

class UserController extends Controller
{
	var $user;
	public function __construct($foo = null)
	{
		$this->user = new User();
	}
    public function index()
   {
       $users = $this->user->userHasPermission(3);
       // dd($users);
       if(Gate::allows('update-post',$users)){
       	dd('dsffd');
       }
       dd("ser");
       return view('index',['users'=> $users]);
   }
}
