<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $questions = [
            [
                "title1" => "Why should you bring coding to your classroom?",
                "title2" => "How can coding benefit your students? What is in it for you as a teacher ?",
                "content" => [
                    "We believe anybody’s basic literacy in a digital age must include an understanding of coding and the development of crucial competences related to computational thinking, such as problem solving, collaboration and analytical skills.",
                    "Learning how to code can empower your students to be at the forefront of a digitally competent society, develop a better understanding of the world that surrounds them and get better chances to succeed in their personal and professional lives.",
                    "Code Week offers all students the possibility to make their first steps as digital creators, by providing schools and teachers free professional development opportunities, teaching materials, international challenges and opportunities to exchange."
                ]

            ]
        ];
        return view('schools', compact('questions'));
    }
}
