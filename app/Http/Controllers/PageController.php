<?php

namespace App\Http\Controllers;
use App\About;
use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        //
        $homepage = DB::table('homepages')->get();
        $about = DB::table('abouts')->get();
        $services = DB::table('services')->get();
        return view('pages.home',['homepage' => $homepage,'about' => $about,'services' => $services]);
    }

    public function about()
    {
        //
        $about = DB::table('abouts')->get();
        return view('pages.about',['about' => $about]);
    }

    public function services()
    {
        //
        $services = DB::table('services')->get();
        return view('pages.services',['services' => $services]);
    }

    public function products()
    {
        //
        return view('pages.products');
    }

    public function uses()
    {
        //
        return view('pages.uses');
    }
}
