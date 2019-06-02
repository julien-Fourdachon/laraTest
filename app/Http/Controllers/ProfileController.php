<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfile;

use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all()->sortBy('last_name');

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProfile  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfile $request)
    {
        $validated = $request->validated();

        $profile = new Profile([
            // First letter to upper case for sorting by name
            'first_name' => \ucfirst($request->get('first_name')),
            'last_name' => \ucfirst($request->get('last_name')),
            'image' => $request->get('image'),
            'description' => $request->get('description')
        ]);
        $profile->save();
        return redirect('/profiles')->with('success', 'Profile saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProfile  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfile $request, $id)
    {
        $validated = $request->validated();

        $profile = Profile::find($id);
        $profile->first_name =  $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->image = $request->get('image');
        $profile->description = $request->get('description');

        $profile->save();

        return redirect('/profiles')->with('success', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        $profile->delete();

        return redirect ('/profiles')->with('success', 'Profile deleted');
    }
}
