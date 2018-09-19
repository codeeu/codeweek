<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $questions = [
            [
                "title1" => __('schools.1.title1'),
                "title2" => __('schools.1.title2'),
                "content" => [
                    __('schools.1.content.0'),
                    __('schools.1.content.1'),
                    __('schools.1.content.2'),
                ],
                "button" => [
                    "show"=> true,
                    "label"=>__('schools.1.button.label'),
                    "link"=>"/login"
                ],
                "map" => false
            ],

            [
                "title1" => __('schools.2.title1'),
                "title2" => __('schools.2.title2'),
                "content" => [
                    __('schools.2.content.0'),
                    __('schools.2.content.1'),
                ],
                "button" => [
                    "show"=> true,
                    "label"=>__('schools.2.button.label'),
                    "link"=>"/add"
                ],
                "map" => true
            ], [
                "title1" => __('schools.3.title1'),
                "title2" => __('schools.3.title2'),
                "content" => [
                    __('schools.3.content.0'),
                    __('schools.3.content.1'),
                ],
                "button" => [
                    "show"=> true,
                    "label"=>__('schools.3.button.label'),
                    "link"=>"/training"
                ],
                "map" => false
            ],

            [
                "title1" => __('schools.4.title1'),
                "title2" => __('schools.4.title2'),
                "content" => [
                    __('schools.4.content.0'),
                ],
                "button" => [
                    "show"=> true,
                    "label"=>__('schools.4.button.label'),
                    "link"=>"/codeweek4all"
                ],
                "map" => false
            ]







        ];
        return view('schools', compact('questions'));
    }
}
