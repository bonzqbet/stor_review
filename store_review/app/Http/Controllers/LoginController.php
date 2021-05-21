<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //
    public function index(Request $req){
        $db = new DB;
        $user = $db::table('sy_stf')->where(
            [
                ['sy_stf_username','=', $req->inputUser],
                ['sy_stf_password','=' , encodeStr($req->inputPass)],
                ['sy_stf_status','=' , 'Enable'],
            ])->get();
        
        if(empty($user[0])){
            return view('front.core.login')->with('success','You entered incorrect username / password.');
        }

        // set session login
        Session::put('status', $user[0]->sy_stf_roll);
        Session::put('username', $user[0]->sy_stf_username);
        Session::put('id', $user[0]->sy_stf_id);
        Session::put('active', '');
        

        return redirect()->route('store.index');
        
    }

    public function create(Request $req){
        if($req->inputPass == $req->inputPassConfirm){
            $db = new DB;
            $MaxOrder = $db::table('sy_stf')->max('sy_stf_order');
            if($MaxOrder == null){
                $MaxOrder = 1;
            }
            else{
                $MaxOrder +=1;
            }
            $db::table('sy_stf')->insert(
                [
                    'sy_stf_username' => $req->inputUser,
                    'sy_stf_password' => encodeStr($req->inputPass),
                    'sy_stf_status' => 'Enable',
                    'sy_stf_roll' => 'Normal',
                    'sy_stf_order' => $MaxOrder
                ]
            );
            return view('front.core.login')->with('success','Register Successfully.');
        }
        return view('front.core.register')->with('success','Passwords do not match.');
    }

    public function logout(){
        Session::forget('username'); // Removes a specific variable
        Session::forget('status'); // Removes a specific variable
        return view('front.core.login');
    }

}
