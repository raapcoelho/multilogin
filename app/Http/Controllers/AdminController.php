<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Administrator;
use Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function login(Request $request)
    {
        $data = $request->all();

        $email = $data['email'];
        $password = $data['password'];
        

        $administrator = Administrator::where('email', $email)->first();

        $hash = Hash::check($password, $administrator->password);

        //Auth::attempt("admin", ['email' => 'johndoe@gmail.com', 'password' => 'password']);
        
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {

            dd(Auth::guard('admin'));
            return view('admin.show');
        }

        dd(Auth::guard('admin'));
    }

    public function home(){

        return view('admin.show');
    }
}
