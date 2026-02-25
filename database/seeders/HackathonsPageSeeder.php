<?php

namespace Database\Seeders;

use App\HackathonsPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HackathonsPageSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('hackathons_page')) {
            return;
        }

        HackathonsPage::firstOrCreate(
            ['id' => 1],
            [
                'dynamic_content' => false,
                'hero_title' => 'Hackathons',
                'hero_subtitle' => 'Bring your ideas to life!',
                'intro_title' => 'Hackathons',
                'intro_paragraph_1' => "A hackathon is an event where participants with diverse skills collaborate to tackle global challenges. Participants form teams to brainstorm, design, and code, aiming to produce a working solution or prototype by the event's conclusion. Beyond fostering innovation and teamwork, EU Code Week hackathons offer a platform for young enthusiasts to learn, showcase their talents, and connect with like-minded peers.",
                'intro_paragraph_2' => 'Adapting the traditional hackathon format, the EU Code Week Hackathons take into consideration the age of the participants and cater to the unique skills, insights, and interests of adolescents. The aim of the EU Code Week Hackathons is to inspire young people to develop their coding and problem-solving skills by engaging them in collaborative, creative, and innovative projects.',
                'details_title' => 'EU Code Week Hackathons 2025-26',
                'details_paragraph_1' => 'EU Code Week Hackathons share a common theme that strengthens connection and belonging among young innovators across Europe. The central theme for the 2025 edition is <strong>From Code to Community: Bridging Digital Skills and Social Impact.</strong>.',
                'details_paragraph_2' => 'The ten national hackathons — <strong><a href="https://codeweek.eu/blog/hackathons-italy/">Italy (Florence)</a>, <a href="https://codeweek.eu/blog/hackathons-italy/">Italy (Turin)</a>, <a href="https://codeweek.eu/blog/greek-hackathon-2025/">Greece</a>, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-croatia/">Croatia</a>, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-ukraine/">Ukraine</a>, Turkey, Spain, Lithuania, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-slovenia/">Slovenia</a>, and France</strong> — mark a vibrant journey of creativity and collaboration. <strong>Italy (Florence)</strong> opened the series with its event in October 2025, while all other national hackathons are taking place <strong>from now until the end of January 2026</strong>. Each event invites teams of young people aged 15 to 19 to learn, innovate, and develop digital solutions that tackle real societal challenges.',
                'details_paragraph_3' => 'Join us online for the <strong>EU Finals on 11 March 2026</strong>, where all national finalists will present their projects and celebrate their shared achievements. Expect inspiring ideas, expert jury insights, and plenty of positive energy — a celebration of how young people use technology to make a difference.',
                'details_paragraph_4' => 'Be part of the excitement as we honour the outstanding teams shaping the future of digital innovation!',
                'video_url' => 'https://www.youtube.com/embed/fx0zJCpUTa8',
                'recap_button_text' => 'Hackathons Final 2024 Recap',
                'recap_button_link' => 'https://eventornado.com/event/eu-codeweek-hackathon2024#Finals%20-%20EU%20Code%20Week%20Hackathon%202024',
                'toolkit_button_text' => 'Hackathon 2025 Toolkit',
                'toolkit_button_link' => '/docs/C4EU_D2.7 Code Week Event Hackathon Design & Toolkit Final 18.06.2025.pdf',
            ]
        );
    }
}
