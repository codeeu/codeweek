<?php

namespace Database\Seeders;

use App\Nova\PodcastResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'url' => 'https://codeweek.eu/resources/CodingAtHome'
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 2,
            'name' => 'Ode to Code',
            'url' => 'http://www.codeweek.it/odetocode/'
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 3,
            'name' => 'Code Week resource repository to Learn coding',
            'url' => 'https://codeweek.eu/resources'
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 4,
            'name' => 'Code Week resource repository to teach coding',
            'url' => 'https://codeweek.eu/resources/teach'
        ]);
        DB::table('podcast_resources')->insert([

            'podcast_id' => 2,
            'position' => 5,
            'name' => 'Code Week Learning Bits and MOOCs',
            'url' => 'https://codeweek.eu/training'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 1,
            'name' => 'Learn more about the work of Datorium and the Code Week community in Latvia in our blog',
            'url' => 'https://blog.codeweek.eu/codeweek-in-latvia-sharing-ideas-and-inspiring-others-to-use-the-power-of-information-technologies/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 2,
            'name' => 'Discord',
            'url' => 'https://discord.com/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 3,
            'name' => 'Miro',
            'url' => 'https://miro.com/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 3,
            'position' => 4,
            'name' => 'Mural',
            'url' => 'https://www.mural.co/'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 1,
            'name' => 'Learning Bit on educational games by Jesús Moreno León',
            'url' => 'https://codeweek.eu/training/creating-educational-games-with-scratch'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 2,
            'name' => 'Games in Schools MOOC developed by Ollie Bray',
            'url' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:GiS+GamesCourse+2019/about'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 3,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 4,
            'name' => 'Scratch Jr',
            'url' => 'https://www.scratchjr.org/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 5,
            'name' => 'Minecraft',
            'url' => 'https://www.minecraft.net/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 6,
            'name' => 'RPG Maker',
            'url' => 'https://www.rpgmakerweb.com/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 7,
            'name' => 'MIT App Inventor',
            'url' => 'https://appinventor.mit.edu/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 4,
            'position' => 8,
            'name' => 'Apps for Good',
            'url' => 'https://www.appsforgood.org/'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 1,
            'name' => 'Learning Bit on Artificial Intelligence and Arts by Artur Coelho',
            'url' => 'https://codeweek.eu/training/learning-in-the-age-of-intelligent-machines'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 2,
            'name' => 'Scratch',
            'url' => 'https://scratch.mit.edu/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 3,
            'name' => 'Raspberry Pi',
            'url' => 'https://www.raspberrypi.org/ '
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 4,
            'name' => 'Maker Faire',
            'url' => 'https://makerfaire.com/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 5,
            'name' => 'GauGAN 2',
            'url' => 'http://gaugan.org/gaugan2/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 6,
            'name' => 'Deep Dream Generator',
            'url' => 'https://deepdreamgenerator.com/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 5,
            'position' => 7,
            'name' => 'ArtBreeder',
            'url' => 'https://www.artbreeder.com/'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 1,
            'name' => 'Electronic Literature Organization',
            'url' => 'https://eliterature.org/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 2,
            'name' => 'Net Art Anthology',
            'url' => 'https://anthology.rhizome.org/'
        ]);
        DB::table('podcast_resources')->insert([
            'podcast_id' => 6,
            'position' => 3,
            'name' => 'Learning Bit on Media Literacy',
            'url' => 'https://codeweek.eu/training/mining-media-literacy'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 1,
            'name' => 'Learning Bit on Media Literacy, designed by Marijana and Tea',
            'url' => 'https://codeweek.eu/training/mining-media-literacy '
        ]);


        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 2,
            'name' => 'Safer Internet Day',
            'url' => 'https://www.saferinternetday.org'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 3,
            'name' => 'Be Internet Awesome – game about Internet safety and digital citizenship',
            'url' => 'https://beinternetawesome.withgoogle.com/en_us/interland'
        ]);

        DB::table('podcast_resources')->insert([
            'podcast_id' => 7,
            'position' => 4,
            'name' => 'Minecraft Education',
            'url' => 'https://education.minecraft.net/'
        ]);


    }
}
