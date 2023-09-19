<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function check(){
        if(Auth::check()){
            return view('admin/index',[
                'rooms' => Room::get()
            ]);
        }else{
            return redirect('session');
        }
    }

    function dashboardDate(Request $request, $clickedDate = null){
        $clickedDate = $request->query('clickedDate');
        return view('login', compact('clickedDate'));
    }

    function login(Request $request){
        $request->validate([
            'username' =>'required',
            'password' =>'required'
        ],[
            'username.required' =>'Username Harus Diisi',
            'password.required' =>'Password Harus Diisi'
        ]);

        $loginInfo = [
            'name' => $request->username,
            'password' => $request->password
        ];


        if (Auth::attempt($loginInfo)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/bookings')->with('success', 'anjay mabar');
            } elseif ($user->role == 'employee') {
                $userID = $user->id;
                $clickedDate = $request->input('clickedDate');
                if ($clickedDate) {
                    return redirect()->route('form.employee', ['id' => $userID, 'clickedDate' => $clickedDate]);
                } else {
                    return redirect()->route('home.employee', ['id' => $userID]);
                }
            }
        } else {
            Session::flash('error', 'Username or password is incorrect');
            return redirect()->back();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('session');
    }


}

