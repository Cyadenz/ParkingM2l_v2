<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Reservations;
use App\Periodes;
use App\Places;
use Auth;
use DB;
use App\Quotation;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        return view('sidebar.profil.profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mesInfos()
    {
        $user = user::findorFail(Auth::user()->id);
        return view('sidebar.profil.infosPerso', compact('user'));
    }

    public function monRang()
    {
        $nbrRang = DB::table('users')->whereNotNull('rang')->count();
        return view('sidebar.profil.monRang', compact('nbrRang'));
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
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:150',
            'telephone' => 'required|numeric|phone',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::findorFail(Auth::user()->id);
        $user -> update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('sMesInfos')
            ->with('status', 'Vos informations ont bien été modifiées');
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
}
