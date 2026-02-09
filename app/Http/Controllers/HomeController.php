<?php

namespace App\Http\Controllers;

use App\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $activities = $this->getActivities();

        return view('static.home', compact('activities'));
    }

    /**
     * Homepage slider slides: from Nova (home_slides) when present, else default hardcoded set.
     */
    private function getActivities()
    {
        if (Schema::hasTable('home_slides')) {
            $slides = HomeSlide::active()->ordered()->get();
            if ($slides->isNotEmpty()) {
                return $slides->map(function (HomeSlide $slide) {
                    return [
                        'title' => $slide->title,
                        'description' => $slide->description ?? '',
                        'url' => $slide->url,
                        'btn_lang' => $slide->button_text,
                        'url2' => $slide->url2,
                        'btn2_lang' => $slide->button2_text,
                        'image' => $slide->image_url,
                        'show_countdown' => $slide->show_countdown,
                        'countdown_target' => $slide->countdown_target?->toIso8601String(),
                    ];
                })->values();
            }
        }

        $defaultImages = [
            asset('/images/dream-jobs/dream_jobs_bg.png'),
            asset('/images/digital-girls/banner_bg.png'),
            asset('images/homepage/slide1.png'),
            asset('images/search/search_bg_lg_2.jpeg'),
            asset('/images/homepage/festive_acts_of_digital_kindness.png'),
        ];

        return collect([
            [
                'title' => 'home.banner5_title',
                'description' => 'home.banner5_description',
                'url' => '/future-ready-csr',
                'btn_lang' => 'home.learn_more',
                'url2' => null,
                'btn2_lang' => null,
                'image' => $defaultImages[0] ?? null,
                'show_countdown' => false,
                'countdown_target' => null,
            ],
            [
                'title' => 'home.banner4_title',
                'description' => 'home.banner4_description',
                'url' => 'https://codeweek.eu/blog/code-week-digital-educator-awards-2025/',
                'btn_lang' => 'home.view_winners',
                'url2' => 'https://codeweek.eu/blog/code-week-digital-educator-awards-2025/',
                'btn2_lang' => null,
                'image' => $defaultImages[1] ?? null,
                'show_countdown' => false,
                'countdown_target' => null,
            ],
            [
                'title' => 'home.banner6_title',
                'description' => 'home.banner6_description',
                'url' => 'https://airtable.com/appW5W6DJ6CI6SVdH/pagLDrU2NQja9F2vu/form',
                'btn_lang' => 'home.register_here',
                'url2' => null,
                'btn2_lang' => null,
                'image' => $defaultImages[2] ?? null,
                'show_countdown' => false,
                'countdown_target' => null,
            ],
            [
                'title' => 'home.banner3_title',
                'description' => 'home.when_text',
                'url' => '/guide',
                'btn_lang' => 'home.get_involved',
                'url2' => '/blog/code-week-25-programme/',
                'btn2_lang' => null,
                'image' => $defaultImages[3] ?? null,
                'show_countdown' => false,
                'countdown_target' => null,
            ],
        ]);
    }
}
