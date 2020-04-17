<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Lead;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = Sentinel::registerAndActivate($request->all());

        Sentinel::Authenticate($user);

        if(Sentinel::check()){
            return redirect('/dashboard');
        }

    }

    public function login(Request $request){
        Sentinel::Authenticate($request->all());

        if(Sentinel::check()){
            return redirect('/dashboard');
        }else{
            return redirect('/')->with('error', 'You entered a wrong email or password');
        }
    }

    public function logout(){
        Sentinel::logout();
        return redirect('/');

    }

    public function stop($id){
      $lead = Lead::findorfail($id);
      $lead->stop = 'y';
      $lead->update();
      return back()->with('success', 'Cadence Stopped Successfully');

    }
}
