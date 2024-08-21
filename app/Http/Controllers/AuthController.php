<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'

        ], [
            'username.exists' => 'Akun tidak di temukan!',
            'username' => 'Login terlebih dahulu!',
            'password' => 'wajib diisi!'
        ]);

        $user = $request->only(['username', 'password']);
        if(Auth::attempt($user)){
            return redirect('/dashboard')->with('succsess', 'Anda berhasil login!');
        }
            return back()->with('error', 'Silahkan login kembali!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        // dd($request->all());

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/data-user')->with('create-user', 'Berhasil menambahkan akun!');
    }

    public function destroy($id)
    {
        $id = User::find($id);
        $id->delete();
        return redirect('/data-user')
        ->with('deleteuser', 'berhasil menghapus user!');
    }

    public function edit($id)
    {
        // $item = User::all();
        $user = User::where('id', $id)->first();
        return view('page.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'address' => 'required',
            // 'password' => 'required',
        ]);

        // dd($request->all());

        User::where('id', $id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'address' => $request->address,
            'role' => $request->role,
        ]);
        return redirect('/data-user');
    }
}
