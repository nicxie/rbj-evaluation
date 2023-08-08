<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        return view('user');
    }

    public function login(){
        if(View::exists('user.login')){
            return view('user.login');
        }else{
            // return response()->view('errors.404');
            return abort(404);
        }
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);
        
        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }
        
        return back()->withErrors(['email' => 'Login failed'])->onlyInput('email');

    }

    public function register(){
        return view('user.register');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successful');

    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4' ],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => [ 'required', 'confirmed', 'min:6' ]
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

    }

    public function show($id){

        $data = array(
            "id"    =>  $id,
            "name"  =>  "Nica Gabutan",
            "age"   =>  "24",
            "email" =>  "nicagabs7@gmail.com"
        );

        return view('user', ['data' => $data]);
        
    }
}
