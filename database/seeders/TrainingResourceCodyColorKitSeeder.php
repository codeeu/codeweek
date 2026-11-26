<?php

namespace Database\Seeders;

use App\TrainingResource;
use Illuminate\Database\Seeder;

class TrainingResourceCodyColorKitSeeder extends Seeder
{
    /**
     * Seed the CodyColor KIT training resource with its Italian translation.
     *
     * This page used to be the hardcoded static/training/module-0 blade. The
     * English copy below is a port of that blade; the Italian copy comes from
     * "LANDING PAGE ITALIAN - Kit CodyColor.docx" (docs/internal).
     */
    public function run(): void
    {
        TrainingResource::updateOrCreate(
            ['slug' => 'cody-color-kit'],
            [
                'card_title' => 'CodyColor Kit',
                'card_author' => 'By Alessandro Bogliolo and Italian EU Code Week HUB',
                'card_image' => '/img/learning/cody-color-kit.png',
                'page_title' => 'CodyColor KIT',
                'hero_author' => 'By Alessandro Bogliolo and the Italian EU Code Week HUB',
                'highlight_box' => <<<'HTML'
<p><strong>Scientific author:</strong> Alessandro Bogliolo - EU Code Week Italian ambassador; University of Urbino</p>
<p><strong>Contributors and testimonials:</strong> Fabrizia Agnello, Carmela Cundari, Alfonsina Cinzia Troisi - EU Code Week Italian Leading Teachers</p>
<p><strong>Instructional design, project management, internationalisation:</strong> Veronica Ruberti - EU Code Week Italian HUB Coordinator; Fondazione LINKS</p>
<p><strong>Internationalisation and translation:</strong> Lucia Terrone - EU Code Week Italian HUB Coordinator; Fondazione LINKS</p>
<p>This resource is developed in collaboration with <a href="https://academy.codyroby.it/" target="_blank" rel="noopener noreferrer"><strong>CodyRoby Academy</strong></a></p>
HTML,
                'intro' => <<<'HTML'
<p>CodyColor is an unplugged coding method (without the use of electronic devices) designed by Alessandro Bogliolo, professor of Information Processing Systems at the University of Urbino, aiming at lowering barriers to practice computational thinking. Based on extremely simple rules, CodyColor can be introduced from early childhood education, but also supports challenging activities for lower/upper secondary school and adults.</p>
<p>In this kit you'll find thorough explanations of the principles and potential of the CodyColor method, concrete proposals for teaching activities using the kit to promote computational thinking skills, and detailed guidelines to create the tools and bring the activities into your classroom.</p>
HTML,
                'content' => <<<'HTML'
<h2>Who is the CodyColor KIT for?</h2>
<p>CodyColor KIT is aimed at <strong>teachers of all school levels and educators</strong>. It can be applied in formal and informal learning contexts, complementing both STEM and humanities because it strengthens:</p>
<ul>
  <li>Logical thinking and computational thinking</li>
  <li>Spatial orientation and rotations</li>
  <li>Strategy development, comparing hypotheses, and group decision-making</li>
  <li>Collaboration, communication, and respect for rules</li>
</ul>
<p>CodyColor KIT is aimed at <strong>families</strong> because unplugged coding activities can be carried out playfully outside formal learning contexts, are engaging, require no prerequisites, no specific equipment, and are suitable for all ages.</p>
<h2>Why discover, experiment with, and learn the CodyColor method?</h2>
<ul>
  <li><strong>Unplugged</strong> &#11106; No digital device required &#11106; Highly accessible</li>
  <li><strong>Color-based</strong> &#11106; Multilingual &#11106; International collaboration</li>
  <li><strong>Versatile</strong> &#11106; Different ages &#11106; Cross-age collaboration</li>
  <li><strong>Multidisciplinary</strong> &#11106; Interdisciplinary collaboration &#11106; Community activation</li>
</ul>
<h2>How does this kit work?</h2>
<p>In this page you will discover the CodyColor method through an asynchronous training path in small, sequential, easy-to-follow steps, using accessible language. Every step is a downloadable PDF, designed to be easy to print and use in class, containing theoretical background, lesson outlines, activity descriptions, facilitation prompts, and guidelines for teachers.</p>
<p>The objective is to guide you from learning the methods to applying them in the classroom, from learning to teaching with the CodyColor lesson plans as scaffolding materials.</p>
<p><strong>Let's start!</strong></p>
<img src="/images/training/codycolor-kit-learning-bits.png" alt="CodyColor Kit Learning Bits" />
HTML,
                'pdf_links_section' => <<<'HTML'
<h2>In these learning bits you will:</h2>
<ul>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/color-kit/Discover-the-method.pdf" target="_blank" rel="noopener noreferrer">1 &ndash; DISCOVER THE METHOD</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/color-kit/Prepare-the-learning-experience.pdf" target="_blank" rel="noopener noreferrer">2 &ndash; PREPARE THE LEARNING SPACE</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/color-kit/Discover-the-lesson-plan.pdf" target="_blank" rel="noopener noreferrer">3 &ndash; DISCOVER THE LESSON PLAN</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/color-kit/Share-your-experience.pdf" target="_blank" rel="noopener noreferrer">4 &ndash; SHOWCASE AND SHARE YOUR EXPERIENCE</a></li>
  <li><a class="inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case !no-underline" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/color-kit/CodyColor-Full-kit.pdf" target="_blank" rel="noopener noreferrer">DOWNLOAD THE KIT!</a></li>
</ul>
HTML,
                'contacts_section' => <<<'HTML'
<h2>Contacts</h2>
<p>For information, curiosities, and insights contact: <a href="mailto:codeweek@linksfoundation.com">codeweek@linksfoundation.com</a></p>
HTML,
                'register_box_section' => <<<'HTML'
<p>Every time you run a CodyColor challenge in class, during a school event, a team building, or a training course, register it on the <a href="https://codeweek.eu/add?skip=1" target="_blank" rel="noopener noreferrer">map of the European Code Week</a>. Every organizer will receive a participation certificate for their commitment and will contribute to a campaign raising awareness of the importance of computational thinking skills.</p>
<p>If you want to get in touch with an international group of enthusiastic teachers, sign up for the <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215" target="_blank" rel="noopener noreferrer">EU Code Week teachers' Facebook group</a>! To take a further step and collaborate with other schools in your country or across borders, join the <a href="https://codeweek.eu/codeweek4all" target="_blank" rel="noopener noreferrer">Code Week 4 All challenge</a>.</p>
HTML,
                'third_button_text' => 'Register activity',
                'third_button_url' => '/add?skip=1',
                'meta_title' => 'CodyColor KIT – Unplugged Coding Method',
                'meta_description' => 'Discover the CodyColor unplugged coding method designed by Alessandro Bogliolo. A color-based, multilingual approach to computational thinking for all ages and school levels.',
                'roadmap_embed_kind' => 'none',
                'position' => 0,
                'active' => true,
                'locale_overrides' => ['it' => self::italianOverrides()],
            ]
        );
    }

