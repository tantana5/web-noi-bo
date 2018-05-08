<?php namespace Custom\Services;
use Illuminate\Support\Facades\Auth;

class PermissionCommon {

    private $currentUser;

    public function __construct(Auth $auth){
        $this->currentUser = Auth::user();
    }

    const SALE = 1;
    const TECH = 2;
    const COUNTER = 3;
    const ADMIN = 4;

    /*
    | -------------------------------------------------
    | GET ROLE NAME BY NUMBER ENUM
    | -------------------------------------------------
    | @params enum $id
    | @author : tantan
    */
    public static function getRoleName($id) : string{
        if( $id == self::ADMIN ) return 'admin';
        if( $id == self::TECH ) return 'Kỹ thuật';
        if( $id == self::COUNTER ) return 'kế toán';
        if( $id == self::SALE ) return 'nv kinh doanh';
        return null;
    }

}