<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $activities = collect([
            [
                'title' => 'Careers in Digital',
                'description' => 'Get inspired by dream jobs in digital and explore role models, career guides, open day toolkits and more!',
                'url' => '/dream-jobs-in-digital',
                'style_color' => 'background-image: linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%);',
                'btn_lang' => 'home.get_involved',
            ],
            [
                'title' => 'Our Code Week Family',
                'description' => 'Discover our vibrant network of ambassadors, teachers, students and hubs—each contributing to our shared passion for digital education.',
                'url' => '/community',
                'style_color' => 'background: linear-gradient(36.92deg, rgb(51, 194, 233) 20.32%, rgb(0, 179, 227) 28.24%);',
                'btn_lang' => 'home.meet_our_community',
            ]
        ]);
        
        return view('static.home', compact('activities'));
    }
}
