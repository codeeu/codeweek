<?php

namespace Database\Seeders;

use App\TrainingResource;
use Illuminate\Database\Seeder;

class TrainingResourceVetToolkitSeeder extends Seeder
{
    /**
     * Seed a ready-to-edit VET Toolkit training resource.
     */
    public function run(): void
    {
        TrainingResource::updateOrCreate(
            ['slug' => 'eu-code-week-4-vet'],
            [
                'card_title' => 'EU CODE WEEK 4 VET',
                'card_author' => 'Scientific author: Flavio Renga & Marta Risoli',
                'card_image' => '/images/vet-toolkit-images.png',
                'page_title' => 'EU CODE WEEK 4 VET',
                'hero_author' => 'VET TOOLKIT',
                'highlight_box' => <<<HTML
<p><strong>Scientific author:</strong> Flavio Renga &amp; Marta Risoli - EdTech researchers at Fondazione LINKS, EU Code Week Italian HUB.</p>
<p><strong>Instructional design, project management, internationalisation:</strong> Veronica Ruberti &amp; Lucia Terrone - Fondazione LINKS, EU Code Week Italian HUB Coordinator</p>
HTML,
                'intro' => <<<HTML
<p>In today's rapidly evolving technological landscape, it is crucial to equip Vocational Education and Training (VET) students both with technical competencies-such as coding, 3D modelling, and the Internet of Things (IoT)-and with essential social skills, including collaboration, problem-solving, and creativity. These skills are not just valuable for those pursuing a career in the tech industry but can open doors to a wide range of opportunities across various fields.</p>
<p>To support this vision, the VET Toolkit was created as part of the EU initiative Code Week to support educators to facilitate activities for students between 13 and 18 years of age.</p>
<p>The toolkit is based on the Creative Learning approach and the TinkerCad tool to help students develop digital skills, acquire social and emotional competencies, and stay motivated to pursue careers in the digital field.</p>
<p>The Creative Learning approach is based on the 4 Ps - Projects, Passion, Peers, and Play -, and it offers a flexible framework that shifts the focus from direct instruction to personalized, hands-on exploration. The approach also promotes inclusive learning environments, where teachers act as facilitators and peer students collaborate in flexible spaces that encourage experimentation and reduce the fear of mistakes.</p>
HTML,
                'body_image' => '/images/vet-toolkit-images.png',
                'body_image_alt' => 'EU Code Week 4 VET learning approach',
                'content' => <<<HTML
<h2>Who is the VET Toolkit for?</h2>
<p>The VET toolkit is aimed at VET teachers and educators who wants to:</p>
<ul>
  <li>Design and facilitate meaningful project-based learning experiences;</li>
  <li>Ensure that all students, including girls and those at risk of being left behind, are included and engaged in the learning process;</li>
  <li>Foster essential social skills, including collaboration and problem-solving;</li>
  <li>Foster creativity and encourage the use of technology as a "construction material" for creative expression and problem-solving;</li>
  <li>Create a growing community of VET Schools and educators actively involved in EU Code Week.</li>
</ul>
<h2>How does the VET toolkit work?</h2>
<p>In this page you will discover the Learning Creative approach through an asynchronous training path in small, sequential, easy-to-follow steps, using accessible language. Every step is a downloadable PDF, easy to print and use in class. It contains theoretical background, lesson outlines, activity descriptions, facilitation prompts, and guidelines for teachers.</p>
<p>The objective is to guide you from learning the Creative Learning approach to applying it in the classroom, supported by lesson plans and scaffolding materials.</p>
<p><strong>Let's start!</strong></p>
HTML,
                'pdf_links_section' => <<<HTML
<h2>PDF titles</h2>
<ul>
  <li>1 - DISCOVER THE CREATIVE LEARNING APPROACH</li>
  <li>2 - CREATE THE LEARNING SPACE</li>
  <li>3 - EXPERIMENT WITH THE TOOL</li>
  <li>4 - FACILITATE THE ACTIVITY</li>
  <li>5 - SHARE YOUR EXPERIENCE</li>
  <li>6 - KEEP ON LEARNING</li>
</ul>
HTML,
                'button_text' => 'DOWNLOAD THE COMPLETE KIT',
                'button_url' => null,
                'contacts_section' => <<<HTML
<h2>Contacts</h2>
<p>For information, curiosities, and insights contact: <a href="mailto:codeweek@linksfoundation.com">codeweek@linksfoundation.com</a></p>
HTML,
                'secondary_button_text' => 'Register activity',
                'secondary_button_url' => 'https://codeweek.eu/add?skip=1',
                'register_box_section' => <<<HTML
<p>Every time you run an activity in class, during a school event, a team building, or a training course, register it on the map of the European Code Week with the hashtag <strong>#DreamJobsinDigital</strong>. Every organizer will receive a participation certificate for their commitment and will contribute to a campaign raising awareness of digital skills and careers.</p>
<p>If you want to get in touch with an international group of enthusiastic teachers, sign up for the <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215" target="_blank" rel="noopener noreferrer">EU Code Week teachers' Facebook group</a>! To take a further step and collaborate with other schools in your country or across borders, join the <a href="https://codeweek.eu/codeweek4all" target="_blank" rel="noopener noreferrer">Code Week 4 All challenge</a>.</p>
HTML,
                'meta_title' => 'EU Code Week 4 VET - Training Toolkit',
                'meta_description' => 'A practical toolkit for VET teachers to run inclusive, creative, project-based digital activities with students aged 13-18.',
                'position' => 0,
                'active' => true,
            ]
        );
    }
}
