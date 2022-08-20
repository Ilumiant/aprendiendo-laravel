<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        // Log::info(["TIPO" => $profiles]);
        
        return view('profile.profile',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = 'create';
        return view('profile.profile_form',compact('estado'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        if(!$profile) {
            return redirect('users/profile')->with(["product-created" => "por alguna razon este producto ya no existe"]);
            
        }
        // Log::info(["TIPO" => $profile]);

        return view('profile.profile_show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = 'edit';
        $profile = Profile::find($id);
        if(!$profile) {
            return redirect('users/profile')->with(["product-created" => "por alguna razon este producto ya no existe"]);
        }
        // Log::info(["TIPO" => $profile]);

        return view('profile.profile_form',compact('estado','profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        if(!$profile) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
