<?php

namespace App\Http\Controllers;

use App\OnlineCoursesPage;
use App\OnlineCourse;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class OnlineCoursesController extends Controller
{
    /**
     * Show the Online Courses page (https://codeweek.eu/online-courses).
     * Courses are managed in Nova; displayed in order of position then created_at.
     */
    public function index(): View
    {
        $onlineCourses = OnlineCourse::active()->ordered()->get();
        $page = Schema::hasTable('online_courses_page') ? OnlineCoursesPage::config() : null;

        return view('online-courses', compact('onlineCourses', 'page'));
    }
}
