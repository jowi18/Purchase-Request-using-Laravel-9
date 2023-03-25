<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewCommentNotification;
class UserController extends Controller
{

    public function login()
    {
        return view('user.login');
    }

    public function index()
    {
        $title = '/ Dashboard';
        return view('user.index', compact('title'));
    }
    public function authenticate(Request $request){

        $retval = ['redirect' => '', 'message' => 'Login details incorrect!', 
        'email_result' => 'is-invalid', 'password_result' => 'is-invalid'];
        
        $validated = $request->validate([
            'email' => 'required:email',
            'password' => 'required'
        ]);

    if(auth()->attempt($validated)){
        $request->session()->regenerate();
        $retval['email_result'] = 'is-valid';
        $retval['password_result'] = 'is-valid';
        $retval['redirect'] = '/';
        $retval['message'] = 'Login Success';
       
    }
       return response()->json($retval);
}

public function logout(Request $request){
    $request->session()->regenerateToken();
    $request->session()->invalidate();
    auth()->logout();
    return redirect('/login')->with('messages','Logout Successfully');
    
}


}
