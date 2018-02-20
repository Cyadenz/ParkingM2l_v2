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

    public function Reserv()
    {
        $reservs = reservations::all();
        // $utils = DB::table('users')->whereNotNull('idPlaceReserve')->get();

        $utils = user::all();
        return view('admin.reservations' , compact('reservs', 'utils'));
    }

    public function ReservSupp($id_place)
    {
        DB::table('reservations')->where('id_place', $id_place)->delete();

        // $idfdp = DB::table('places')->select('idUserReserve')->where('idplace', $id_place)->get();
        // DB::table('users')->where('id', $idfdp)->update(['idPlaceReserve' => null]);

        DB::table('places')->where('idplace', $id_place)->update(['reserver' => 0,'idUserReserve' => null]);

        return redirect()->route('aReservs')
        ->with('status', 'Suppresion éffectuée avec succès');
    }
}