<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class PagesController extends Controller
{
    public function root()
    {

        return view('pages.root');
    }
    public function stemtoys()
    {
        return view('pages.stemtoys');
    }
    public function products()
    {
        return view('pages.products');
    }
    public function about()
    {
        return view('pages.about');
    }
    //用户动态设置语言本地化
    public function lang(Request $request)
    {
        App::setLocale($request->lang);
        Session::put('lang', App::getLocale());
        //return view('pages.root');
        return redirect()->back();

    }
}

