<?php
namespace App\Http\Controllers\Auth;
// use App\Http\Controllers\Administrators\Authenticate\Auth;
use App\Http\Controllers\Controller;
use App\Models\Systems\Company;
use App\Models\Users\User;
use App\Services\AuthService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    private $request;

    private $response;

    private $user;


    public function __construct(Request $request, User $user, ResponseService $response, AuthService $auth) {
        $this->request  = $request;
        $this->user     = $user;
        $this->auth     = $auth;
        $this->response = $response;
        // $this->middleware('auth', ['except' => ['postLogin', 'getLogin']]);
    }

    public function postLogin() {
        return $this->auth->login();
    }

    public function getLogout() {
        return $this->auth->logout();
    }

    public function getLogin() {
        // if (AuthService::isLogged()) {
        if (Auth::check()) {
            return redirect()->action('Admin\DashboardController@index');
        }
        return AuthService::redirectLogin();
    }
}
