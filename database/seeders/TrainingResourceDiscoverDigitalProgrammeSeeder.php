<?php

namespace Database\Seeders;

use App\TrainingResource;
use Illuminate\Database\Seeder;

class TrainingResourceDiscoverDigitalProgrammeSeeder extends Seeder
{
    /**
     * Seed a ready-to-edit Discover Digital Programme training resource.
     */
    public function run(): void
    {
        TrainingResource::updateOrCreate(
            ['slug' => 'discover-digital-programme'],
            [
                'card_title' => 'Discover Digital Programme',
                'card_author' => 'Code4Europe | Deliverable D4.2 | Public toolkit',
                'card_image' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_thumbnail.png',
                'page_title' => 'Discover Digital Programme',
                'hero_author' => 'Code4Europe | Deliverable D4.2 | Public toolkit',
                'hero_button_text' => 'Open the complete toolkit',
                'hero_button_url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit.pdf',
                'hero_secondary_button_text' => 'Get the one-pagers pack',
                'hero_secondary_button_url' => '#key-one-pagers',
                'intro' => <<<HTML
<p>A practical toolkit for higher education institutions (HEIs) with an ICT and STEM focus to engage secondary school students through school visits, campus experiences, and digital outreach, supporting learners in the senior cycle of secondary education to imagine themselves in technology careers and understand the academic pathways that will lead them there.</p>
HTML,
                'content' => <<<HTML
<h2>How the toolkit works</h2>
<p>The toolkit is organised as a flexible, non-prescriptive set of steps and formats. It structures engagement into two mirroring frameworks: <strong>STEM On Tour</strong> (bringing higher education into schools and community settings) and <strong>STEM In</strong> (bringing students into a higher education institution through campus visits, open days, and themed events). HEIs may implement either framework independently or combine both for greater impact.</p>
<h3>Start here</h3>
<ol>
  <li>Establish essential preparation (contacts + GDPR).</li>
  <li>Choose your delivery format: STEM On Tour and/or STEM In.</li>
  <li>Plan evaluation and feedback to measure outcomes.</li>
  <li>Use digital outreach and communication to build awareness and follow-up.</li>
</ol>
<div style="margin-top:2.25rem;max-width:100%;">
  <h2>Roadmap</h2>
  <p>Use this roadmap if you do not have time to read the full deliverable. The one-pagers mirror the toolkit flow and provide a practical checklist for implementation.</p>
  [[embed_roadmap_pdf]]
</div>
HTML,
                'body_image' => null,
                'body_image_alt' => 'Discover Digital Programme roadmap',
                'pdf_links_section' => <<<HTML
<h2 id="key-one-pagers">Key one-pagers</h2>
<p>These documents summarise the main operational parts of the toolkit.</p>
<ul>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/Essential_Preparation_for_STEM_Engagement+Activities.pdf" target="_blank" rel="noopener noreferrer">Essential Preparation for STEM Engagement Activities</a></li>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/STEM_On_Tour.pdf" target="_blank" rel="noopener noreferrer">STEM On Tour</a></li>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/STEM_In.pdf" target="_blank" rel="noopener noreferrer">STEM In</a></li>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/Evaluation_and_Feedback.pdf" target="_blank" rel="noopener noreferrer">Evaluation and Feedback</a></li>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/Digital_Outreach_and_Communication.pdf" target="_blank" rel="noopener noreferrer">Digital Outreach and Communication</a></li>
</ul>
<h2>Useful detail info</h2>
<p>These documents provide the supporting operational detail referenced in the key one-pagers.</p>
<ul>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/01_Register_of_Processing_Activities.pdf" target="_blank" rel="noopener noreferrer">1 - Register of Processing Activities</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/02_STEM_On_Tour-Roles_and_Responsibilities.pdf" target="_blank" rel="noopener noreferrer">2 - STEM On Tour - Roles and Responsibilities</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/03_STEM_On_Tour-Implementation_Timeline.pdf" target="_blank" rel="noopener noreferrer">3 - STEM On Tour - Implementation Timeline</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/04_STEM_In_Roles_and_Responsibilities.pdf" target="_blank" rel="noopener noreferrer">4 - STEM In Roles and Responsibilities</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/05_STEM_In-Implementation_Timeline.pdf" target="_blank" rel="noopener noreferrer">5 - STEM In - Implementation Timeline</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/06_Evaluation_and_Feedback-Scoreboard.pdf" target="_blank" rel="noopener noreferrer">6 - Evaluation and Feedback - Scoreboard</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/07_Digital_Outreach_and_Communication-Schedule.pdf" target="_blank" rel="noopener noreferrer">7 - Digital Outreach and Communication - Schedule</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/08_Questionnaires_Examples.pdf" target="_blank" rel="noopener noreferrer">8 - Questionnaires Examples</a></li>
  <li><a href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/09_HEI_Presentation_Guide.pdf" target="_blank" rel="noopener noreferrer">9 - HEI Presentation Guide</a></li>
  <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/files/HEI_presentation_template.pptx" target="_blank" rel="noopener noreferrer">10 - HEI Presentation Template</a></li>
</ul>
HTML,
                'button_text' => 'Open the complete toolkit',
                'button_url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit.pdf',
                'secondary_button_text' => 'Download printable materials',
                'secondary_button_url' => '#key-one-pagers',
                'contacts_section' => null,
                'register_box_section' => <<<HTML
<h2>Share your activity and build the pipeline</h2>
<p>Register school visits, campus visits, open days, workshops, and outreach actions on the EU Code Week platform to support visibility, coordination, and cumulative impact across the ecosystem.</p>
HTML,
                'about_box_section' => <<<HTML
<h2>About this toolkit</h2>
<p>The programme serves as a bridge between secondary and higher education at a critical stage in the student journey. It addresses two common challenges: students who feel overwhelmed by the range of choices available and students who disengage because higher education feels distant or irrelevant. The toolkit provides structured guidance, adaptable frameworks and models, and opportunities to experience what a future educational path in STEM can look and feel like, while also engaging families and key stakeholders within secondary education.</p>
<h3>At a glance</h3>
<ul>
  <li>Designed for HEIs specialising in ICT and STEM that engage directly with secondary schools to raise awareness of degree opportunities and inspire interest in advanced digital careers among secondary school students.</li>
  <li>Promotes a combination of activities such as campus visits, discovery days, and digital career orientation sessions that together provide a well-rounded experience and help students to gain first-hand insight into both the academic and social environment, and to raise awareness about the opportunities offered by higher education.</li>
  <li>Includes guidance for outreach, logistics, materials, evaluation, and digital communication.</li>
</ul>
HTML,
                'anchor_offset' => 120,
                'roadmap_pdf_embed_url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit_roadmap.pdf',
                'roadmap_embed_kind' => 'pdf',
                'roadmap_svg' => null,
                'roadmap_image_url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit_roadmap.png',
                'roadmap_image_link_url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit_roadmap.pdf',
                'third_button_text' => 'Register an activity',
                'third_button_url' => 'https://codeweek.eu/add?skip=1',
                'meta_title' => 'Discover Digital Programme - Toolkit',
                'meta_description' => 'A practical toolkit for HEIs to engage secondary school students through STEM outreach, campus experiences, and digital communication.',
                'position' => 50,
                // Keep unpublished so it is visible only via signed preview URL.
                'active' => false,
            ]
        );
    }
}
