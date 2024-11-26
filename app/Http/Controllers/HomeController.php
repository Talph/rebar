<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    public function about(): Factory|View|Application
    {
        return view('website.about');
    }

    public function services(): Factory|View|Application
    {

        return view('website.services');
    }

    public function contact_page(): Factory|View|Application
    {

        return view('website.contact');
    }

    public function director(): Factory|View|Application
    {

        return view('website.director');
    }

    public function team(): Factory|View|Application
    {

        return view('website.team');
    }

    public function certifications_memberships(): Factory|View|Application
    {

        return view('website.certificationMembership');
    }

    public function gallery(): Factory|View|Application
    {

        $images = \File::allFiles('gallery');

        return View('website.gallery')->with(array('images' => $images));
    }
}
