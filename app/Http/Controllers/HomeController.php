<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $activities = collect([
             /* [
                'title' => 'home.banner1_title',
                'description' => 'home.banner1_description',
                'url' => '/dream-jobs-in-digital',
                'style_color' => 'background-image: linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%);',
                'btn_lang' => 'home.get_involved',
            ],     */
            [
                'title' => 'home.banner5_title',
                'description' => 'home.banner5_description',
                'url' => '/future-ready-csr',
                'style_color' => 'background: linear-gradient(36.92deg, rgb(51, 194, 233) 20.32%, rgb(0, 179, 227) 28.24%);',
                'btn_lang' => 'home.learn_more',
                'url2' => null,
                'btn2_lang' => null
            ],
             [
                'title' => 'home.banner4_title',
                'description' => 'home.banner4_description',
                'url' => 'https://codeweek.eu/blog/digital-educator-awards-2025/',
                'style_color' => 'background-image: linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%);',
                'btn_lang' => 'home.learn_more',
                'url2' => 'https://codeweek.eu/blog/digital-educator-awards-2025/ ',
                // 'btn2_lang' => 'home.download_brochure_btn',
            ],
            [
                'title' => 'home.banner6_title',
                'description' => 'home.banner6_description',
                'url' => 'https://airtable.com/appW5W6DJ6CI6SVdH/pagLDrU2NQja9F2vu/form',
                'style_color' => 'background: linear-gradient(36.92deg, rgb(51, 194, 233) 20.32%, rgb(0, 179, 227) 28.24%);',
                'btn_lang' => 'home.register_here', 
                'url2' => null,
                'btn2_lang' => null
            ],
            [
                'title' => 'home.banner3_title',
                'description' => __('home.when_text'),
                'url' => '/guide',
                'style_color' => 'background-image: linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%);',
                'btn_lang' => 'home.get_involved',
                'url2' => '/blog/code-week-25-programme/',
                // 'btn2_lang' => 'home.download_brochure_btn',
            ],
            [
                'title' => 'home.banner2_title',
                'description' => 'home.banner2_description',
                'url' => '/community',
                'style_color' => 'background: linear-gradient(36.92deg, rgb(51, 194, 233) 20.32%, rgb(0, 179, 227) 28.24%);',
                'btn_lang' => 'home.meet_our_community',
                'url2' => null,
                'btn2_lang' => null
            ]
        ]);
        return view('static.home', compact('activities'));
    }
}
