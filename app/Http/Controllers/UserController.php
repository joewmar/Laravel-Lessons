<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }
    //Passing data to route: Method 1
    // public function show($id){
    //     // passing data to controller

    //     // Temp database
    //     $data = array(
    //         "id" => $id,
    //         "name" => "Hello World",
    //         "age" => 21,
    //         "email" => "helloworld@email.com"
    //     );
    //     // return view('users ', ['data' => $data]);
    //     return view('users ', $data);
    // }

    public function login(){
        if(FacadesView::exists('user.login')){
            return view('user.login');
        }
        else{
            return abort(404);
            // return response()->view('errors.404');
        }
    }
    public function register(){
        if(FacadesView::exists('user.register')){
            return view('user.register');
        }
        else{
            return abort(404);
            // return response()->view('errors.404');
        }
    }

    //Passing data to route: Method 2
    public function show($id){
        // $data = ["data" => "database"];
        // ->with('data', $data)

        return view('users')
            ->with('name', 'Hello World')
            ->with('age', 22)
            ->with('email', 'helloworld@gmail.com')
            ->with('id', $id);
    }

    // Laravel Part 7 - Authentication Register Login and Logout
    public function store(Request $request){
        // dd($request);
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        // $validated['password'] = Hash::make( $validated['password']);
        $validated['password'] = bcrypt( $validated['password']);

        $user = User::create($validated);
        // return $user;

        //After register automatic logged in
        auth()->login($user);
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successful');
    }
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }
}
