<?php

namespace Database\Seeders;

use App\OnlineCourse;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Seeds the online_courses table with the courses that were previously hardcoded
 * in resources/views/online-courses.blade.php. Run after migrating.
 */
class OnlineCourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Navigating Innovative Technologies Across the Curriculum',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+NavigatingTech+2023/about',
                'date_display' => '9 October – 15 November 2023 ',
                'image' => 'navigating-innovative-technologies-across-the-curriculum.png',
                'description' => 'The online course Navigating Innovative Technologies Across the Curriculum welcomes educators interested in integrating coding, computational thinking, virtual and augmented reality into their classrooms through interdisciplinary and cross-curricular projects, encouraging exploration of innovative technologies and their effective use.',
                'position' => 0,
                'created_at' => '2023-10-01',
            ],
            [
                'title' => 'Unlocking the Power of AI in Education',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI_Education+2023/about',
                'date_display' => '13 March – 19 April 2023',
                'image' => 'unlocking-the-power-of-ai.png',
                'description' => "The Unlocking the Power of AI in Education MOOC aims to provide teachers with a basic understanding of AI's potentials and challenges in education, safe and effective use of educational data, ethical implications of AI in the classroom and the implementation of AI-related resources and materials in teaching practice.",
                'position' => 1,
                'created_at' => '2023-03-01',
            ],
            [
                'title' => 'EU Code Week Bootcamp 2022',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Bootcamp+2022/about',
                'date_display' => '10 October – 16 November 2022',
                'image' => 'eu-code-week-bootcamp-2022.jpg',
                'description' => 'The EU Code Week Bootcamp is designed for teachers who want to integrate coding and computational thinking into their classrooms with practical ideas and resources, while promoting diversity and inclusion in coding and exploring the potentials of artificial intelligence in education.',
                'position' => 2,
                'created_at' => '2022-10-01',
            ],
            [
                'title' => 'EU Code Week Online Bootcamp',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+OnlineBootcamp+2021/about',
                'date_display' => '27 September – 27 October 2021',
                'image' => 'eu-code-week-online-bootcamp.jpg',
                'description' => 'The EU Code Week Online Bootcamp introduces teachers to the EU Code Week initiative and the opportunities it offers. Pre-primary, primary, and secondary school teachers are provided with practical ideas, tools, and resources for incorporating coding and computational thinking into the classroom.',
                'position' => 3,
                'created_at' => '2021-09-01',
            ],
            [
                'title' => 'AI Basics for Schools',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI+2021/about',
                'date_display' => '8 March – 7 April 2021',
                'image' => 'ai-basics-for-schools.jpg',
                'description' => 'The course introduces teachers to the basic concepts of AI. It provides them with examples of effective use of AI in the classroom and supports them in the integration and creation of AI-related activities in the classroom. Teachers learn to recognize and raise awareness of threats and benefits of AI and examine the ethical use of AI.',
                'position' => 4,
                'created_at' => '2021-03-01',
            ],
            [
                'title' => 'EU Code Week Deep Dive MOOC 2020',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2020/about',
                'date_display' => '16 September – 20 October 2020',
                'image' => 'eu-code-week-deep-dive-mooc-2020.jpg',
                'description' => 'The course aims to raise awareness about integrating coding and computational thinking into the classroom, familiarize teachers with innovative tools and approaches, offer free training materials in 29 languages, teach how to register activities for the EU Code Week initiative, explore the Code Week 4 all challenge and foster a community of enthusiastic teachers for best practice sharing.',
                'position' => 5,
                'created_at' => '2020-09-01',
            ],
            [
                'title' => 'EU Code Week Icebreaker Rerun',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about',
                'date_display' => '11 May – 15 June 2020',
                'image' => 'icebreaker.jpg',
                'description' => 'This short introductory course aims to make EU Code Week more appealing and meaningful for teachers, schools, and parents while raising awareness about the importance of integrating coding and computational thinking into their lesson. Learning how to code can empower students to be at the forefront of a digitally competent society, develop a better understanding of the world that surrounds them, and increase their chances to succeed in their personal and professional lives.',
                'position' => 6,
                'created_at' => '2020-05-01',
            ],
            [
                'title' => 'EU Code Week - Deep Dive MOOC',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2019/about',
                'date_display' => '16 September – 30 October 2019',
                'image' => 'eu-code-week-deep-dive-mooc-2019.png',
                'description' => 'The course aims to help participants understand the importance of integrating coding and computational thinking in the classroom, become familiar with innovative tools and approaches, gain basic knowledge of the Code.org CS fundamentals curriculum, access free training materials and resources, explore the EU Code Week campaign, including activity registration and reporting.',
                'position' => 7,
                'created_at' => '2019-09-01',
            ],
            [
                'title' => 'EU Code Week - Ice-breaker MOOC',
                'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2019/about',
                'date_display' => '3 – 26 June 2019',
                'image' => 'icebreaker-2019.png',
                'description' => 'The course aims to introduce participants to EU Code Week and familiarize with the new EU Code Week website, explore and access free lesson plans to register activities for EU Code Week, discover various classroom support resources, and become acquainted with the toolkit designed for teachers.',
                'position' => 8,
                'created_at' => '2019-06-01',
            ],
        ];

        foreach ($courses as $course) {
            $createdAt = $course['created_at'] ?? null;
            unset($course['created_at']);
            $attrs = array_merge($course, ['active' => true]);
            $model = OnlineCourse::firstOrCreate(['url' => $course['url']], $attrs);
            if ($createdAt && $model->wasRecentlyCreated) {
                $model->created_at = Carbon::parse($createdAt);
                $model->save();
            }
        }
    }
}
