<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PodcastGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        Schema::enableForeignKeyConstraints();
        Model::unguard();
        DB::table('podcast_guests')->truncate();
        Model::reguard();
        //        Schema::disableForeignKeyConstraints();

        DB::table('podcast_guests')->insert([
            'podcast_id' => 2,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/alessandro.jpeg',
            'name' => 'Alessandro Bogliolo (Italy)',
            'description' => 'Alessandro Bogliolo is a computer science professor at the University of Urbino and an ambassador for Code Week in Italy. You can follow him on Twitter and get in touch with him ([@netralaccess](https://twitter.com/neutralaccess)).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 3,
            'position' => 1,
            'name' => 'Angela Jafarova and Elchin Jafarov (Latvia)',
            'description' => 'Angela Jafarova and Elchin Jafarov are the founders of Datorium, a coding school in Riga. You can follow them and get in touch on Twitter ([@Datorium1](https://twitter.com/Datorium1)).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 4,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/3.OllieBray.jpeg',
            'name' => 'Ollie Bray (UK)',
            'description' => 'Ollie Bray is an experienced school leader and project manager with wide ranging international experience of school and education system transformation. You can get in touch with him on Twitter ([@olliebray](https://twitter.com/olliebray)), [Instagram](https://www.instagram.com/bray.ollie/)  and [LinkedIn](https://uk.linkedin.com/in/olliebray).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 5,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/4.ArturCoelho.jpg',
            'name' => 'Artur Coelho (Portugal)',
            'description' => 'Artur Coelho is a Portuguese ICT teacher, with an interest and vast knowledge in AI, robotics and the Arts. You can follow him on [Mastodon](https://masto.pt/web/@arturcoelho), [Instagram](https://www.instagram.com/artur.coelho/) or on [his blog](http://3dalpha.blogspot.com/).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 6,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/5.JakaZeleznikar.png',
            'name' => 'Jaka Železnikar (Slovenia)',
            'description' => 'Jaka is author of works in the fields of poetry, visual arts and web programming. You can learn more about him and his through his [website](https://jaka.org/). You can follow him on Twitter ([@jakaorg](https://twitter.com/jakaorg))',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 7,
            'position' => 2,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/6.TeaHorvatic.jpg',
            'name' => 'Tea Horvatic (Croatia)',
            'description' => 'Tea Horvatic is an English teacher, MIEExpert 2021/22, eTwinning & Minecraft enthusiast and Erasmus+ KA1 coordinator. You can get in touch with Tea on Twitter ([@teahorvatic](https://twitter.com/teahorvatic)) and [Facebook](https://www.facebook.com/tea.t.teic).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 7,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/6.MarjanaSmolcec.jpg',
            'name' => 'Marijana Smolcec (Croatia)',
            'description' => 'Marijana Smolcec is an English Teacher and a Teacher Trainer. She is the moderator of the eTwinning featured group "Inclusive Education". You can learn more about her on her [website](https://about.me/msmolcec) and follow her on Twitter ([@mscro1](https://about.me/msmolcec))',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 9,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/annika.jpeg',
            'name' => 'Annika Ostergren Pofantis (Sweden)',
            'description' => 'Annika works for the European Commission and specialises in Digital Economy and Skills. She is the coordinator of Code Week and has been involved in the initiative for many years. You can get in touch with her on Twitter: [@AnnikaOP](https://twitter.com/AnnikaOP).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 9,
            'position' => 2,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/tommaso.png',
            'name' => ' Tommaso Dalla Vecchia (Italy)',
            'description' => 'Tommaso works for European Schoolnet as Development and Advocacy Manager. He is part of the Code Week team and has also been involved for several of its editions. You can get in touch with him on Twitter: [@tommaso_eun](https://twitter.com/tommaso_eun).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 10,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/8.MariaTsapara.png',
            'name' => 'Maria Tsapara (Greece)',
            'description' => 'Maria is a Leading Teacher from Greece, who specialises in robotics, coding and other STEM fields. You can join her [STEM in Kindergarten Facebook Group](https://www.facebook.com/groups/STEAMinKindergarten), follow her on Twitter ([@Maria_Tsapara](https://twitter.com/Maria_Tsapara)) or on [LinkedIn](https://www.linkedin.com/in/maria-tsapara-60b710121/).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 10,
            'position' => 2,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/8.James_Callus.jpg',
            'name' => 'James Callus (Malta)',
            'description' => 'James is the Head of Department for [Digital Literacy at the Ministry of Education in Malta](https://digitalliteracy.skola.edu.mt/) and as well, a Code Week Leading Teacher. You can get in touch on Twitter ([@JamesCallus5](https://twitter.com/JamesCallus5). Both have been involved in Code Week for several of its editions.',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 11,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/9.KyriakosKoursaris.jpg',
            'name' => 'Kyriakos Koursaris (Cyprus)',
            'description' => 'Kyriakos is a Music teacher, AI expert and Minecraft educator from Cyprus based in Portugal. You can learn more about his profile and get in touch through his [website](https://about.me/koursaris). As well, you can connect with him on Twitter [@k_koursaris](https://twitter.com/k_koursaris).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 12,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/10.IsabelBlanco.jpg',
            'name' => 'Isabel Blanco (Spain)',
            'description' => 'Isabel is teacher and school principal, as well as an active Code Week Leading Teacher specialised in robotics. You can get in touch with her on [twitter](https://twitter.com/isabelbp), [Facebook](https://www.facebook.com/isabel.blancopumar/) or [LinkedIn](https://www.linkedin.com/in/isabel-blanco-pumar-4989b96a/).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 8,
            'position' => 1,
            'name' => 'Horst Jens (Austria)',
            'description' => 'Horst Jens is an Austrian programming teacher, you visit [his website](https://spielend-programmieren.at) and get in touch on [Twitter](https://twitter.com/horstjens).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 17,
            'position' => 1,
            'name' => 'Janne Elvelid and Alja Isaković (Sweden and Slovenia)',
            'description' => 'Janne Elvelid is the Head of Public Policy for Sweden and Finland at Meta, and Alja Isaković is the co-founder of Artesia.si. You can get in touch with them on Twitter: [@janneelvelid](https://twitter.com/janneelvelid) and [@iAlja](https://twitter.com/iAlja).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 18,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/13.MilesBerry.jpeg',
            'name' => 'Miles Berry (UK)',
            'description' => 'Miles Berry is a professor at the University of Roehampton in England, you can read some of his previous posts in [his blog](http://milesberry.net) and follow him on [Twitter](https://twitter.com/mberry)',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 19,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/14.JacyEdelman.jpg',
            'name' => 'Jacy Edelman (US)',
            'description' => 'Jacy is a passionate coder who works for the Scratch Foundation as Experience and Engagement Manager. You can follow her on [Twitter](https://twitter.com/pixelmoth), and get in touch with the Scratch Team at [@Scratch](https://twitter.com/Scratch).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 20,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/15.AvantiSharma.png',
            'name' => 'Avanti Sharma (Luxembourg)',
            'description' => 'Avanti is a pre-teen You can find more about her on her [website](https://workshop4me.org/avanti) and you can reach out to her via [Instagram](https://www.instagram.com/avanti_workshop4me/?hl=en) and [LinkedIn](https://www.linkedin.com/company/workshop4me/). Follow her on [Twitter](https://twitter.com/workshop4me).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 16,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/16.Ken+Akiha.jpeg',
            'name' => 'Ken Akiha (US)',
            'description' => 'Ken Akiha works as Curriculum Development Manager for Code.org, an US-based organisation which promotes the teaching of coding at a young age. You can follow him on [Twitter](https://twitter.com/AkihaKen) and learn more about Code.org on their [website](https://code.org/ ) and Twitter ([@codeorg](https://twitter.com/codeorg)).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 15,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/17.Niamh+Brady.jpg',
            'name' => 'Niamh Brady (Ireland)',
            'description' => 'Niamh Brady is a special class teacher in a primary school in Ireland. You can follow her on [Instagram](https://www.instagram.com/msniamhbrady/) and you can reach out to her on [LinkedIn](https://www.linkedin.com/in/niamh-morrin-brady)',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 21,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/18.MarcoNeves.png',
            'name' => 'Marco Neves (Portugal)',
            'description' => 'Marco Neves is an advisor on AI, a computer science teacher and CEO of the Internet Ideas Company. You can get in touch on [Twitter](https://twitter.com/mbrasneves).',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 13,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/19.MarjanaPrifti+Ske%CC%88nduli.JPG',
            'name' => 'Marjana Prifti Skenduli (Albania)',
            'description' => 'Marjana Prifti Skenduli is an assistant professor in Computer Science at the University of New York, Tirana and a Code Week Ambassador. You can follow her on [Twitter](https://twitter.com/mptirana) and find more information about her on [LinkedIn](https://www.linkedin.com/in/marjanapriftiskenduli) and [Google Scholar](https://scholar.google.com/citations?user=Keear6gAAAAJ&hl=en&oi=ao)',
        ]);

        DB::table('podcast_guests')->insert([
            'podcast_id' => 14,
            'position' => 1,
            'image_path' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/speakers/20.Balatsou.jpg',
            'name' => 'Evangelia Balatsou (Greece)',
            'description' => 'Evangelia Balatsou is a Greek scientist and founder of Greek Girls Code. You can get in touch on [Twitter](https://twitter.com/e_balatsou), [LinkedIn](https://uk.linkedin.com/in/evangeliabalatsou) (Evangelia Balatsou, PhD) or her [website](https://ebalatsou.com). You can learn more about Greek Girls Code on [Twitter](https://twitter.com/GreekGirlsCode), [Instagram](https://www.instagram.com/greekgirlscode/), [LinkedIn](https://www.linkedin.com/company/greekgirlscode) or their [website](https://greekgirlscode.com/). ',
        ]);

    }
}
