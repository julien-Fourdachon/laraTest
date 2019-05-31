<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $profiles = Profile::all();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'image' => 'required|max:255',
                'description' => 'required'
            ],
            [
                'first_name.required' => 'Please enter a first-name',
                'last_name.required' => 'Please enter a last-name',
                'image.required' => 'Please enter an image',
                'description.required' => 'Please enter a description'
            ]
        );

        $profile = new Profile([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'image'=>'required',
            'description' => 'required'
        ]);


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
