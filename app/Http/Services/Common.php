<?php namespace Custom\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Common {

    private $currentUser;
    private $userModel;


    public function __construct(Auth $auth, UserModel $userModel){
        $this->currentUser = Auth::user();
        $this->userModel = $userModel;
    }

    /*
    |--------------------------------------------
    | CHECK NULL AND GET OBJECT
    |--------------------------------------------
    | @params object, method, default value return if null
    | @author tantan
    |*/
    public static function getObject($obj, $method, $default = null){
        if( !($obj) ){
            return $default;
        }
        if( !($obj->$method) ){
            return $default;
        }
        return $obj->$method;
    }

}