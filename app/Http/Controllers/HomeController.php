<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-20 10:42:36
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-20 15:03:48
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $activities = collect([
            [
                'title' => 'October 11-26',
                'description' => 'Learning to code helps us make sense of the rapidly changing world around us. Join millions of fellow organisers and participants to inspire the development of coding and computational thinking skills in order to explore new ideas and innovate for the future.',
                'url' => '/guide',
                'style_color' => 'background-image: linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%);',
                'btn_lang' => 'home.get_involved',
            ],
            [
                'title' => 'Girls in Digital',
                'description' => 'Explore and embrace digital opportunities—empowering a new generation of girls in digital!',
                'url' => '/girls-in-digital-week',
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
