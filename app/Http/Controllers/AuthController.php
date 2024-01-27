<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
  public function signin(Request $request){
$request->validate([
'username'=>'required',
'password'=>'required'
]);

$pengguna=admin::where('username',$request->username)
->where('password',$request->password)->first();
if(!$pengguna)return Controller::failed('gagal signin ');

$token=md5($request->username);
$pengguna->update(['token'=>$token]);

return Controller::success('sign in success',$pengguna);
    }

    public function signout(Request $request){
        $token=$request->query('token');
        $pengguna= admin::where('token',$token)->first();

        $pengguna->update(['token'=>null]);

        return Controller::success('logout success');
    }
}
