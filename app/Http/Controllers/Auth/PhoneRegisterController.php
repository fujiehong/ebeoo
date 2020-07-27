<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class PhoneRegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo=RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guess');
    }
}
