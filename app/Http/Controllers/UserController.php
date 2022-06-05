<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        // $user = User::all();
        $title = "Beranda";
        $jumlahUser = User::where('role', 'User')->count();
        return view('user.konten.index',[
            'jumlahUser' => $jumlahUser,
            'title' => $title,
        ]);
    }

    public function show($username)
    {
        $title = "My Profile";
        $user = User::where('username', $username)->first();
        return view('user.konten.show',[
            'user' => $user,
            'title' => $title,
        ]);
    }

    public function edit($username)
    {
        $title = "Edit Profile";
        $user = User::where('username', $username)->first();
        return view('user.konten.edit',[
            'user' => $user,
            'title' => $title,
        ]);
    }
    
    public function update(Request $request, $username)
    {
        // return dd($request);
        if(empty($request->file('image'))){
            $user = User::where('username', $username)->first();       
            $user->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
            ]);
            return redirect()->route('profile.show',$username);
        }
        else{
            $user = User::where('username', $username)->first(); 
            Storage::delete($user->image); 
            $user->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
                'image'         => $request->file('image')->store('image-user'),
            ]);
            return redirect()->route('profile.show',$username);
        }                                             

                                            
    }

    public function dataUserMember()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $title = "Members";
        $keyword = "";
        $user = User::where('role','User')->orderBy('id', 'desc')->paginate(5);
        return view('action-data-user.list-user',[
            'user' => $user,
            'title' => $title,
            'keyword' => $keyword,
        ]);
    }

    public function dataUserAdmin()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $title = "Admin";
        $keyword = "";
        $user = User::where('role','Admin')->orderBy('id', 'desc')->paginate(5);
        return view('action-data-user.list-user-admin',[
            'user' => $user,
            'title' => $title,
            'keyword' => $keyword,
        ]);
    }

    public function cariMember(Request $request)
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $title = "Members";
        $keyword = $request->cari;
        $user = User::orderBy('id', 'desc')->where('role','User')->where('username', 'like', "%" . $keyword . "%")->paginate(5);
        return view('action-data-user.list-user',[
            'user' => $user,
            'title' => $title,
            'keyword' => $keyword,
        ]);
    }

    public function cariAdmin(Request $request)
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $title = "Admin";
        $keyword = $request->cari;
        $user = User::orderBy('id', 'desc')->where('role','Admin')->where('username', 'like', "%" . $keyword . "%")->paginate(5);
        return view('action-data-user.list-user-admin',[
            'user' => $user,
            'title' => $title,
            'keyword' => $keyword,
        ]);
    }

    public function addUser(Request $request)
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }

        // return dd($request);

        $pesan = [
            'name.required'             => 'Tidak boleh kosong !',
            'username.required'         => 'Tidak boleh kosong !',
            'email.required'            => 'Tidak boleh kosong !',
            'role.required'             => 'Tidak boleh kosong !',

            'username.unique'           => 'Username telah terdaftar !',
            'email.unique'              => 'Email telah terdaftar !',
            'email.email'               => 'Format email salah !',
        ];

        $request->validate([
            'name'          => 'required',
            'username'      => 'required|unique:users',
            'email'         => 'required|unique:users|email',
            'role'          => 'required'
        ],$pesan);

        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'role'          => $request->role,
            'password'      => Hash::make('12345'),
        ]);

        return redirect()->route('data.user.index');

    }








    
    public function destroy($id)
    {
        //
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }

}
