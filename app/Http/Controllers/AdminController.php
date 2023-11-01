<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Accomodation;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function userShow()
    {
        $users = User::all();
        return view('admin.userShow',
        ['users' => $users]);
    }

    public function userDetailed($usr)
    {
        $user = User::findOrFail($usr);
        return view('admin.userDetail',
        ['user' => $user]);
    }

    public function accomodationShow()
    {   
        $users = User::join('accomodations', 'users.id', '=', 'accomodations.user_id')
                ->orderBy('accomodations.presence', 'desc')
                ->orderBy('accomodations.stay_over', 'desc')
                ->orderBy('accomodations.number_of_guests_weekend', 'desc')
                ->orderBy('accomodations.number_of_guest_sat', 'desc')
                ->orderBy('accomodations.dinner_sat', 'desc')
                ->orderBy('accomodations.brunch_sun', 'desc')
                ->orderBy('accomodations.dinner_sun', 'desc')
                ->get();
        return view('admin.accomodationShow', compact('users'));
    }
}
