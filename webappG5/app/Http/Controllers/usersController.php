<?php

namespace App\Http\Controllers;
use DB;
use PDF;

use Illuminate\Http\Request;

class usersController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
//        $username = $request->username;
        $pass = md5($request->input('password'));

        $results = DB::table('tbl_users')
            ->where('username', $email)
            ->where('password', $pass)
            ->first();

            if ($results != false) {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('loginMsg', 'Username or Password incorrect !!');
            }
        }  

    }
}