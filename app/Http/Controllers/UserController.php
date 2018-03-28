<?php
/**
 * Created by PhpStorm.
 * User: nalofree
 * Date: 29.03.18
 * Time: 2:10
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
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
     * Show the personal cabinet.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        return void;
    }

    /**
     * Edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
//        return view('home');
        return void;
    }
}