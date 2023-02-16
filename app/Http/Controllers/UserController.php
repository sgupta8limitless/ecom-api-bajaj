<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return $users;
    }

    
    public function store(Request $request)
    {
            $user=new User;

            $user->name=$request->name;
            $user->email=$request->email;
            $user->contact=$request->contact;
            $user->password=Hash::make($request->password);
            $user->save();

            return ["success"=>true,"message"=>"User Registered"];


    }

    public function login(Request $request)
    {
        $credentials=$request->only(['email','password']);

        if(Auth::attempt($credentials))
        {



                $token=$request->user()->createToken('login_token')->plainTextToken;

                return ["succes"=>true,"token"=>$token,"user"=>["id"=>$request->user()->id,"user"=>$request->user()->name]];


        }
        else 
        {
            return ["success"=>false,"message"=>"wrong username or password"];
        }

    
        

    }


    public function show(string $id): Response
    {
        $user=User::find($id);
        return $user;
    }

    
    public function update(Request $request, string $id)
    {
            $user=User::find($id);

            $user->name=$request->name;
            $user->email=$request->email;
            $user->contact=$request->contact;
            $user->password=Hash::make($request->password);
            $user->save();

            return ["success"=>true,"message"=>"User Updated"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
