<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
        $user = User::whereId(Auth::user()->id)->first();
        $company = Company::whereId(Auth::user()->company_id)->first();
        if (!$company) {
            $company = null;
        }
        return view('home', [
            'company' => $company,
            'user' => $user,
        ]);
    }
}
