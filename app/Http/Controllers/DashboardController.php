<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use App\User;

class DashboardController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    |  method to user Login view
    |--------------------------------------------------------------------------
    |
    */

    public function index() {
        return view('form');
    }

    public function login() {
        return view('user.login');
    }

    public function auth(Request $request) {
        
        $data = [
            'email' => $request->get('name'),
            'password' => $request->get('password')
        ];

        try {
            if(env('PASSWORD_HASH')){
                Auth::attempt($data, false);
            }else{
                $users = User::where('name', 'LIKE', '%' . $request->get('name') . '%')->get();

                
                foreach ($users as $user) {
                    if($request->get('name') != $user->name){
                        return back()->with('warning','Usuário inválido!');
                    }
                    if($request->get('password') != $user->password){
                        return back()->with('warning','Senha inválida!');
                    } 
                }
                
                Auth::login($user);
            }

            return redirect('form');

        } catch (Exception $e) {
            if($e->getMessage() === 'Undefined variable: user'){
                return back()->with('warning','Usuário inválido!');
            }
            return $e->getMessage();
        }
    }

    public function getLogout(){
        Auth::logout();
        \Session::flush();
        return redirect('login');
    }
}
