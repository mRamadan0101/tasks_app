<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function credentials(Request $request)
    {
        if (is_numeric($request->get('email'))) {
            return ['phone_number' => $request->get('email'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password' => $request->get('password')];
        }
    }

    public function post_login(Request $request)
    {
        $credentials = $this->credentials($request);
        $user = Employee::where(key($credentials), reset($credentials))->whereTypeId(Employee::MANGER)->first();
        if ($user && auth('employees')->attempt($credentials)) {
            auth('employees')->login($user);
            return redirect(action('Dashboard\MangerController@index'));
        } else {
            return redirect()->back()->withErrors(['errors' => 'Invalid '.key($credentials). ' Or Password']);
        }
    }

    public function logout()
    {
        auth('employees')->logout();

        return redirect(url('/'));
    }
}
