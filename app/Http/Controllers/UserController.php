<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', '!=', 'Admin')
            ->get();

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:5'],
        ]);

        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);

        $image = $request->file('avatar');
        if ($request->hasFile('avatar')) {
            $file_name = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/user', $file_name);

            $data['avatar'] = $file_name;

            User::create($data);
            # code...
        }

        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('admin.user.manage', compact('user'));
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
        $this->validate($request, [
            'name' => ['required'],
            'username' => ['required', 'unique:users,username,' . $id],
            'email' => ['required', 'unique:users,email,' . $id, 'email'],
            // 'password' => ['min:5'],
        ]);

        $user = User::findorFail($id);

        $data = $request->except('_token');
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        if (!empty($image)) {
            $old_path = 'public/user/' . $user->avatar;
            Storage::delete($old_path);

            $file_name = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/user', $file_name);

            $data['avatar'] = $file_name;
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);

        $avatar_path = 'public/user/' . $user->avatar;
        Storage::delete($avatar_path);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
}
