<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Places;
use App\Reservations;
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
    public function Util()
    {
        $utils = user::all();

        $updated = DB::table('users')->select('updated_at')->max('updated_at');

        return view('admin.utilisateurs' , compact('utils', 'updated'));
    }

    public function UtilSelect($id)
    {
        $user = user::findorFail($id);
        return view('admin.utilisateursModifs' , compact('user'));
    }

    public function UtilSupp($id)
    {
        DB::table('places')->where('idUserReserve', $id)->update(['reserver' => 0, 'idPlaceReserve' => null]);

        DB::table('reservations')->where('id_users', $id)->delete();

        user::findOrFail($id)->delete();

        return redirect()->route('aUtils')
        ->with('status', 'Suppresion éffectuée avec succès');
    } 

    public function Utilstore(Request $request ,$id)
    {
            $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|numeric|phone',
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

    public function Reserv()
    {
        $reservs = reservations::all();
        $utils = user::all();
        $updated = DB::table('reservations')->select('updated_at')->max('updated_at');

        return view('admin.reservations' , compact('reservs', 'utils' ,'updated'));
    }

    public function ReservValidation($id_place)
    {
        $reservation = DB::table('reservations')->where('id_place', $id_place)->get();

        return view('admin.reservationVal' , compact('reservation'));
    }

    public function Reservstore(Request $request, $id_place)
    {
        $this->validate($request, [
            'debutperiode' => 'required|date|after:today',
            'finperiode' => 'required|date|after:tomorrow|after_or_equal:debutperiode',
        ]);

        DB::table('reservations')
            ->where('id_place', $id_place)
            ->update(['finperiode' => $request->finperiode, 'debutperiode' => $request->debutperiode, 'valider' => 1]);

        return redirect()->route('aReservs')
        ->with('status', 'Les dates ont bien étés assignées !'); 
    }

    public function ReservSupp($id_place)
    {
        $id = DB::table('places')->select('idUserReserve')->where('idplace', $id_place)->get();

        DB::table('places')->where('idplace', $id_place)->update(['reserver' => 0,'idUserReserve' => null]);
        
        DB::table('users')->where('id', $id[0]->idUserReserve)->update(['idPlaceReserve' => null]);

        DB::table('reservations')->where('id_place', $id_place)->delete();

        return redirect()->route('aReservs')
        ->with('status', 'Suppresion éffectuée avec succès');
    }

    public function Places()
    {
        $places = places::all();
        $updated = DB::table('places')->select('updated_at')->max('updated_at');

        return view('admin.places' , compact('places', 'updated'));
    }

    public function PlacesCreate()
    {
        $idMax = DB::table('places')->max('idplace');
        $idMax++;
    DB::table('places')->insert(
    ['idplace' => $idMax, 'numplace' => $idMax, 'reserver' => 0, 'idUserReserve' => NULL]
    );

        return redirect()->route('aPlaces')
        ->with('status', 'Place crée avec succès');
    }

    public function PlacesSupp($idplace)
    {
        DB::table('users')->where('idPlaceReserve', $idplace)->update(['idPlaceReserve' => null]);

        DB::table('reservations')->where('id_place', $idplace)->delete();

        DB::table('places')->where('idplace', $idplace)->delete();

        return redirect()->route('aPlaces')
        ->with('status', 'Suppresion éffectuée avec succès');
    } 

    public function FileAttente()
    {
        $users = DB::table('users')->whereNotNull('rang')->get();
        $updated = DB::table('users')->select('updated_at')->max('updated_at');

        return view('admin.fileAttente' , compact('users', 'updated'));
    }

    public function up($id)
    {
        $rangId = DB::table('users')->select('rang')->where('id', $id)->get();

        DB::table('users')->where('rang', (($rangId[0]->rang)-1) )->increment('rang');
        DB::table('users')->where('id', $id)->decrement('rang');


       return redirect()->route('aFileAttente')
        ->with('status', 'Rang réduit de 1');
    }

    public function down($id)
    {
       $rangId = DB::table('users')->select('rang')->where('id', $id)->get();

        DB::table('users')->where('rang', (($rangId[0]->rang)+1) )->decrement('rang');
        DB::table('users')->where('id', $id)->increment('rang');



       return redirect()->route('aFileAttente')
        ->with('status', 'Rang augmenté de 1');
    }
    public function ListASupp($id)
    {    
        DB::table('users')->where('id', $id)->update(['rang' => null]);

        return redirect()->route('aFileAttente')
         ->with('status', 'Suppression éffectuée avec succès');
    }
}