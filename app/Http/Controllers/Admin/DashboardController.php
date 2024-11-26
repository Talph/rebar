<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller

{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        $packages = 15014;//Package::count();
        $leads = 1000; //LeadHome::count();
        $preorders = 100; //PreorderHome::count();

        return view('backend.home', [
            'packages' => $packages,
            'leads' => $leads,
            'preorders' => $preorders
        ]);
    }
}