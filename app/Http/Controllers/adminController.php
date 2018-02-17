<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\Quotation;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
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

    public function Util()
    {
        $utils = user::all();
        return view('admin.utilisateurs' , compact('utils'));
    }

    public function UtilSelect($id)
    {
        $user = user::findorFail($id);
        return view('admin.utilisateursModifs' , compact('user'));
    }

    public function UtilSupp($id)
    {
        $MembSup = user::findOrFail($id);
        $MembSup->delete();

        return redirect()->route('aUtils')
        ->with('status', 'Suppresion éffectuée avec succès');
    } 

    public function Utilstore(Request $request ,$id)
    {
            $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'admin' => 'required|boolean',
        ]);
        $user = User::findorFail($id);
        $user -> update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password),
            'admin' => $request->admin,
    ]);
        return redirect()->route('aUtils')
            ->with('status', 'Le profil à été mis à jour !');
    }
}
