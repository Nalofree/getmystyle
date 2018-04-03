<?php
/**
 * Created by PhpStorm.
 * User: nalofree
 * Date: 29.03.18
 * Time: 2:29
 */

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        return "index";
    }

    /**
     * Edit project.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
//        return view('home');
        if ($id == null) {
            $project = null;
        }else{
            $project = Project::whereId($id)->first();
            if (!$project) {
                $project = null;
            }
        }

//        dump($project);

        return view('project.edit',[
            'project' => $project,
        ]);
    }

    /**
     * Show projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        return view('home');
        $id = Auth::user()->company_id;
        if ($id == null) {
            $projects = null;
        }else{
            $projects = Project::whereCompanyId(Auth::user()->company_id)->get();
            if (!$projects) {
                $projects = null;
            }
        }

        return view('project.show',[
            'projects' => $projects,
        ]);
    }

    /**
     * Show current project.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCurrent(Request $request, $id)
    {
//        return view('home');
        if (!Auth::user()) {
            return redirect('login');
        }else{
            $project = Project::whereId($id)->first();
            if (!$project) {
                $project = null;
            }
        }

        return view('project.showcurent',[
            'project' => $project,
        ]);
    }

    /**
     * Add project.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if (!Auth::user()->company_id) {
            $request->session()->flash('message', 'Сначала создайте компанию!');
            return redirect('projects');
        }
        DB::insert('insert into `projects` (name, description, company_id) values (?, ?, ?)', [Input::get('name'), Input::get('description'), Auth::user()->company_id]);
        $request->session()->flash('message', 'Данные сохранены!');
        return redirect('projects');
    }

    /**
     * Save project.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
//        return view('home');
        DB::update('update projects set name = ?, description = ? where id = ?', [Input::get('name'), Input::get('description'), $id]);
        $request->session()->flash('message', 'Данные сохранены!');
        return redirect('projects');

    }

    /**
     * Delete project.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
//        return view('home');
        return "edit";
    }
}