<?php

namespace App\Http\Controllers\Services;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StructuralSteelWorksController
{
    public function index(): Factory|View|Application
    {
        return view('services.steel.structural');
    }
}
