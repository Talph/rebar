<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GalleryController extends Controller
{

    public function index(): Factory|View|Application
    {

        $images = \File::allFiles(public_path('gallery'));

        return View('website.gallery', [
            'images' => $images
        ]);

    }
}