    /**
     * Italian page copy, taken verbatim from the translated landing page document.
     */
    private static function italianOverrides(): array
    {
        return [
            'card_title' => 'CodyColor KIT',
            'card_author' => 'Di Alessandro Bogliolo e dell’HUB italiano di EU Code Week',
            'page_title' => 'CodyColor KIT',
            'hero_author' => 'Di Alessandro Bogliolo e dell’HUB italiano di EU Code Week',
            'highlight_box' => <<<'HTML'
<p><strong>Autore scientifico:</strong> Alessandro Bogliolo - Ambassador italiano di EU Code Week; Università di Urbino</p>
<p><strong>Contributi e testimonianze:</strong> Fabrizia Agnello, Carmela Cundari, Alfonsina Cinzia Troisi - Leading Teachers italiane di EU Code Week</p>
<p><strong>Instructional design, project management, internazionalizzazione:</strong> Veronica Ruberti - Coordinatrice HUB italiano di EU Code Week; Fondazione LINKS</p>
<p><strong>Internazionalizzazione e traduzione:</strong> Lucia Terrone - Coordinatrice HUB italiano di EU Code Week; Fondazione LINKS</p>
<p>Questa risorsa è sviluppata in collaborazione con <a href="https://academy.codyroby.it/" target="_blank" rel="noopener noreferrer"><strong>CodyRoby Academy</strong></a></p>
HTML,
            'intro' => <<<'HTML'
<p>CodyColor è un metodo di coding unplugged (cioè senza dispositivi elettronici) ideato da Alessandro Bogliolo, professore di Sistemi di Elaborazione dell’Informazione all’Università di Urbino, con l’obiettivo di abbattere le barriere alla pratica del pensiero computazionale. Basato su regole estremamente semplici, CodyColor può essere introdotto fin dalla scuola dell’infanzia, ma permette di proporre attività sfidanti anche alla scuola secondaria di primo e secondo grado e alle persone adulte.</p>
<p>In questo kit trovi spiegazioni approfondite dei principi e delle potenzialità del metodo CodyColor, proposte concrete di attività didattiche che utilizzano il kit per sviluppare competenze di pensiero computazionale e indicazioni dettagliate per costruire i materiali e portare le attività in classe.</p>
HTML,
            'content' => <<<'HTML'
<h2>A chi è rivolto il CodyColor KIT?</h2>
<p>CodyColor KIT è pensato per <strong>insegnanti di ogni ordine e grado, educatrici ed educatori</strong>. Può essere utilizzato in contesti di apprendimento formali e non formali, a integrazione sia delle discipline STEM sia delle materie umanistiche, perché rafforza:</p>
<ul>
  <li>il pensiero logico e il pensiero computazionale</li>
  <li>l’orientamento spaziale e le rotazioni</li>
  <li>lo sviluppo di strategie, il confronto tra ipotesi e le decisioni di gruppo</li>
  <li>la collaborazione, la comunicazione e il rispetto delle regole</li>
</ul>
<p>CodyColor KIT è rivolto anche alle <strong>famiglie</strong>, perché le attività di coding unplugged possono essere proposte in modo ludico anche fuori dalla scuola, sono coinvolgenti, non richiedono prerequisiti particolari, non richiedono attrezzature specifiche e sono adatte a tutte le età.</p>
<h2>Perché scoprire, sperimentare e imparare il metodo CodyColor?</h2>
<ul>
  <li><strong>Unplugged</strong> &#11106; Non richiede dispositivi digitali &#11106; Altamente accessibile</li>
  <li><strong>Basato sui colori</strong> &#11106; Multilingue &#11106; Favorisce la collaborazione internazionale</li>
  <li><strong>Versatile</strong> &#11106; Adatto a età diverse &#11106; Favorisce la collaborazione tra fasce d’età</li>
  <li><strong>Multidisciplinare</strong> &#11106; Favorisce la collaborazione tra discipline &#11106; Attiva la comunità</li>
</ul>
<h2>Come funziona questo kit?</h2>
<p>In questa pagina scoprirai il metodo CodyColor attraverso un percorso di formazione asincrono in piccoli passi sequenziali, brevi e facili da seguire, con un linguaggio accessibile. Ogni passo corrisponde a un PDF scaricabile, pensato per essere facile da stampare e utilizzare in classe, che contiene inquadramento teorico, tracce di lezione, descrizioni delle attività, spunti di facilitazione e linee guida per insegnanti ed educatrici/educatori.</p>
<p>L’obiettivo è accompagnarti dal momento in cui impari il metodo al momento in cui lo applichi in classe, passando dal “learning” al “teaching” con i lesson plan di CodyColor come materiali di supporto.</p>
<p><strong>Iniziamo!</strong></p>
<img src="/images/training/codycolor-kit-learning-bits-it.png" alt="Learning bits del Kit CodyColor" />
HTML,
            'pdf_links_section' => <<<'HTML'
<h2>In questi learning bits troverai:</h2>
<ul>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/IT/color-kit/Discover-the-method.pdf" target="_blank" rel="noopener noreferrer">1 &ndash; SCOPRI IL METODO</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/IT/color-kit/Prepare-the-learning-experience.pdf" target="_blank" rel="noopener noreferrer">2 &ndash; PREPARA LO SPAZIO DI APPRENDIMENTO</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/IT/color-kit/Discover-the-lesson-plan.pdf" target="_blank" rel="noopener noreferrer">3 &ndash; SCOPRI L’ATTIVITÀ DIDATTICA</a></li>
  <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/IT/color-kit/Share-your-experience.pdf" target="_blank" rel="noopener noreferrer">4 &ndash; CONDIVIDI LA TUA ESPERIENZA</a></li>
  <li><a class="inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case !no-underline" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/IT/color-kit/CodyColor-Full-kit.pdf" target="_blank" rel="noopener noreferrer">Scarica il KIT completo</a></li>
</ul>
HTML,
            'contacts_section' => <<<'HTML'
<h2>Contatti</h2>
<p>Per informazioni, curiosità e approfondimenti scrivi a: <a href="mailto:codeweek@linksfoundation.com">codeweek@linksfoundation.com</a>.</p>
HTML,
            'register_box_section' => <<<'HTML'
<p>Ogni volta che proponi una sfida CodyColor in classe, durante un evento scolastico, un’attività di team building o un corso di formazione, registra l’attività sulla <a href="https://codeweek.eu/add?skip=1" target="_blank" rel="noopener noreferrer">mappa della European Code Week</a>. Ogni organizzatore riceverà un attestato di partecipazione per il proprio impegno e contribuirà a una campagna di sensibilizzazione sull’importanza delle competenze di pensiero computazionale.</p>
<p>Se vuoi entrare in contatto con un gruppo internazionale di insegnanti entusiaste/i, iscriviti al <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215" target="_blank" rel="noopener noreferrer">gruppo Facebook EU Code Week Teachers</a>! Per fare un ulteriore passo avanti e collaborare con altre scuole nel tuo Paese o oltre frontiera, unisciti alla <a href="https://codeweek.eu/codeweek4all" target="_blank" rel="noopener noreferrer">Code Week 4 All challenge</a>.</p>
HTML,
            'third_button_text' => 'Registra le tue attività',
            'meta_title' => 'CodyColor KIT – Metodo di coding unplugged',
            'meta_description' => 'Scopri il metodo di coding unplugged CodyColor ideato da Alessandro Bogliolo: un approccio basato sui colori e multilingue per il pensiero computazionale, adatto a tutte le età e a ogni ordine di scuola.',
        ];
    }
}
