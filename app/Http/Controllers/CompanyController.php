<?php
/**
 * Created by PhpStorm.
 * User: nalofree
 * Date: 29.03.18
 * Time: 2:29
 */

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class CompanyController extends Controller
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
     * Show the copmpany info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        return "index";
    }

    /**
     * Edit copmpany.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
//        return view('home');
        $id = Auth::user()->company_id;
        if ($id == null) {
            $company = null;
        }else{
            $companies = DB::select('select * from companies where id = ?', [$id]);;
            $company = $companies[0];
        }

        return view('company.edit',[
            'company' => $company,
        ]);
    }

    /**
     * Add copmpany.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        DB::insert('insert into `companies` (name, description) values (?, ?)', [Input::get('name'), Input::get('description')]);
        $id = DB::getPdo()->lastInsertId();;
        DB::update('update users set company_id =  ? WHERE id = ?', [$id, Auth::user()->id]);
        $request->session()->flash('message', 'Данные сохранены!');
        return redirect('company');
    }

    /**
     * Save copmpany.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
//        return view('home');
        DB::update('update companies set name = ?, description = ? where id = ?', [Input::get('name'), Input::get('description'), Auth::user()->company_id]);
        $request->session()->flash('message', 'Данные сохранены!');
        return redirect('company');

    }

    /**
     * Delete copmpany.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
//        return view('home');
        return "edit";
    }
}