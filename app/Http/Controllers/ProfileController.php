<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\UserProfile;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontpage.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserProfile $userProfile
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfile $userProfile)
    {
        return view('frontpage.profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('frontpage.profile.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function profileSettings(User $user)
    {
        return view('frontpage.profile.profile_settings', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfileSettings(ProfileRequest $request, User $user)
    {

        if($request->file('profile_picture')){
            Storage::put(
                'public/avatars/'.$user->id,
                file_get_contents($request->file('profile_picture')->getRealPath())
            );

            $user->picture_url = '/storage/avatars/' . $user->id;
            $user->save();
        }

        if($request->file('profile_cover')){
            Storage::put(
                'public/covers/'.$user->id,
                file_get_contents($request->file('profile_cover')->getRealPath())
            );

            $user->cover_url = '/storage/covers/' . $user->id;
            $user->save();
        }



        $userProfile = $user->profile;
        if($userProfile){

            $userProfile->position = request()->position;
            $userProfile->department = request()->department;
            $userProfile->studies = request()->studies;
            $userProfile->address = request()->address;
            $userProfile->birthplace = request()->birthplace;
            $userProfile->phone = request()->phone;
            $userProfile->website = request()->website;
            $user->profile()->save($userProfile);

        } else {

            $userProfile = new UserProfile([
                'user_id' => $user->id,
                'position' => request()->position,
                'department' => request()->department,
                'studies' => request()->studies,
                'address' => request()->address,
                'birthplace' => request()->birthplace,
                'phone' => request()->phone,
                'website' => request()->website,
            ]);
            $user->profile()->save($userProfile);
        }

        $request->session()->flash('success_message', 'Profile successfully saved!');

        return back();
    }

    public function accountSettings(User $user)
    {
        return view('frontpage.profile.account_settings', compact('user'));
    }

    public function accountSettingsChangePassword(User $user)
    {
        $this->validate(request(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->password = bcrypt(request('password'));

        $user->save();

        request()->session()->flash('success_message', 'Password changed successfully');
        return back();

    }

    public function accountSettingsChangeDetails(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = request('name');
        $user->email = request('email');

        $user->save();

        request()->session()->flash('success_message', 'Account details changed successfully');
        return back();

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
