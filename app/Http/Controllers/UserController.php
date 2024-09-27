<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin|dosen'])->except('registerMahasiswaCreate','registerMahasiswaStore');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(['role:dosen']);
        
        if(auth()->user()->hasrole('dosen') ){

            $users = User::role('mahasiswa')->get();
        }else{
            $users = User::get();
        }

        return view('backend.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $request['is_active'] = 0;
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $user = User::create($request->all());
        $user->assignRole('dosen');
        toast('Account has been created', 'success');
        return redirect()->route('user.index');
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
        //
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
        if ($user->id == 1) {
            toast('Account Prohibited to Delete', 'warning');
        } else {
            $user->delete();
            toast('Account has been deleted', 'error');
        }
        return back();
    }

    public function registerMahasiswaCreate()
    {
        if(auth()->user()){
            return redirect()->to('/');
        }
        return view('auth.mahasiswa-register');
    }

    public function registerMahasiswaStore(RegisterRequest $request)
    {
        $request['is_active'] = 0;
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $request['username'] = $request->username;
        $request['nim'] = $request->nim;
        $request['kelas'] = $request->kelas;
        $user = User::create($request->all());
        $user->assignRole('mahasiswa');
        toast('Silahkan Login, akun berhasil dibuat', 'success');
        return redirect()->route('login');
    }
}
