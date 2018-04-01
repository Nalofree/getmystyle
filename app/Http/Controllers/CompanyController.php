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
    public function edit(Request $request, $id=null)
    {
//        return view('home');
        if ($id == null) {
            $company = null;
        }else{
            if ($id != Auth::user()->compamy_id) {
                return redirect('login');
            }
            $company = Company::where('id', '=', $id)->firstOrFail();
        }


        dump($company);

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
//        return view('home');
//        return "edit";
        $company = new Company;
        $company->name = '123';
        $company->description = '123';
        $company->save();
    }

    /**
     * Save copmpany.
     *
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
//        return view('home');
        return "edit";
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