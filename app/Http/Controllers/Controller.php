<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\News;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    { 
        $today = Carbon::now()->toDateString();
        $newsPosts = News::whereDate('uploadDate', $today)->get();
        if(!$newsPosts->isEmpty())
        {
            return view('home.index',
            ['news' => $newsPosts]);
        }
        else
        {
            return view('home.index');
        }
        
    }

    public function map()
    {
        return view('home.festivalMap');
    }

    public function lineup()
    {
        return view('home.programma');
    }

    public function profileView()
    {
        return view('profile.view');
    }

    public function editView()
    {
        return view('profile.edit');
    }

    public function profileViewPost()
    {
        $data = request()->validate(
            [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required','email'],
                'phonenumber' => ['nullable'],
                'date_of_birth' => ['nullable'],
            ]
            );
        $user = Auth::user();
        $user->update($data);
        return redirect()->route("profileView");
    }

    public function deleteView()
    {
        return view('profile.delete');
    }

    public function deleteConfirmed()
    {
        Auth::user()->delete();
        return redirect()->route('index');
    } 

    public function changePassword()
    {
        return view('profile.changePassword');
    }

    public function TrychangePassword()
    {
        if(Auth::check())
        {
            $data = request()->validate(
                [
                    'password' => [],
                    'newPassword' => ['required', 'same:newPasswordCon']
                ]
                );

            if (Hash::check($data['password'], Auth::user()->password)) 
            {
                $data['password'] = Hash::make($data['newPassword']);
                Auth::user()->update($data);
                session()->flash('success', 'Password succesfuly changed');
                return redirect()->route('profileView');
            }
            else
            {
                return redirect()->back()->withErrors(['msg' => "the old Password doesn't match our records"]);
            }
            
        }
        return redirect()->route('profileView')->withErrors(['msg' => 'Couldnt change password']);
    }
}
