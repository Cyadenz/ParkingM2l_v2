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

class reservController extends Controller
{
    public function index()
    {
        return view('sidebar.reservation.indexReservation');
    }

    public function show()
    {   
        $places = places::all();

        $nbrplacesR = DB::table('places')->where('reserver', 0)->count();

        return view('sidebar.reservation.placesListe',compact('places', 'nbrplacesR'));    
    }

    public function reserv($idplace)
    {
        $idAuth = Auth::user()->id;
        DB::table('places')
        ->where('idplace', $idplace)
        ->update(['reserver' => 1,'idUserReserve' => $idAuth]);

        DB::table('users')->where('id', $idAuth)->update(['idPlaceReserve' => $idplace]);

        DB::table('reservations')->insert(['finperiode' => '1998-10-10', 'id_users' => $idAuth, 'id_place' => $idplace, 'debutperiode' => '1998-10-10', 'valider' => 0]);

        return redirect()->route('rPlaces')
            ->with('status', 'Vous avez réservé la place');
    }

    public function reservSupp(Request $request, $idplace)
    {
        $idAuth = Auth::user()->id;
        
        DB::table('places')->where('idplace', $idplace)->update(['reserver' => 0,'idUserReserve' => null]);

        DB::table('users')->where('id', $idAuth)->update(['idPlaceReserve' => null]);

        DB::table('reservations')->where('id_users', $idAuth)->delete();

        return redirect()->route('rPlaces')
        ->with('status', 'Vous avez retiré votre réservation');
    }

    public function placeSelect($idplace)
    {
        $place = DB::table('places')->where('idplace', $idplace)->get();

        return view('sidebar.reservation.placeReserv',compact('place'));  
    }

    public function store(Request $request, $idplace)
    {
        $this->validate($request, [
            'debutperiode' => 'required|date',
            'finperiode' => 'required|date',
        ]);

        $idAuth = Auth::user()->id;
        DB::table('places')->where('idplace', $idplace)->update(['reserver' => 1,'idUserReserve' => $idAuth]);
        DB::table('users')->where('id', $idAuth)->update(['idPlaceReserve' => $idplace]);

        DB::table('reservations')
        ->insert(['finperiode' => $request->finperiode, 'id_users' => $idAuth, 'id_place' => $idplace, 'debutperiode' => $request->debutperiode, 'valider' => 0]);

        return redirect()->route('rPlaces')
            ->with('status', 'Vous avez réservé la place'); 
    }

    public function rangPlus()
    {   
        // $user = user::findorFail(Auth::user()->id);

        $nbrRang = DB::table('users')->whereNotNull('rang')->count();
        $nbrRang++;

        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update(['rang' => $nbrRang]);

       return redirect()->route('sRang')
            ->with('status', 'Vous avez été placé sur liste d attente');  
    }
}
