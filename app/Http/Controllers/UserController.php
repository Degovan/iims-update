<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['photo'] = UserImage::upload($request->file('photo'));
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if ($user) {
            $user->assignRole($request->role);

            return redirect('/users')->with('alert', [
                'type' => 'success',
                'msg' => 'User data saved successfully'
            ]);
        } else {
            return redirect('/users')->with('alert', [
                'type' => 'error',
                'msg' => 'Duplicate entry ' . $request->email
            ]);
        }
    }

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
        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|exists:roles,name',
        ]);

        $data = $request->all();

        if($request->file('photo')) {
            $request->validate([
                'photo' => 'file|image|mimes:jpg,png,gif'
            ]);

            $data['photo'] = UserImage::upload($request->file('photo'));
        } else {
            unset($data['photo']);
        }

        if ($request->email != $user->email) {
            $request->validate(['email' => 'unique:users,email']);
        }

        if ($request->password) {
            $request->validate([
                'password' => 'required|string',
                'confirm-password' => 'required|same:password'
            ]);
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect('/users')->with('alert', [
            'type' => 'success',
            'msg' => 'User data updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('alert', [
            'type' => 'success',
            'msg' => 'User data deleted successfully'
        ]);
    }
    
}
