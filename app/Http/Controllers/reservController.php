<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Places;
use Auth;
use DB;
use App\Quotation;

class reservController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sidebar.reservation.indexReservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $places = places::all();

        return view('sidebar.reservation.placesListe',compact('places'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reserv($idplace)
    {
        $idAuth = Auth::user()->id;
        DB::table('places')
        ->where('idplace', $idplace)
        ->update(['reserver' => 1,'idUserReserve' => $idAuth]);

        DB::table('users')->where('id', $idAuth)->update(['idPlaceReserve' => $idplace]);

        return redirect()->route('rPlaces')
            ->with('status', 'Vous avez réservé la place');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservSupp(Request $request, $idplace)
    {
        $idAuth = Auth::user()->id;
        
        DB::table('places')
        ->where('idplace', $idplace)
        ->update(['reserver' => 0,'idUserReserve' => null]);

        DB::table('users')->where('id', $idAuth)->update(['idPlaceReserve' => null]);

        return redirect()->route('rPlaces')
        ->with('status', 'Vous avez retiré votre réservation');
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
