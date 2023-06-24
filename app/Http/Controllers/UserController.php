<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email',$request->input('email'))->count();
        if($user > 0){
            $request->session()->flash('signup',0);
            return to_route('signup');
        }else{
            $request->session()->flash('signup',1);
            $password = $request->input('password');
            $request->merge(['password'=>password_hash($password,PASSWORD_BCRYPT,['cost'=>10])]);
            User::create($request->all());
            return to_route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Check if there is a user in database or not
     */
    public function checkUser(Request $request){

        $user = User::where('email',$request->input('email'));
        $pasword = $request->input('password');

        if($user->count() > 0){

            $hash_password = $user->first()->password;

            if(password_verify($pasword,$hash_password)){

                $request->session()->flash('login',1);
                $request->session()->put('auth-user',[
                    'id'=>$user->first()->id,
                    'is_admin'=>$user->first()->is_admin
                ]);
                return to_route('home');
            }
            $request->session()->flash('login',0);
            return to_route('login');
        }

        $request->session()->flash('login',0);
        return to_route('login');

    }
}
