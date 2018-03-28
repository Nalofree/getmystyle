<?php
/**
 * Created by PhpStorm.
 * User: nalofree
 * Date: 29.03.18
 * Time: 2:29
 */

namespace App\Http\Controllers;


class ProjectController extends Controller
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
     * Show the project info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        return void;
    }

    /**
     * Edit project.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
//        return view('home');
        return void;
    }
}