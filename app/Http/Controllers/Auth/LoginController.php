<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;



class LoginController extends Controller
{
    use AuthenticatesUsers;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $redirectTo = '/home';

    private $repository;
    private $validator;


    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository;
        $this->validator;

    }

    /*
    |--------------------------------------------------------------------------
    |  method to user Login view
    |--------------------------------------------------------------------------
    |
    */

    public function login() {
        return view('user.login');
    }

    public function auth(Request $request) {
        echo 'Boas- vindas';
    }


}
