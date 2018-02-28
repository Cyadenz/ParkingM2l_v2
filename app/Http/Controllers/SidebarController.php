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
    public function index()
    {

        //Fin de réservation
        $reservations = DB::table('reservations')->whereDate('finperiode', '=', date('Y-m-d'))->get();
        if (count($reservations) != 0) 
        {
            $id_users = DB::table('reservations')->select('id_users')->whereDate('finperiode', '=', date('Y-m-d'))->get();
            $id_place = DB::table('reservations')->select('id_place')->whereDate('finperiode', '=', date('Y-m-d'))->get();

            DB::table('reservations')->whereDate('finperiode', '=', date('Y-m-d'))->delete();

                $x=0;
                while ($x != count($id_users) ) 
                {
                    DB::table('places')->where('idplace', $id_place[$x]->id_place)->update(['reserver' => 0,'idUserReserve' => NULL]);
                    DB::table('users')->where('id',  $id_users[$x]->id_users)->update(['idPlaceReserve' => NULL]);
                    $x++;
                }
        }


        //File d'attente
        $nbrplacesDispo = DB::table('places')->where('reserver', 0)->count();
        $nbrRang = DB::table('users')->whereNotNull('rang')->count();

        if ($nbrplacesDispo != 0) 
        {
            $i=0;
            while ($i != $nbrplacesDispo &&  $nbrRang != 0) 
            {
                $RangMin = DB::table('users')->select('id')->whereNotNull('rang')->min('rang');

                $user = DB::table('users')->where('rang', $RangMin)->get();

                DB::table('users')->where('id', $user[0]->id)->update(['rang' => NULL]);

                $placeAlea = DB::table('places')->select('idplace')->where('reserver', 0)->inRandomOrder()->first();

                DB::table('places')->where('idplace', $placeAlea->idplace)->update(['reserver' => 1,'idUserReserve' => $user[0]->id]);

                DB::table('users')->where('id', $user[0]->id)->update(['idPlaceReserve' => $placeAlea->idplace]);

                DB::table('reservations')->insert(['finperiode' => '1998-10-10', 'id_users' => $user[0]->id, 'id_place' => $placeAlea->idplace, 'debutperiode' => '1998-10-10', 'valider' => 0]);

                $nbrRangFor = DB::table('users')->whereNotNull('rang')->count();

                DB::table('users')->whereNotNull('rang')->decrement('rang');

                $i++;
                $nbrRang--;
            }  
        }

        return view('index');
    }

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
