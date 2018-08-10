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
                ],
                "button" => [
                 "label"=>"Want to get started right away? Sign up here!",
                 "link"=>"/add"
                ]
            ],
            [
                "title1" => "Ready to get involved?",
                "title2" => "Organise a lesson, a training session, or an event, and pin it on the map.",
                "content" => [
                    "Whether you have any coding or programming knowledge or not, you can easily organise a lesson in your classroom, an open day, or an event at your school. Just find a date and register your activity in the map below. If you feel like you need support with preparing a lesson with coding, skip to the next section.",
                    "Have a look at some examples of activities that are being organised browsing the map below and add your own to join thousands of fellow educators across Europe and beyond: [embed map]"

                ],
                "button" => [
                    "label"=>"Ready to give it a go? Add an activity!",
                    "link"=>"/add"
                ],
                "map" => true

            ],
            [
                "title1" => "New to Coding? No worries",
                "title2" => "Our tools help introduce you to coding before bringing it to your students",
                "content" => [
                    "If you are interested in bringing coding to your classroom but you don´t know where to start, do not worry! An international team of teachers and experts have been developing a set of short online training modules to help get you started.",
                    "No previous experience of coding is needed to follow our learning bits!"

                ],
                "button" => [
                    "label"=>"Access the training modules",
                    "link"=>"/add"
                ]

            ],
            [
                "title1" => "Looking for an extra challenge ?",
                "title2" => "Build a network of activities, engage as many students as possible, and earn the Certificate of Excellence",
                "content" => [
                    "Code Week 4 All challenges you to join forces with other teachers or schools and participate in an international community of like-minded people giving to student the opportunity to make their first steps in coding. Build an alliance that engages more than a 1 000 students and you will gain the Certificate of Excellence."
                ],
                "button" => [
                    "label"=>"Learn more about the Code Week 4 All challenge",
                    "link"=>"/add"
                ]

            ],



        ];
        return view('schools', compact('questions'));
    }
}
