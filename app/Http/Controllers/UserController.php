<?php
/**
 * Created by PhpStorm.
 * User: nalofree
 * Date: 29.03.18
 * Time: 2:10
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use Exception;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /**
     * Show the personal cabinet.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        return "index";
    }

    /**
     * Edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();

        return view('profile.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        $user = User::where('id', '=', Input::get('id'))->firstOrFail();

        dump($user);
        dump(Auth::user());

        if (Auth::user() != $user) {
            throw new AccessDeniedException('It is not you!');
        }

//        if(Request::ajax()){
            // $user->fill(\Input::all());
            $user->name = Input::get('name');
            $user->save(); // no validation implemented
//            return response()->json([
//                'status' => 1
//            ]);
//        }else{
//            throw new AccessDeniedException('It is not you!');
//            return response()->json([
//                'status' => 0
//            ]);
//        }
//        return back()->with('success', 'Данные сохранены');;
        $request->session()->flash('message', 'Данные сохранены!');
        return redirect('profile/'.$user->id);

    }
}