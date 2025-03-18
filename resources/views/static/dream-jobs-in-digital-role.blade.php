@extends('layout.new_base')

@php
    $id = request()->segment(2);

    $results = [
        [
            'id' => '1',
            'first_name' => 'Anny',
            'last_name' => 'Tubbs',
            'role' => 'Multimedia producer at First Move Productions',
            'image' => '/images/dream-jobs/anny-tubbs.png',
            'description1' => "Anny Tubbs' professional path began in law and evolved into multinational leadership roles, where she was tasked with delivering large-scale change in complex matrix organisations. Her focus grew from antitrust matters and sales to anti-corruption and the full spectrum of business ethics. This taught her the importance of thoughtful communication and outreach.",
            'description2' => "Anny has always been inspired by individuals whose values and skills make a positive difference. In today’s hyperconnected world - where digital and real-world issues intertwine - she seeks to leverage digital media to spotlight constructive news and encourage informed dialogue for a better future. To update her skills, Anny attended film school and completed an MSc in Journalism and Media in Europe. She co-founded a production company, directed several short documentaries, and began working with the multimedia team of a European news agency. Today, she is involved in multimedia production, content creation and educational projects that focus on digital and values-driven learning. She enjoys the fact that technology makes it possible to connect with people from all over the world.",
            'link' => 'https://www.linkedin.com/in/annytubbs/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Anny Tubbs/Dream Jobs in Digital video Anny Tubbs.mp4?csf=1&web=1&e=ATxZaz',
            'pathway_map_link' => 'Career Pathway Map Anny Tubbs.pdf',
            'country' => 'be'
        ],
        [
            'id' => '2',
            'first_name' => 'Magda',
            'last_name' => 'Vanzetto',
            'role' => 'Head of Project Development and Governance, Energy Performance Services at Siemens',
            'image' => '/images/dream-jobs/magda-vanzetto.png',
            'description1' => "Magda Vanzetto is the Head of Energy Engineers at Siemens Smart Infrastructure in Sustainability Technical Unit. ",
            'description2' => "She has been active part in projects aimed at improving energy efficiency and reducing carbon footprint of multiple customers facilities. ",
            'link' => 'https://www.linkedin.com/in/magda-vanzetto-42567034/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Magda Vanzetto/Dream Jobs in Digital Magda Vanzetto.mp4?csf=1&web=1&e=R7g9hd',
            'pathway_map_link' => 'C4E Career Pathway Map_MV.pdf',
            'country' => 'sz'
        ],
        [
            'id' => '3',
            'first_name' => 'Roxana',
            'last_name' => 'Freusse',
            'role' => 'Team Lead Cloud Solutions & DevOps, Scrum Master at Siemens',
            'image' => '/images/dream-jobs/roxana-freusse.png',
            'description1' => "Roxana Freusse is the Team Lead for Cloud Solutions & DevOps and a Scrum Master at Siemens. With extensive experience in cloud technologies and agile methodologies, she excels in leading cross-functional teams to deliver innovative solutions. ",
            'description2' => "Roxana is known for her expertise in cloud infrastructure, DevOps practices, and her ability to foster collaboration and continuous improvement within her teams. Her leadership and technical skills have been instrumental in driving successful projects and enhancing operational efficiency at Siemens.",
            'link' => 'https://www.linkedin.com/in/roxanafreusse/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Roxana Freusse/Dream Jobs in Digital Roxana Freusse.mp4?csf=1&web=1&e=xxZhCa',
            'pathway_map_link' => 'C4E Career Pathway Map Roxana.pdf',
            'country' => 'sz'
        ],
        [
            'id' => '4',
            'first_name' => 'Vasileios',
            'last_name' => 'Linardos',
            'role' => 'Head of AI at ARCHEIOTHIKI SA',
            'image' => '/images/dream-jobs/vasileios-linardos.png',
            'description1' => "Vasileios Linardos is Head of AI at Archeiothiki SA and a PhDc at the International Hellenic University in Thessaloniki, Greece, where he focuses on developing AI tools and methodologies for disaster management. ",
            'description2' => "He holds a Bachelor's degree in Informatics from the Athens University of Economics and Business. His expertise encompasses machine learning and deep learning applications in disaster management, with several publications on the topic. Additionally, Vasileios has expertise in large language models (LLMs), vision-language models (VLLMs), and other emerging technologies, which he applies to design and develop innovative AI solutions.",
            'link' => 'https://www.linkedin.com/in/vasileios-linardos-a18294195/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Vasileios Linardos/Dream Jobs in Digital video Vasileios Linardos.MOV?csf=1&web=1&e=BWFXxX',
            'pathway_map_link' => 'C4E Career Map Vasileios Linardos.pdf',
            'country' => 'gr'
        ],
        [
            'id' => '5',
            'first_name' => 'Carole',
            'last_name' => 'Colley',
            'role' => 'Bid & Proposal Management at Avanade',
            'image' => '/images/dream-jobs/carole-colley.png',
            'description1' => "Carole Colley has accumulated over 15 years of experience in IT. Carole's journey into digital transformation has been marked by significant milestones. As a functional consultant, project manager and bid manager (pre-sales), Carole has successfully navigated complex projects and contributed to the growth of the organizations she has worked with.",
            'description2' => "Carole is committed to seizing every possible opportunity to grow both professionally and personally. This dedication is evident in her focus on people management, participation in the School of Innovation, and continuous efforts to train and get certified. Carole's growth mindset ensures she remains at the forefront of industry developments and best practices. For Carole, commitment is not just about receiving but also about giving back to peers. As an employee network lead and vice secretary to a Work Council, Carole has demonstrated a strong commitment to fostering a supportive and collaborative work environment. Her leadership in these roles underscores the importance of community and mutual support in achieving collective success.",
            'link' => 'https://www.linkedin.com/in/carole-colley-pmp%C2%AE-a932077b/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Carole Colley/Dream Jobs in Digital video Carole Colley.mp4?csf=1&web=1&e=sF2fDf',
            'pathway_map_link' => 'Career Pathway Map Carole Colley.pdf',
            'country' => 'fr'
        ],
        [
            'id' => '6',
            'first_name' => 'Christina',
            'last_name' => 'Kiamili',
            'role' => 'Digital Portfolio Manager at Siemens',
            'image' => '/images/dream-jobs/christina-kiamili.png',
            'description1' => "Christina Kiamili is the Digital Portfolio Manager at Siemens.",
            'description2' => "In her role, she oversees the development and management of digital projects, ensuring they align with the company's strategic objectives. Christina is known for her expertise in digital transformation, project management, and her ability to lead cross-functional teams. She focuses on driving innovation and continuous improvement within Siemens, leveraging her strong background in both agile and waterfall methodologies.",
            'link' => 'https://www.linkedin.com/in/christina-kiamili-23582a114/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Christina Kiamili/Dream Jobs in Digital Christina Kiamili.mp4?csf=1&web=1&e=n9GdzV',
            'pathway_map_link' => 'Career Pathway Map Christina Kiamili.pdf',
            'country' => 'sz'
        ],
        [
            'id' => '7',
            'first_name' => 'Devon',
            'last_name' => 'Young',
            'role' => 'UX Design at Avanade',
            'image' => '/images/dream-jobs/devon-young.png',
            'description1' => "Devon Young is Senior User Experience Manager at Avanade. She has over 20 years of experience in design, with a recent focus on design operations, strategy, recruiting, and nurturing talent. ",
            'description2' => "She believes that great design outcomes stem from a great team environment. Her passion for design began in high school in Missouri, USA where she created CD covers and T-shirts. Encouraged by her father, she pursued a career in design, studying Graphic Design at university.",
            'link' => 'https://www.linkedin.com/in/devoneyoung/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Devon Young/Dream Jobs in Digital video Devon Young.mp4?csf=1&web=1&e=hCCvkk',
            'pathway_map_link' => 'C4E Career Pathway Map - Devon Young.pdf',
            'country' => 'uk'
        ],
        [
            'id' => '9',
            'first_name' => 'Paula',
            'last_name' => 'Panarra',
            'role' => 'General Manager at Avanade UK & Ireland',
            'image' => '/images/dream-jobs/paula-panarra.png',
            'description1' => "Paula Panarra is the General Manager at Avanade UK & Ireland. Previously, she served as the Global Business Applications Sales Lead for Retail and Consumer Goods at Microsoft Portugal, where she was the General Director from 2016. In this role, she guided the organization through the digital transformation of the Portuguese economy, empowering people and organizations with technology.",
            'description2' => "She joined Microsoft in 2010 as the CMO Lead, later becoming the Marketing & Operations Lead in 2013, and the Public Sector Lead in 2016. Before her tenure at Microsoft, Paula spent 15 years at Procter & Gamble Portugal and Iberia, holding various roles in Finance and Marketing, including Corporate Marketing Director, Finance Group Director, and Communication Director. Paula graduated in Chemical Engineering from the Instituto Superior Técnico in 1994. She is known for her optimism, solution-oriented mindset, and commitment to doing the right thing. Outside of her professional life, she is a proud mother of three daughters, an avid reader, a music lover, and an adventurous traveler.",
            'link' => 'https://www.linkedin.com/in/paulapanarra/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Paula Panarra/Dream Jobs in Digital video Paula Panarra.webm?csf=1&web=1&e=X2ek4w',
            'pathway_map_link' => '',
            'country' => 'sp'
        ],
        [
            'id' => '10',
            'first_name' => 'Ribka',
            'last_name' => 'Balakrishnan',
            'role' => 'Mechanical Design Engineer at WSAudiology',
            'image' => '/images/dream-jobs/ribka-balakrishnan.png',
            'description1' => "Ribka Balakrishnan is a Mechanical Design Engineer working at WSAudiology. ",
            'description2' => "She is deeply involved in the research and development of hearing aids, and enjoys the hands-on aspects of her role, including prototyping and testing, which allow her to work closely with the products. She is also passionate about advocating for and supporting girls and women in all parts of society.",
            'link' => 'https://www.linkedin.com/in/ribka-balakrishnan/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Ribka Balakrishnan/Dream Jobs in Digital video Ribka Balakrishnan.MOV?csf=1&web=1&e=2GaNqY',
            'pathway_map_link' => 'Career Pathway Map Ribka Balakrishnan.pdf',
            'country' => 'da'
        ],
        [
            'id' => '11',
            'first_name' => 'Jeevantika',
            'last_name' => 'Lingalwar',
            'role' => 'Cloud Solution Architect at Microsoft',
            'image' => '/images/dream-jobs/jeevantika-lingalwar.png',
            'description1' => "Jeevantika Lingalwar is a Partner Solution Architect at Microsoft, TEDx speaker, and founder of International Women in Tech, leading a community of over 7000 members. ",
            'description2' => "With M.Sc. degree in Cloud Computing and B.E in Computer Science Engineering, she is passionate about Women in Technology and Diversity & Inclusion. Jeevantika mentors' young minds about AI and hosts the podcast &quot;The Unplanned Journey,&quot; celebrating women's resilience. She has been recognized as a Top Voice of the New Era of Leaders 2024, awarded the WomenTech Global Ambassador Award in 2021, and is a finalist for many awards in Ireland.",
            'link' => 'https://www.linkedin.com/in/jeevantika-lingalwar/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Jeevantika Lingalwar/Dream Jobs in Digital Video Jeevantika Lingalwar.mp4?csf=1&web=1&e=Wweta7',
            'pathway_map_link' => 'Career Pathway Map Jeevantika Lingalwar.pdf',
            'country' => 'ei'
        ],
        [
            'id' => '12',
            'first_name' => 'Dominik',
            'last_name' => 'Bolerác',
            'role' => 'Application Developer at Zurich Insurance Company',
            'image' => '/images/dream-jobs/dominik-bolerác.png',
            'description1' => "Dominik’s professional journey began during his university studies at the international company Zurich Insurance. He participated in a rotational internship program, which allowed students to experience working in various departments within the company – including risk management, actuarial services, and pricing & analytics.",
            'description2' => "Currently, Dominik works full-time as an application developer in the risk management department, where he is responsible for day-to-day production tasks and creating API packages that help automate internal processes. He works with programming languages (R, SQL, DAX) and data visualization tools (Power BI) on a daily basis. Dominik studied mathematics in high school and continued to pursue it at the university level. In his free time, he plays drums in an ABBA tribute band, traveling all over the world thanks to his flexible work. He is also very passionate about running and holds a professional running coaching certificate, which allows him to share his knowledge with colleagues, his athletes, and other passionate runners.",
            'link' => 'https://www.linkedin.com/in/dominik-boler%C3%A1c-39b333209/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Dominik Boler%C3%A1c/Dream Jobs in Digital video Dominik Boler%C3%A1c.mp4?csf=1&web=1&e=7wfHer',
            'pathway_map_link' => 'C4E Career Pathway Map - Dominik Bolerac.pdf',
            'country' => 'lo'
        ],
        [
            'id' => '13',
            'first_name' => 'Sara',
            'last_name' => 'Mathews',
            'role' => 'Group Responsible AI Manager at The Adecco Group',
            'image' => '/images/dream-jobs/sara-mathews.png',
            'description1' => "Sarah Mathews is the Group Responsible AI Manager at The Adecco Group. She is responsible for operationalizing the group’s Responsible AI Principles by establishing governance, guidelines, and change management processes, as well as co-leading the implementation of the AI Act. With a wealth of experience in leading global AI initiatives, she is renowned for her expertise in integrating ethical and inclusive AI practices within the company.",
            'description2' => "Sarah’s dual background in Human Resources and AI gives her a unique perspective on HR-related AI systems worldwide. She excels at engaging stakeholders and bridging the gap between business and development teams, ensuring AI projects are scaled strategically with a business-driven and human-centric approach. Passionate about fostering knowledge-sharing communities, Sarah actively promotes best practices in AI across The Adecco Group’s brands and countries. Beyond her professional role, Sarah is dedicated to volunteering efforts that encourage women to enter the field of Data Science. She also mentors aspiring female leaders, helping them navigate and build successful careers in tech. ",
            'link' => 'https://www.linkedin.com/in/sarah-mathews-87b481122/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Sarah Mathews/Dream Jobs in Digital video Sarah Mathews.mp4?csf=1&web=1&e=oGpdEK',
            'pathway_map_link' => '',
            'country' => 'gm'
        ],
        [
            'id' => '14',
            'first_name' => 'Paraskevi',
            'last_name' => 'Nomikou',
            'role' => 'Marine Geologist and an Assistant Professor at the Department of Geology and Geoenvironment at the National and Kapodistrian University of Athens',
            'image' => '/images/dream-jobs/paraskevi-nomikou.png',
            'description1' => "Paraskevi Nomikou is a marine geologist and an Assistant Professor at the Department of Geology and Geoenvironment at the National and Kapodistrian University of Athens, Greece. She specializes in the study of underwater volcanoes and seafloor processes. With extensive experience in marine volcanic activity, she has participated in over 70 oceanographic cruises, focusing on submarine volcanism, mud volcanoes, landslides, and seafloor mineral deposits",
            'description2' => "Paraskevi has played a significant role in evaluating potential hazards associated with volcanic activity at the Santorini volcano and has been involved in mapping the seafloor of ocean core complexes and offshore volcanoes. She is also dedicated to educating and inspiring young women to pursue careers in oceanography through her lectures and innovative marine technologies",
            'link' => 'https://www.linkedin.com/in/paraskevi-nomikou-325393203/',
            'video' => 'https://jaye.sharepoint.com/:v:/r/sites/Code4EuropeProjectPlanner/Shared Documents/4_C4EU WP4/D4.1 Dream Jobs in Digital Campaign Plan/Role models/Paraskevi Nomikou/Dream Jobs in Digital Video Paraskevi Nomikou.MP4?csf=1&web=1&e=shyKYZ',
            'pathway_map_link' => '',
            'country' => 'gr'
        ],
    ];

    $item = collect($results)->firstWhere('id', $id);

    $list = [
      (object) ['label' => 'Careers in Digital', 'href' => '/dream-jobs-in-digital'],
      (object) ['label' => $item['first_name'] . ' ' . $item['last_name'], 'href' => ''],
    ];

    $resources = [
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_1'),
            'description' =>  __('dream-jobs-in-digital.resource_description_1'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_1'),
            'button_link' => '/docs/dream-jobs/C4E WP4 Careers in Digital Guide Toolkit.pdf',
            'image' => '/images/dream-jobs/career-guide.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_2'),
            'description' =>  __('dream-jobs-in-digital.resource_description_2'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_2'),
            'button_link' => '/docs/dream-jobs/C4E WP4 Career Day Toolkit.pdf',
            'image' => '/images/dream-jobs/inspiration-day.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_3'),
            'description' =>  __('dream-jobs-in-digital.resource_description_3'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_3'),
            'button_link' => '/docs/dream-jobs/Practical Skills – VET Toolkit.pdf',
            'image' => '/images/dream-jobs/vet-activities.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_4'),
            'description' =>  __('dream-jobs-in-digital.resource_description_4'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_4'),
            'button_link' => 'https://www.techskills.org/careers/quiz/',
            'image' => '/images/dream-jobs/skills-test.png',
        ],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-digital-girls-role-detail" class="font-['Blinker'] overflow-hidden">
        <section class="relative z-10">
            <div class="py-10 lg:py-20 codeweek-container-lg mb-8 lg:mb-0">
                <div class="flex items-center gap-6 mb-3">
                    <h2 class="text-dark-blue text-3xl md:text-4xl md:leading-[44px] font-medium font-['Montserrat']">
                        {{ $item['first_name'] }} {{ $item['last_name'] }}
                    </h2>
                    <img class="w-12 h-[30px] shadow-lg rounded" src="/images/flags/{{ $item['country'] }}-flag.gif" />
                </div>
                <p class="text-[22px] md:text-3xl text-[#333E48] font-medium font-['Montserrat'] p-0 mb-6">{{ $item['role'] }}</p>
                <div class="flex flex-col tablet:flex-row gap-6 xl:gap-12">
                    <div class="w-full tablet:w-1/3 xl:w-1/3">
                        <img class="rounded-xl mb-6" src="{{ $item['image'] }}" />
                        <p class="font-normal text-2xl p-0 mb-6">
                            {{ $item['description1'] }}
                        </p>
                        <p class="text-[#333E48] font-normal text-xl p-0 mb-6">
                            {{ $item['description2'] }}
                        </p>
                        <p class="text-[#333E48] font-normal text-xl p-0 mb-6">
                            Check out the career journey here: <a class="text-dark-blue underline" href="{{ $item['link'] }}" target="_blank">{{ $item['first_name'] }} {{ $item['last_name'] }}</a>
                        </p>
                    </div>
                    <div class="w-full tablet:w-2/3 xl:w-2/3">
                        <div class="relative rounded-xl mb-6">
                            <img class="rounded-xl" src="/images/dream-jobs/role-detail-video.png" />
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                @include('layout.video-player', ['id' => 'carrer-about', 'src' => $item['video']])
                            </div>
                        </div>
{{--                        <p class="text-[22px] md:text-3xl text-[#333E48] font-medium font-['Montserrat'] p-0">Video title here</p>--}}
                    </div>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-2/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#99E1F4] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-32 right-40 w-28 h-28 hidden lg:block bg-[#99E1F4] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative">
            <div class="absolute w-full h-full bg-light-blue md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden xl:block" style="clip-path: ellipse(108% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-dark-blue text-[22px] md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                    Explore Career Pathway
                </h2>
                <img class="rounded-xl w-full h-60 md:h-auto object-cover object-center mb-6 md:mb-12" src="/images/dream-jobs/pathway-map.png" />
                @if($item['pathway_map_link'])
                    <a class="font-normal text-xl text-dark-blue underline" target="_blank" href="/docs/dream-jobs/{{ $item['pathway_map_link'] }}">Career Pathway Map</a>
                @endif
            </div>
        </section>

        <section class="relative bg-light-blue">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden xl:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-white md:text-center text-3xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                    @lang('dream-jobs-in-digital.resources')
                </h2>
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 md:gap-10 xl:gap-20">
                    @foreach($resources as $resource)
                        <div class="px-6 py-8 md:p-12 rounded-2xl bg-white gap-4 sm:gap-10 grid grid-cols-1 sm:grid-cols-2">
                            <div class="flex-1 flex flex-col justify-between order-1">
                                <div>
                                    <p class="text-dark-blue text-[22px] md:text-3xl font-medium font-['Montserrat'] mb-4 md:mb-6 p-0">
                                        {{ $resource->title }}
                                    </p>
                                    <p class="text-[#333E48] font-normal text-lg md:text-xl leading-[30px] font-['Blinker'] p-0 mb-6 md:mb-10">
                                        {{ $resource->description }}
                                    </p>
                                </div>
                                <a
                                        class="text-nowrap flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                                        href="{{ $resource->button_link }}"
                                >
                                    <span>{{ $resource->button_text }}</span>
                                </a>
                            </div>

                            <div class="order-0 sm:order-2">
                                <img
                                        class="w-full flex-1 rounded-lg object-cover object-center max-w-full h-full"
                                        src="{{ $resource->image }}"
                                />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
