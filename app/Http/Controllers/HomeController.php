<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::findOrFail(Auth::id());
        return view('home', ['users' => $users]);
    }

    public function updateAvatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$users = Auth::user();
    		$users->avatar = $filename;
    		$users->save();
    	}
    	return view('home', ['users' => Auth::user()]);
    }

    
    public function upperfl(Request $request) {
        $users = User::findOrFail(Auth::id());

        return view('users.admin.edit', ['users' => $users]);
        
    }



}
