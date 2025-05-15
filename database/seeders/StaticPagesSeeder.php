<?php

namespace Database\Seeders;

use App\StaticPage;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main Pages
        StaticPage::create([
            'name' => 'Homepage',
            'description' => 'EU Code Week: October 14 - 27, 2024: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding.',
            'language' => 'en',
            'unique_identifier' => 'homepage',
            'path' => '/',
            'keywords' => ['EU Code Week', 'Coding', 'Europe'],
            'thumbnail' => null,
            'meta_title' => 'EU Code Week',
            'meta_description' => 'Celebrate coding in Europe with the EU Code Week 2024.',
            'meta_keywords' => 'EU Code Week, coding, programming, Europe',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Podcasts',
            'description' => 'Welcome to the EU Code Week Podcast Series. We bring coding, computational thinking, robotics and innovation closer to you, your community and your school. Join Arjana Blazic, Eugenia Casariego and Eirini Symeonidou, from the Code Week Team, as they explore a range of topics, from media literacy to robotics, with the help of expert guests – to empower you to equip your students with the skills to confront the challenges and opportunities posed by a digital future.',
            'unique_identifier' => 'podcasts',
            'path' => '/podcasts',
            'thumbnail' => '/images/banner_podcast.png',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Hackathons',
            'description' => 'A hackathon is an event where participants with diverse skills collaborate to tackle global challenges. Participants form teams to brainstorm, design, and code, aiming to produce a working solution or prototype by the event\'s conclusion. Beyond fostering innovation and teamwork, EU Code Week hackathons offer a platform for young enthusiasts to learn, showcase their talents, and connect with like-minded peers.',
            'unique_identifier' => 'hackathons',
            'path' => '/hackathons',
            'keywords' => ['Hackathons', 'Challenges'],
            'thumbnail' => '/images/hackathons/banner_hackathons.svg',
            'meta_title' => 'Hackathons',
            'meta_description' => 'Explore Hackathons across the EU Code Week.',
            'meta_keywords' => 'Hackathons, coding challenges, programming',
            'category' => 'General',
            'link_type' => 'internal_link',
        ]);

        StaticPage::create([
            'name' => 'Online Courses',
            'description' => 'EU Code Week offers professional development opportunities in the form of massive open online courses (MOOCs) with the aim to support teachers in effectively incorporating coding and computational thinking into their teaching practice. EU Code Week MOOCs are open to all educators, regardless of their students age or the subject they teach, and no prior experience or knowledge is required to participate. EU Code Week MOOCs offer free and accessible resources, materials, ideas and best practice examples to find inspiration and empower students by introducing coding and computational thinking, emerging technologies and artificial intelligence safely into the classroom.',
            'unique_identifier' => 'online-courses',
            'path' => '/online-courses',
            'keywords' => ['Online Courses', 'Learning', 'Coding'],
            'thumbnail' => '/images/banner_training.svg',
            'meta_title' => 'Online Courses',
            'meta_description' => 'Learn about innovative technologies and integrate coding into your curriculum.',
            'meta_keywords' => 'Online courses, coding, learning',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Training',
            'description' => 'Free training materials and online courses',
            'unique_identifier' => 'training',
            'path' => '/training',
            'thumbnail' => '/images/banner_training.svg',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Challenges',
            'description' => 'EU Code Week Challenges are activities that you can do on your own, in the classroom, with colleagues or friends. You would like to participate in Code Week but do not really have an idea of what to organize? Look no further! We have designed along with Code Week partners a selection of easy to make challenges, that include concrete examples of how to use it in a classroom or group. There are also guidelines on how to complete the challenges, but you can adapt them so that they suit the needs, interests and age of your participants. You can use whatever tools and technologies you like, but we recommend open-source resources.',
            'unique_identifier' => 'challenges',
            'path' => '/challenges',
            'thumbnail' => '/img/2021/challenges/main-banner.png',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Code Week Dance',
            'description' => 'Who said programmers couldn’t dance? We will prove otherwise with the #EUCodeWeekDance challenge. Who can join? Everyone from schools, teachers, libraries to code clubs, businesses and public authorities are invited to celebrate EU Code Week by organising a #EUCodeWeekDance activity and adding it to the Code Week map. How to participate? Choose from five types of activities or come up with your own. Regardless of which activity you choose, don\'t forget to add it to our map.',
            'unique_identifier' => 'dance',
            'path' => '/dance',
            'thumbnail' => '/images/banner_scoreboard.svg',
            'category' => 'General',
            'link_type' => 'internal_link',
            'is_searchable' => false
        ]);

        StaticPage::create([
            'name' => 'Presentations and Toolkits',
            'description' => 'In this section you will find material which will help you organise your EU Code Week activity, and promote the initiative with your community.  Communication toolkit: find here the official EU Code Week logos, badge, flyer, poster, PowerPoint and Word templates, examples of social media posts, and illustrations. ( English ). Teachers toolkit: find here the official EU Code Week logos, badge, template of certificate of participation for your students, an introductory presentation about EU Code Week, and social media material.  English .',
            'unique_identifier' => 'presentations-and-toolkits',
            'path' => '/toolkits',
            'thumbnail' => '/images/banner_learn_teach.svg',
            'category' => 'General',
            'link_type' => 'internal_link'
        ]);

        // Sub Pages
        $subPages = [
            // Online Cources
            [
                'name' => 'Navigating Innovative Technologies Across the Curriculum',
                'description' => 'The online course Navigating Innovative Technologies Across the Curriculum welcomes educators interested in integrating coding, computational thinking, virtual and augmented reality into their classrooms.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+NavigatingTech+2023/about',
                'keywords' => ['Coding', 'Technologies', 'Education'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/navigating-innovative-technologies-across-the-curriculum.png',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'Unlocking the Power of AI in Education',
                'description' => 'The Unlocking the Power of AI in Education MOOC aims to provide teachers with a basic understanding of AI’s potentials and challenges in education.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI_Education+2023/about',
                'keywords' => ['AI', 'Education', 'Technology'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/unlocking-the-power-of-ai.png',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week Bootcamp 2022',
                'description' => 'The EU Code Week Bootcamp is designed for teachers who want to integrate coding and computational thinking into their classrooms.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Bootcamp+2022/about',
                'keywords' => ['Bootcamp', 'Coding', 'EU Code Week'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/eu-code-week-bootcamp-2022.jpg',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week Online Bootcamp',
                'description' => 'The EU Code Week Online Bootcamp introduces teachers to the EU Code Week initiative and the opportunities it offers.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+OnlineBootcamp+2021/about',
                'keywords' => ['Bootcamp', 'Coding', 'Online'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/eu-code-week-online-bootcamp.jpg',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'AI Basics for Schools',
                'description' => 'The course introduces teachers to the basic concepts of AI and its ethical use in the classroom.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI+2021/about',
                'keywords' => ['AI Basics', 'Schools', 'Education'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/ai-basics-for-schools.jpg',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week Deep Dive MOOC 2020',
                'description' => 'The course aims to raise awareness about integrating coding and computational thinking into the classroom.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2020/about',
                'keywords' => ['Deep Dive', 'Coding', 'EU Code Week'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/eu-code-week-deep-dive-mooc-2020.jpg',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week Icebreaker Rerun',
                'description' => 'This short introductory course aims to make EU Code Week more appealing and meaningful for teachers, schools, and parents.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about',
                'keywords' => ['Icebreaker', 'Coding', 'EU Code Week'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/icebreaker.jpg',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week - Deep Dive MOOC',
                'description' => 'The course aims to help participants understand the importance of integrating coding and computational thinking in the classroom.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2019/about',
                'keywords' => ['Deep Dive', 'MOOC', 'EU Code Week'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/eu-code-week-deep-dive-mooc-2019.png',
                'link_type' => 'external_link',
            ],
            [
                'name' => 'EU Code Week - Ice-breaker MOOC',
                'description' => 'The course aims to introduce participants to EU Code Week and familiarize them with the new EU Code Week website for schools.',
                'path' => 'https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2019/about',
                'keywords' => ['Icebreaker', 'MOOC', 'EU Code Week'],
                'category' => 'Online Courses',
                'thumbnail' => '/img/online-courses/icebreaker-2019.png',
                'link_type' => 'external_link',
            ],
            // Training
            [
                'name' => 'Coding without digital technology (unplugged)',
                'description' => 'Coding is the language of things, which allows us to write programs to grant new functionalities to the tens of billions of programmable objects around us. Coding is the fastest way to make our ideas come true and the most effective way to develop computational thinking capabilities. However, technology is not strictly required to develop computational thinking. Rather, our computational thinking skills are essential to make technology work.',
                'path' => '/training/coding-without-computers',
                'category' => 'Training',
                'thumbnail' => '/img/learning/coding-without-computers.png',
            ],
            [
                'name' => 'Computational thinking and problem solving',
                'description' => 'Computational thinking (CT) describes a way of looking at problems and systems so that a computer can be used to help us solve or understand them. Computational thinking is not only essential to the development of computer programs, but can also be used to support problem solving across all disciplines.',
                'path' => '/training/computational-thinking-and-problem-solving',
                'category' => 'Training',
                'thumbnail' => '/img/learning/computational-thinking-and-problem-solving.png',
            ],
            [
                'name' => 'Visual programming – introduction to Scratch',
                'description' => 'Visual programming lets humans describe processes using illustrations or graphics. We usually speak of visual programming as opposed to text-based programming. Visual programming languages (VPLs) are especially well adapted to introduce algorithmic thinking to children (and even adults). With VPLs, there is less to read and no syntax to implement.',
                'path' => '/training/visual-programming-introduction-to-scratch',
                'category' => 'Training',
                'thumbnail' => '/img/learning/visual-programming-introduction-to-scratch.png',
            ],
            [
                'name' => 'Creating educational games with Scratch',
                'description' => 'Critical thinking, persistence, problem solving, computational thinking and creativity are only some of the key skills that your students need to succeed in the 21st century, and coding can help you achieve these in a fun and motivating way. Algorithmic notions of flow control using sequences of instructions and loops, data representation using variables and lists, or synchronization of processes might sound like complicated concepts, but in this video you will find that they are easier to learn than you think.',
                'path' => '/training/creating-educational-games-with-scratch',
                'category' => 'Training',
                'thumbnail' => '/img/learning/creating-educational-games-with-scratch.png',
            ],
            [
                'name' => 'Making, robotics and tinkering in the classroom',
                'description' => 'The integration of coding, tinkering, robotics, and microelectronics as teaching and learning tools in the school curricula is key in 21st century education. Using tinkering and robotics in schools has many benefits for students, as it helps develop key competences such as problem solving, teamwork and collaboration. It also boosts students´ creativity and confidence and can help students develop perseverance and determination when faced with challenges. Robotics is also a field that promotes inclusivity, as it is easily accessible to a wide range of students with varying talents and skills (both boys and girls) and it positively influences students on the autism spectrum.',
                'path' => '/training/making-robotics-and-tinkering-in-the-classroom',
                'category' => 'Training',
                'thumbnail' => '/img/learning/making-robotics-and-tinkering-in-the-classroom.png',
            ],
            [
                'name' => 'Developing creative thinking through mobile app development',
                'description' => 'Have a look at this video where Rosanna Kurrer, (Founder of CyberWayFinder) explains what App Inventor is, goes through the advantages of using App development in the classroom and gives some practical examples on how teachers can integrate App Inventor in the classroom, transforming passive students into enthusiastic game makers.',
                'path' => '/training/developing-creative-thinking-through-mobile-app-development',
                'category' => 'Training',
                'thumbnail' => '/img/learning/developing-creative-thinking-through-mobile-app-development.png',
            ],
            [
                'name' => 'Tinkering and Making',
                'description' => 'Jobs and workplaces are changing and education is following in their footsteps. When preparing students for 21st century careers, new skills such as tinkering, making and hacking become essential, as they narrow the gap between school and reality. By transforming the classroom into a collaborative environment that focuses on problem-solving, students are able to engage and thrive. These activities promote discussion, thus allowing the classroom to become a communication hub, where every contribution is important.',
                'path' => '/training/tinkering-and-making',
                'category' => 'Training',
                'thumbnail' => '/img/learning/tinkering-and-making.png',
            ],
            [
                'name' => 'Coding for all subjects',
                'description' => 'When you think of coding in the classroom, the first image that comes to mind is of computers, Technology, Mathematics or Science. However, given that students have a number of interests and subjects, why not use this in our favor and implement coding across the entire curriculum? Integrating coding in the classroom has many benefits, as it helps them develop their critical thinking and problem solving skills, become active users and lead their own learning process, which is essential in schools. However, the most important thing is that your students will be learning while having fun!',
                'path' => '/training/coding-for-all-subjects',
                'category' => 'Training',
                'thumbnail' => '/img/learning/coding-for-all-subjects.png',
            ],
            [
                'name' => 'Making an automaton with a micro:bit',
                'description' => 'Using a Micro: bit, the easily programmable, pocket-sized computer, can be a fun and easy way to make interesting creations, from robots to musical instruments with your students, while at the same time teaching them how to code. It’s simple and easy to use for even the youngest programmers, while at the same time powerful enough for more advanced students. You can incorporate it in a variety of lessons from history to maths and even science. The possibilities are endless. The Micro: bit is an engaging and inexpensive way to teach students about coding while instilling crucial skills such as computational thinking, problem-solving, and creativity.',
                'path' => '/training/making-an-automaton-with-microbit',
                'category' => 'Training',
                'thumbnail' => '/img/learning/making-an-automaton-with-microbit.png',
            ],
            [
                'name' => 'Creative coding with Python',
                'description' => 'Moving from visual to text-based programming is a natural flow in coding. While visual programming is often great for beginners, after a while, students may crave a new challenge. Text-based programming is the next step for anyone who wants to dive further into programming and computational thinking.',
                'path' => '/training/creative-coding-with-python',
                'category' => 'Training',
                'thumbnail' => '/img/learning/creative-coding-with-python.png',
            ],
            [
                'name' => 'Coding for Inclusion',
                'description' => 'Bringing coding into your classroom can be a challenge, especially if you have students with certain disabilities in your class. But it’s important to remember that anyone, no matter their abilities, can learn how to code. Children with special needs can greatly benefit from learning aspects of coding because it teaches students important life skills such as solving problems, organization, and independence. Coding can also improve interpersonal skills and social skills through collaboration and teamwork, skills which many children with disabilities struggle with. Most importantly, students have fun while learning alongside their peers.',
                'path' => '/training/coding-for-inclusion',
                'category' => 'Training',
                'thumbnail' => '/img/learning/coding-for-inclusion.png',
            ],
            [
                'name' => 'Coding for sustainable development goals',
                'description' => 'Traditional education provides students with few opportunities to understand and solve real world problems such as global climate change, gender equality, hunger, poverty or good health and well-being. The Sustainable Development Goals (SDGs) are the core of the 2030 Agenda for Sustainable Development, adopted by all member states of the United Nations as a road map to achieve peace and prosperity on the planet, encouraging global development. Teachers can use the SDGs in the classroom as a tool for students to develop their critical thinking, but also to help them find their identity and purpose. Combining basic elements of coding and computational thinking with the SDGs will boost your students’ confidence, and you will help them develop their creativity, entrepreneurial spirit, problem-solving or communication skills.',
                'path' => '/training/coding-for-sustainable-development-goals',
                'category' => 'Training',
                'thumbnail' => '/img/learning/coding-for-sustainable-development-goals.png',
            ],
            [
                'name' => 'Introduction to Artificial Intelligence in the classroom',
                'description' => 'Artificial Intelligence (AI) has an impact on many areas of daily life: it autocorrects the text you type on your phone, choses the music your favourite music app plays, and it remembers your passwords when you have forgotten them. AI refers to a combination of machine learning, robotics, and algorithms, with applications in all fields: from computer science to manufacturing, and from medicine to fashion. Therefore, it has an undeniable place in our lives and in our societies and it plays a key role in science development. And as any other important phenomena in our lives, students will benefit from learning about it. But how to teach about such a complex thing as AI?',
                'path' => '/training/introduction-to-artificial-intelligence-in-the-classroom',
                'category' => 'Training',
                'thumbnail' => '/img/learning/introduction-to-artificial-intelligence-in-the-classroom.png',
            ],
            [
                'name' => 'Learning in the Age of Intelligent Machines',
                'description' => 'The progress of AI in recent years has been impressive thanks to rapid advances in computing power and the availability of large amounts of data. This has led to substantial investments in AI research and rapid expansion of the AI industry, making AI a major technological revolution of our time. AI is all around us. It has become part of our daily routine, so much so that we sometimes do not think of it as AI: we use online recommendation, face detection, security systems and voice assistants almost every day. But what about education?',
                'path' => '/training/learning-in-the-age-of-intelligent-machines',
                'category' => 'Training',
                'thumbnail' => '/img/learning/learning-in-the-age-of-intelligent-machines.png',
            ],
            [
                'name' => 'Mining Media Literacy',
                'description' => 'Media literacy education has never been more important for today’s students. Students of all ages need to gain relevant skills, knowledge and attitudes to be able to navigate our media-rich world. Media literacy skills will help them use credible online content and recognise misleading sources of information. They will understand how to fact-check information they find online and critically interpret it. They will raise their awareness of proper use of creative work and apply their learning when creating their own creative content.',
                'path' => '/training/mining-media-literacy',
                'category' => 'Training',
                'thumbnail' => '/img/learning/mining-media-literacy.png',
            ],
            [
                'name' => 'STORY-TELLING WITH HEDY',
                'description' => 'Have your pupils already mastered a visual programming language, but don’t feel ready to delve deeper into a text-based programming language? Then this learning bit is just for you and your pupils because it will help them bridge the gap between a visual and a text-based programming language. The learning bit Story-telling with Hedy comprises three lesson plans that use Hedy – a gradual programming language to teach children programming.',
                'path' => '/training/story-telling-with-hedy',
                'category' => 'Training',
                'thumbnail' => '/img/learning/story-telling-with-hedy.png',
            ],
            [
                'name' => 'Feel The Code',
                'description' => 'Social and emotional well-being is the ability to be resilient, know how to manage one’s emotions and respond to other people\'s emotions, develop meaningful relationships with others, generate emotions that lead to good feelings and create one own’s emotional support network. The social and emotional skills that young people learn in school help them build resilience and set the pattern for how they will manage their physical and mental health throughout their lives. (Council of Europe).',
                'path' => '/training/feel-the-code',
                'category' => 'Training',
                'thumbnail' => '/img/learning/feel-the-code.jpg',
            ],
            [
                'name' => 'SOS Water',
                'description' => 'SOS Water is a response to the need to address the problem of water pollution. Despite the efforts made in recent years, there are still 2 billion people around the world who do not have access to safe drinking water. This means that Sustainable Development Goal (SDG) 6 of the 2030 Agenda, which states that all people should have access to safely managed water and sanitation by 2030, is far from being achieved. The same is true for SDG 14, underwater life, which aims to conserve and use sustainably the oceans, seas and marine resources for sustainable development.',
                'path' => '/training/sos-water',
                'category' => 'Training',
                'thumbnail' => '/img/learning/sos-water.png',
            ],
            [
                'name' => 'Creative Scratch Laboratory',
                'description' => 'Learning programming today goes beyond preparing for a programming career and extends beyond the boundaries of computer science. It should be approached broadly, embracing an interdisciplinary perspective and utilizing programming as a tool for learning and play to foster the development of future skills.',
                'path' => '/training/creative-scratch-laboratory',
                'category' => 'Training',
                'thumbnail' => '/img/learning/creative-scratch-laboratory.png',
            ],
            [
                'name' => 'Code Through Art',
                'description' => 'Children are growing up in a complex world that is constantly developing technologically, which requires innovative educational approaches for early childhood educators. These approaches include activities that promote computational thinking and programming from a young age. Research suggests that targeted activities can effectively develop children’s computational thinking and problem-solving skills and at the same time such activities foster their creative expression through technology.',
                'path' => '/training/code-through-art',
                'category' => 'Training',
                'thumbnail' => '/img/learning/code-through-art.png',
            ],
            [
                'name' => 'Making and coding',
                'description' => 'Makerspaces are vibrant hubs where creativity thrives and hands-on projects come to life. When selecting equipment for a makerspace, the focus is on tools such as Calliope mini, Microbit, or Makey Makey, as they offer a wide range of possibilities suitable for students of different ages and skill levels. These boards support the development of creative projects for younger children thanks to their block-based programming languages are available for these boards. For older students, more complex projects can be generated using these boards.',
                'path' => '/training/making-and-coding',
                'category' => 'Training',
                'thumbnail' => '/img/learning/making-and-coding.png',
            ],
            // Challenges
        ];

        foreach ($subPages as $subPage) {
            StaticPage::updateOrCreate([
                'language' => 'en',
                'path' => $subPage['path']
            ], [
                'name' => $subPage['name'],
                'description' => $subPage['description'],
                'path' => $subPage['path'],
                'keywords' => $subPage['keywords'] ?? [],
                'thumbnail' => $subPage['thumbnail'],
                'category' => $subPage['category'],
                'link_type' => $subPage['link_type'] ?? 'internal_link',
            ]);
        }
    }
}
