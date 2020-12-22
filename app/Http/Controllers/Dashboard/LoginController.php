<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
class LoginController extends Controller
{
  public function login(){
    return view('dashboard.auth.login');
  }

  public function logout(){
    //\Auth::logout();
    auth()->guard('admin')->logout();
		return redirect('/admin/login');
  }

  public function postlogin(AdminLoginRequest $request){
    $rememberme = request('rememberme') == 1?true:false;
		if (auth()->guard('admin')->attempt(['email' => request('email'), 'password'=>request('password')], $rememberme)) {
			return redirect('/admin');
		} else {
      // session()->flash('error', trans('admin.inccorrect_information_login'));
      return redirect()->back()
      ->with(['error'=>'هناك خطا بالبيانات']);
    }
  }
}
