<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dump(Auth::user()->company_id);
        $users = DB::select('select * from users where id = ?', [Auth::user()->id]);;
        $user = $users[0];
        $companies = DB::select('select * from companies where id = ?', [Auth::user()->company_id]);;
        if ($companies) {
            $company = $companies[0];
        }else{
            $company = null;
        }
        return view('home', [
            'company' => $company,
            'user' => $user,
        ]);
    }
}
