<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $pageTitle;

    public function __construct()
    {

    }
    public function index()
    {
        $pageTitle = 'Welcome';
        return view('landing.index', compact('pageTitle'));
    }
    public function book()
    {
        $pageTitle = 'Book a Session';
        return view('landing.book', compact('pageTitle'));
    }
}