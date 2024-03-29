<?php

namespace Modules\Login\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('login::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function submit(Request $request)
    {

       $request->validate([
           'email' =>'required|email',
           'password' =>'required|min:6'
       ]);

       $email = $request->email;
       $password = $request->password;

       $user = User::where('email', $email)->where('status','active')->first();
       if($user  && $user->password){
           if(Hash::check($password, $user->password)){

               Auth::login($user);
               return  redirect()->route('home');
           }

           session()->flash('error','Invalid Password');
           return redirect()->back();
       }

        session()->flash('error','Invalid User');
        return redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('login::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function logout(Request $request)
    {
        if(auth()->check()){
            Auth::logout();
            $request->session()->flash('success','Logged Out');
            return redirect()->route('login');
        }
    }
}
