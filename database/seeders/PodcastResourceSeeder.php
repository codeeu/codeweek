<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PodcastResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Schema::enableForeignKeyConstraints();
        Model::unguard();
        DB::table('podcast_resources')->truncate();
        Model::reguard();
        //        Schema::disableForeignKeyConstraints();

        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 1,
            'name' => 'Coding@Home video tutorials',
            'url' => 'https://codeweek.eu/resources/CodingAtHome',
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 2,
            'name' => 'Ode to Code',
            'url' => 'http://www.codeweek.it/odetocode/',
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 3,
            'name' => 'Code Week resource repository to Learn coding',
            'url' => 'https://codeweek.eu/resources',
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 4,
            'name' => 'Code Week resource repository to teach coding',
            'url' => 'https://codeweek.eu/resources/teach',
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 5,
            'name' => 'Code Week Learning Bits and MOOCs',
            'url' => 'https://codeweek.eu/training',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 1,
            'name' => 'Learn more about the work of Datorium and the Code Week community in Latvia in our blog',
            'url' => 'https://blog.codeweek.eu/codeweek-in-latvia-sharing-ideas-and-inspiring-others-to-use-the-power-of-information-technologies/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 2,
            'name' => 'Discord',
            'url' => 'https://discord.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 3,
            'name' => 'Miro',
            'url' => 'https://miro.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 4,
            'name' => 'Mural',
            'url' => 'https://www.mural.co/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 1,
            'name' => 'Learning Bit on educational games by Jesús Moreno León',
            'url' => 'https://codeweek.eu/training/creating-educational-games-with-scratch',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 2,
            'name' => 'Games in Schools MOOC developed by Ollie Bray',
            'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:GiS+GamesCourse+2019/about',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 3,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 4,
            'name' => 'Scratch Jr',
            'url' => 'https://www.scratchjr.org/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 5,
            'name' => 'Minecraft',
            'url' => 'https://www.minecraft.net/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 6,
            'name' => 'RPG Maker',
            'url' => 'https://www.rpgmakerweb.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 7,
            'name' => 'MIT App Inventor',
            'url' => 'https://appinventor.mit.edu/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 8,
            'name' => 'Apps for Good',
            'url' => 'https://www.appsforgood.org/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 1,
            'name' => 'Learning Bit on Artificial Intelligence and Arts by Artur Coelho',
            'url' => 'https://codeweek.eu/training/learning-in-the-age-of-intelligent-machines',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 2,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 3,
            'name' => 'Raspberry Pi',
            'url' => 'https://www.raspberrypi.org/ ',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 4,
            'name' => 'Maker Faire',
            'url' => 'https://makerfaire.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 5,
            'name' => 'GauGAN 2',
            'url' => 'http://gaugan.org/gaugan2/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 6,
            'name' => 'Deep Dream Generator',
            'url' => 'https://deepdreamgenerator.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 7,
            'name' => 'ArtBreeder',
            'url' => 'https://www.artbreeder.com/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 1,
            'name' => 'Electronic Literature Organization',
            'url' => 'https://eliterature.org/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 2,
            'name' => 'Net Art Anthology',
            'url' => 'https://anthology.rhizome.org/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 3,
            'name' => 'Learning Bit on Media Literacy',
            'url' => 'https://codeweek.eu/training/mining-media-literacy',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 1,
            'name' => 'Learning Bit on Media Literacy, designed by Marijana and Tea',
            'url' => 'https://codeweek.eu/training/mining-media-literacy ',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 2,
            'name' => 'Safer Internet Day',
            'url' => 'https://www.saferinternetday.org',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 3,
            'name' => 'Be Internet Awesome – game about Internet safety and digital citizenship',
            'url' => 'https://beinternetawesome.withgoogle.com/en_us/interland',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 4,
            'name' => 'Minecraft Education',
            'url' => 'https://education.minecraft.net/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 9,
            'position' => 1,
            'name' => 'Blogpost about Code Week anniversary',
            'url' => 'https://blog.codeweek.eu/code-week-10th-anniversary-cake-challenge/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 9,
            'position' => 2,
            'name' => 'Ode to Code',
            'url' => 'http://www.codeweek.it/odetocode/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 9,
            'position' => 3,
            'name' => 'Results of the 2021 edition of Code Week',
            'url' => 'https://blog.codeweek.eu/4-million-people-created-code-with-the-help-of-eu-code-week-in-2021/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 9,
            'position' => 4,
            'name' => 'Blogpost about the Code Week values',
            'url' => 'https://blog.codeweek.eu/do-you-know-and-share-our-values-then-join-us/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 10,
            'position' => 1,
            'name' => 'Computer science Fundamentals Course',
            'url' => 'https://code.org/educate/csf',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 10,
            'position' => 2,
            'name' => 'More about local Code Week training courses by Mari and her colleagues on our blog',
            'url' => 'https://blog.codeweek.eu/eu-code-week-code-it-local-in-perama/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 11,
            'position' => 1,
            'name' => 'Code Week Challenge on Music composition',
            'url' => 'https://codeweek.eu/2021/challenges/compose-song',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 11,
            'position' => 2,
            'name' => 'Minecraft education',
            'url' => 'https://education.minecraft.net/es-es/homepage',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 11,
            'position' => 3,
            'name' => 'Sonic Pi',
            'url' => 'https://sonic-pi.net/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 11,
            'position' => 4,
            'name' => 'Micro:bit',
            'url' => 'https://microbit.org/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 11,
            'position' => 5,
            'name' => 'Sphero robot',
            'url' => 'https://sphero.com/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 1,
            'name' => 'Learning Bit on Coding for All Subjects, which includes a lesson plan on Tinkering and Making by Isabel Blanco',
            'url' => 'https://codeweek.eu/training/coding-for-all-subjects',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 2,
            'name' => 'MBots by Makeblock',
            'url' => 'https://www.makeblock.com/steam-kits/mbot',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 3,
            'name' => 'Escornabots',
            'url' => 'http://escornabot.com/en/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 4,
            'name' => 'Ozobots',
            'url' => 'https://ozobot.com/',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 5,
            'name' => 'MTiny by Makeblock',
            'url' => 'https://www.makeblock.com/mtiny',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 12,
            'position' => 6,
            'name' => 'Makerspaces around Europe',
            'url' => 'https://fcl.eun.org/fcl-network-members ',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 8,
            'position' => 1,
            'name' => 'Pocket Code App - Android',
            'url' => 'https://play.google.com/store/apps/details?id=org.catrobat.catroid&hl=en&gl=US',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 8,
            'position' => 2,
            'name' => 'Pocket Code App - iOS',
            'url' => 'https://apps.apple.com/us/app/pocket-code/id1117935892',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 8,
            'position' => 3,
            'name' => 'Python',
            'url' => 'https://www.python.org/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 8,
            'position' => 3,
            'name' => 'GitHub',
            'url' => 'https://github.com/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 17,
            'position' => 1,
            'name' => 'About Code Week',
            'url' => 'https://codeweek.eu/about',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 17,
            'position' => 2,
            'name' => 'Applied Digital Skills by Google',
            'url' => 'https://applieddigitalskills.withgoogle.com/s/en/home',
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 17,
            'position' => 3,
            'name' => 'AI Basics for Schools Code Week MOOC',
            'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI+2021/about',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 18,
            'position' => 1,
            'name' => 'Learning Bit on Computational Thinking by Miles Berry',
            'url' => 'https://codeweek.eu/training/computational-thinking-and-problem-solving',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 18,
            'position' => 2,
            'name' => 'CS Unplugged',
            'url' => 'https://www.csunplugged.org/en/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 18,
            'position' => 3,
            'name' => 'More information on turtle graphic',
            'url' => 'https://docs.python.org/3/library/turtle.html',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 18,
            'position' => 4,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 18,
            'position' => 5,
            'name' => 'GitHub',
            'url' => 'https://github.com/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 19,
            'position' => 1,
            'name' => 'Scratch website',
            'url' => 'https://scratch.mit.edu/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 19,
            'position' => 2,
            'name' => 'Learning Bit on Scratch by Margo Tinawi',
            'url' => 'https://codeweek.eu/training/visual-programming-introduction-to-scratch',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 19,
            'position' => 3,
            'name' => 'Learning Bit on Scratch by Jesus Moreno Leon',
            'url' => 'https://codeweek.eu/training/creating-educational-games-with-scratch',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 19,
            'position' => 4,
            'name' => 'Code Week Challenge on Scratch Jr by Stamatis Papadakis',
            'url' => 'https://codeweek.eu/2021/challenges/computational-thinking-and-computational-fluency',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 20,
            'position' => 1,
            'name' => 'Learning Bit on the Sustainable Development Goals',
            'url' => 'https://codeweek.eu/training/coding-for-sustainable-development-goals',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 20,
            'position' => 2,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 20,
            'position' => 3,
            'name' => 'MIT App Inventor',
            'url' => 'https://appinventor.mit.edu/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 20,
            'position' => 4,
            'name' => 'Sustainable Development Goals',
            'url' => 'https://sdgs.un.org/goals',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 20,
            'position' => 5,
            'name' => 'Code Week community',
            'url' => 'https://codeweek.eu/community',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 16,
            'position' => 1,
            'name' => 'Code.org',
            'url' => 'https://code.org/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 16,
            'position' => 2,
            'name' => 'CS Fundamentals Curriculum',
            'url' => 'https://code.org/educate/curriculum/cs-fundamentals-international',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 16,
            'position' => 3,
            'name' => 'CS Discoveries Curriculum',
            'url' => 'https://code.org/educate/csd',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 16,
            'position' => 4,
            'name' => 'Code Week Challenges, which include three challenges by Code.org',
            'url' => 'https://codeweek.eu/2021/challenges',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 16,
            'position' => 5,
            'name' => 'Code.org YouTube channel',
            'url' => 'https://www.youtube.com/user/CodeOrg',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 1,
            'name' => 'Learning Bit on Coding for Inclusion',
            'url' => 'https://codeweek.eu/training/coding-for-inclusion',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 2,
            'name' => 'Bridge21 Model',
            'url' => 'https://bridge21.ie/about-us/our-model/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 3,
            'name' => 'CS Unplugged',
            'url' => 'https://www.csunplugged.org/en/ ',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 4,
            'name' => 'Blockly',
            'url' => 'https://blockly.games/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 5,
            'name' => 'Micro:Bit',
            'url' => 'https://microbit.org/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 6,
            'name' => 'Microsoft DreamSpace',
            'url' => 'https://www.microsoft.com/dreamspace/Home',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 15,
            'position' => 7,
            'name' => 'Hour of Code',
            'url' => 'https://hourofcode.com/us',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 1,
            'name' => 'Learning Bit on Artificial Intelligence by Marco Neves',
            'url' => 'https://codeweek.eu/training/learning-in-the-age-of-intelligent-machines',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 2,
            'name' => 'MIT Ethics and AI Curriculum',
            'url' => 'https://www.media.mit.edu/projects/ai-ethics-for-middle-school/overview/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 3,
            'name' => 'Machine Learning for Kids',
            'url' => 'https://machinelearningforkids.co.uk/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 4,
            'name' => 'MIT App Inventor',
            'url' => 'https://appinventor.mit.edu/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 5,
            'name' => 'Verse by Verse',
            'url' => 'https://sites.research.google/versebyverse/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 21,
            'position' => 6,
            'name' => 'Learning Bit on Media Literacy',
            'url' => 'https://codeweek.eu/training/mining-media-literacy',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 13,
            'position' => 1,
            'name' => 'Learning Bit on Artificial Intelligence by Marjana',
            'url' => 'https://codeweek.eu/training/introduction-to-artificial-intelligence-in-the-classroom',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 13,
            'position' => 2,
            'name' => 'Gender shades, video by MIT Media Lab on algorithmic bias',
            'url' => 'https://www.youtube.com/watch?v=TWWsW1w-BVo',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 13,
            'position' => 3,
            'name' => 'Elements of AI training course online',
            'url' => 'https://www.elementsofai.com/',
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 14,
            'position' => 1,
            'name' => 'Code Week Challenges',
            'url' => 'https://codeweek.eu/2021/challenges',
        ]);

    }
}
