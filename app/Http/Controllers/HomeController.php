<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    /**
     * Get the home page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.index');
    }
}
