<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

	public function __construct(){

		//restriction Auth
		$this->middleware('auth');

	}
    public function  edit(){
		//recup utilisateur
		$user =  Auth::user();
//	    var_dump($user);
//	    die();
		return view('users.edit', compact('user'));

    }

	public function  update(Request $request){
		$user =  Auth::user();
		$this->validate($request,[
			'name' => "required|unique:users,name,{$user->id}|min:2"
		]);

		$user->update($request->only('name', 'firstname', 'lastname'));
		return redirect()->back()->with('success', 'Votre profil a bien été modifié !');
	}

}
