<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class App extends Controller
{
    

    public function index()
    {
        return view('pages.loginpage');
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if(Auth::attempt($validated)) {

            if(Auth::user()->type == 'client'){
                return redirect()->route('municipalities');
            } else {
                return redirect()->route('system_municipality');
            }

        } else {
            return redirect()->back()->with('status',['alert' => 'alert-warning', 'msg' => 'Error! Invalid Credentials']);
        }
        
       
    }



    public function register_view() {
        return view('pages.signuppage');
    }


    public function register(Request $request) {
        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8|confirmed',
        ]);

        
        User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => bcrypt($validated['password']),
            'type'      => 'client',
        ]);

        return redirect()->route('login')->with('status',['alert' => 'alert-success', 'msg' => 'User Created!']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
