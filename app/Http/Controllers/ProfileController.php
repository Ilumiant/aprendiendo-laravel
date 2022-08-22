<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            'gender' => 'required',
            'image' => 'image|max:512',
        ]);

        $profile = Profile::where('user_id', '=' ,Auth::user()->id)->first();
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

        if ($request->file('image')) {
          $url = Storage::disk('public')->put('images/users/profiles', $request->file('image'));
          $profile->image = $url;
        }
        // Log::info(["TIPO" => $profile]);

        $profile->save();
        return redirect('users')->with(["success-message" => "Se ha actualizado el perfil"]);
    }

    public function show($id)
    {

        //   $profile = Profile::where('user_id', '=' ,Auth::user()->id)->first();
      $profile = Profile::find($id);
        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);
        }
        // Log::info(["TIPO" => $profile]);

        return view('profile.profile_show',compact('profile'));
    }

    public function edit()
    {
        $estado = 'edit';
        $profile = Profile::where('user_id', '=' ,Auth::user()->id)->first();
        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);
        };

        $genders = Gender::all();

        return view('profile.profile_form',compact('estado','profile','genders'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        $profile = Profile::where('user_id', '=' ,Auth::user()->id)->first();

        if(!$profile) {
            return redirect('users')->with(["error-message" => "Este perfil no existe"]);
        }

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->age = $request->age;
        $profile->gender_id = $request->gender;

        if ($request->file('image')) {
          if ($profile->image != null) {
            if (file_exists(public_path() . '/' . $profile->image)) {
              unlink( public_path() . '/' . $profile->image );
            }
          }
          $url = Storage::disk('public')->put('images/users/profiles', $request->file('image'));
          $profile->image = $url;
        }

        $profile->update();
        return redirect('users')->with(["success-message" => "Se ha actualizado el perfil"]);

    }

    public function destroy($id)
    {
        //
    }
}
