<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::all();
        // Log::info(["TIPO" => $profiles]);
        
        return view('profile.profile',compact('profiles'));
    }

    public function create()
    {
        $estado = 'create';
        $genders = Gender::all();
        return view('profile.profile_form',compact('estado','genders'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        $profile = Profile::where('user_id', '=' ,Auth::user()->id);
        if($profile ) {
            return redirect('users')->with(["error-message" => "Este perfil ya existe"]);
    
        }
        $profile = new Profile();
        // Log::info(["TIPO" => $profile]);

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->age = $request->age;
        $profile->gender_id = $request->gender;
        $profile->user_id = Auth::user()->id;
        // Log::info(["TIPO" => $profile]);

        $profile->save();
        return redirect('users')->with(["success-message" => "Se ha actualizado el perfil"]);
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);     
        }
        // Log::info(["TIPO" => $profile]);

        return view('profile.profile_show',compact('profile'));
    }

    public function edit($id)
    {
        $estado = 'edit';
        $profile = Profile::find($id);
        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);
        }
        // Log::info(["TIPO" => $profile]);
        $genders = Gender::all();

        return view('profile.profile_form',compact('estado','profile','genders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        $profile = Profile::find($id);
        // Log::info(["TIPO" => $profile]);

        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);
        }


        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->age = $request->age;
        $profile->gender_id = $request->gender;
        // Log::info(["TIPO" => $profile]);

        $profile->update();
        return redirect('users')->with(["success-message" => "Se ha actualizado el perfil"]);

    }

    public function destroy($id)
    {
        //
    }
}
