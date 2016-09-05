<?php
/**
 * Created by PhpStorm.
 * User: alast
 * Date: 5/09/16
 * Time: 03:02 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function getIndex(){
        $result = \DB::table('users')
            //->select(['first_name', 'last_name'])
            ->orderBy('users.id', 'ASC')
            ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->get();
        return $result;
    }

}