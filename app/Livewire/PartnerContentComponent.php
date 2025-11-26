<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class PartnerContentComponent extends Component
{
    use WithPagination;

    public $filter = 'Partners';

    public $selectedPartner = null; 
    public $selectedCouncilMember = null;
    public $gridColumns = 4; // Default to 4 columns

    // Registering listeners for Livewire events
    protected $listeners = ['filterChanged', 'showPartnerContent', 'setGridColumns'];
    // Update filter and reset pagination when filter changes

    public function filterChanged($filter)
        {
            $this->filter = $filter;
            $this->resetPage();

            // Reset selected items
            $this->selectedPartner = null;
            $this->selectedCouncilMember = null;
        }
        
    public function showPartnerContent($id)
    {
        if ($this->filter === 'Council Presidency') {
            // Handle council members
            if ($this->selectedCouncilMember && $this->selectedCouncilMember->id === $id) {
                // Deselect the council member
                $this->selectedCouncilMember = null;
            } else {
                $member = $this->getCouncilMembers()->firstWhere('id', $id);

                if ($member) {
                    $this->selectedCouncilMember = $member;
                    // Deselect any selected partner
                    $this->selectedPartner = null;
                } else {
                    logger("Council Member with ID {$id} not found");
                }
            }
        } else {
            // Handle partners
            if ($this->selectedPartner && $this->selectedPartner->id === $id) {
                // Deselect the partner
                $this->selectedPartner = null;
            } else {
                $partner = $this->getAllPartners()->firstWhere('id', $id);

                if ($partner) {
                    $this->selectedPartner = $partner;
                    // Deselect any selected council member
                    $this->selectedCouncilMember = null;
                } else {
                    logger("Partner with ID {$id} not found");
                }
            }
        }
    }

    public function setGridColumns($columns)
    {
        $this->gridColumns = $columns;
        $this->resetPage(); // Reset pagination when grid columns change
    }

       // Computed property to get the component ID
    public function getComponentIdProperty()
    {
        return $this->getId();
    }

    public $componentId;

    public function mount()
    {
        $this->componentId = uniqid('livewire-'); // Generates a unique ID for this component
    }


    private function getAllPartners()
    {
        return collect([
                (object)[
                'id' => 1,
                'name' => 'JA EUROPE',
                'logo_url' => 'images/partners/JAEurope1.jpg',
                'categories' => ['Partners'],
                 'description' => 'JA Europe is coordinating the Code4Europe Project, leading a consortium of 41 partners and 4 Associated Partners from over 20 countries.  
                <br>
                JA Europe is the largest and leading organisation in Europe dedicated to inspiring and preparing young people to succeed through hands-on, experiential learning in entrepreneurship, work readiness and financial health. In 2024, JA Worldwide is nominated for the Nobel Peace Prize, the third nomination in three years. JA Europe is a 
                pan-European network of 42 national Junior Achievement (JA) organisations that aim to teach young people as early as possible about the world of enterprise and entrepreneurship. In the last school year, the JA Europe network provided 6 million learning experiences for youth online, in person and blended formats.  
                <br>
                JA Europe’s focus on providing at least one entrepreneurial experience to all youth, especially those in disadvantaged and underserved communities, helping to create a generation of young people ready to innovate and lead in a digital world. JA Europe aims to equip young people with the necessary skills to navigate the digital world and prepare them for the future of work.',
                'link_url' => 'https://jaeurope.org/',
                'main_img_url' => 'images/partners/JAEurope.jpg'
                ],
            (object)[
                'id' => 2,
                'name' => 'CoderDojo Belgium',
                'logo_url' => 'images/partners/coderdojo.png',
                'categories' => ['Partners'],
                'description' => 'CoderDojo Belgium is part of the international CoderDojo Foundation and part of the Raspberry Pi foundation. CoderDojo organizes coding clubs for kids and youngsters from 7 - 17. We have been active in Belgium as CoderDojo Belgium for 11 years. <br>We participate in the consortium as partners and we\'re participating in WP 2 and more specifically on 2.3, 2.5, 2.8. to help organizing Hackathons and new cutting edge content.',
                'link_url' => 'https://coderdojobelgium.be/fr/',
                'main_img_url' => 'images/partners/coderdojo.png'
            ],
            (object)[
                'id' => 3,
                'name' => 'Profil Klett',
                'logo_url' => 'images/partners/profilklett.jpg',
                'categories' => ['Partners'],
                'description' => 'Profil Klett, as a part of KLETT group has long tradition of publishing textbooks and other educational publications. Company aspires to blend knowledge, innovation, and top-notch quality in crafting educational content, print and digital, that not only inspires but empowers teachers and learners. Our commitment to enhancing the Croatian educational framework extends to equipping educational institutions with cutting-edge digital infrastructure. Profil Klett is at the forefront of educational advancement, contributing significantly from early childhood education in kindergartens to higher education.
                <br>
                Through our methodological excellence and pedagogical prowess, infused with the latest technologies, our digital platform IZZI has a global impact on education in general.
                Our main focus is to produce educational content, and position it profitably on the market.
                <br>
                In this project, Profil Klett is creating new content on digital technologies and soft skills, which, in addition to programming, explores areas such as generative artificial intelligence, sensors, robotics, and drones, with a special emphasis on increasing the participation of girls in STEM fields.',
                'link_url' => 'https://www.profil-klett.hr/',
                'main_img_url' => 'images/partners/profilklett.jpg'
            ],
            (object)[
                'id' => 4,
                'name' => 'Digitale Wolven',
                'logo_url' => 'images/partners/DigitaleWolven.png',
                'categories' => ['Partners'],
                'description' => 'Digitale Wolven is a non-profit in Belgium. They aim to help children and young people prepare for the digital world of today and tomorrow. By letting them get to work with applications themselves, they can discover the possibilities independently. That way, they learn to use innovation and technology as a real superpower, which they use at appropriate moments to make themselves and their environment a little better every time.
                <br>
                The focus of Digitale Wolven is for kids age 7-18 and especially at school. They teach kids how to code, robotics, digital skills, ..
                <br>
                Within the Code4Europe consurtium Digitale Wolven is the national hub for Belgium and the Netherlands.',
                'link_url' => 'https://www.digitalewolven.be',
                'main_img_url' => 'images/partners/DigitaleWolven.png'
            ],
            (object)[
                'id' => 5,
                'name' => 'Matrix Internet',
                'logo_url' => 'images/partners/matrix.png',
                'categories' => ['Partners'],
                'description' => 'Established in 2000, Matrix is an award-winning European digital agency with offices in Dublin and Brussels. We are a team of 40+ experts from 18 countries, with a global outlook and a deep commitment to driving impactful change through some of the EU’s most vital digital skills initiatives.
                <br>
                We specialise in digital transformation, supporting a diverse range of clients including SMEs, startups, government bodies and EU agencies, with a strong focus on design and development, digital marketing, communications and international strategy.
                <br>
                As part of the international Code4Europe Consortium, Matrix leads Communication & Event Management, refining the programme’s brand strategy and elevating digital engagement all over Europe. Our work includes delivering EU-wide campaigns, revamping the EU Code Week website, optimising UX/UI, enhancing SEO, and ensuring cohesive messaging in all digital channels. Additionally, we manage social media strategy, content and engagement, supporting a connected, vibrant community through digital skills outreach across Europe.
                 <br>
                 At Matrix, we are passionate about making a positive difference for Europe’s future, empowering communities and nurturing digital skills that drive innovation and growth.',
                'link_url' => 'https://www.matrixinternet.ie/',
                'main_img_url' => 'images/partners/matrix.png'
            ],
            (object)[
                'id' => 6,
                'name' => 'eSkills Malta Foundation',
                'logo_url' => 'images/partners/eskills.jpg',
                 'categories' => ['Partners'],
                 'description' => 'The eSkills Malta Foundation was established by the Government of Malta in 2014 with the mission of uniting stakeholders from government, education, and industry to develop the skills needed for a digitally driven knowledge economy. Since its inception, the Foundation has launched numerous initiatives to foster the growth of a skilled workforce through upskilling and reskilling efforts. It has also played a key role in shaping national policy by contributing to strategies, studies, and position papers, ensuring that stakeholder feedback is incorporated. As Malta\'s National Coalition for Digital Skills and Jobs, the Foundation is responsible for crafting the Malta National eSkills Strategy for 2019-2021 and 2022-2025, which outlines key actions and recommendations aimed at improving digital literacy in education, society, and the labor market.
                <br>
                In addition to policy work, the eSkills Malta Foundation provides advice to the government and other stakeholders on matters relating to eSkills development. This includes expanding ICT educational programs and leading initiatives to build professionalism within the ICT sector. The Foundation also supports reforms in ICT education, helping to strengthen the capacity of the ICT education community. By promoting Malta\’s potential in the field of digital skills both locally and internationally, it aims to ensure that the country remains at the forefront of digital innovation.
                <br>
                A consistent leader in the EU Codeweek, the eSkills Malta Foundation has earned top rankings for the number of events held per capita in several years. As Malta\’s National Hub for EU Codeweek, the Foundation plays a pivotal role in supporting Maltese ambassadors, schoolteachers, trainers, and volunteers. It organizes widespread campaigns and events, engaging with the Digital Skills Ecosystem, which includes local governments, universities, and training providers. The Foundation also continues to strengthen collaboration with international partners to further advance its mission.',
                'link_url' => 'https://www.eskills.org.mt',
                'main_img_url' => 'images/partners/eskills.jpg'
            ],
            (object)[
                'id' => 7,
                'name' => 'Latvian Information and communications technology association (LIKTA)',
                'logo_url' => 'images/partners/likta.png',
                 'categories' => ['Partners'],
                'description' => 'Latvian Information and communications technology association (LIKTA) unites leading ICT industry companies and organizations, as well as ICT professionals. The goal of LIKTA is to foster growth of ICT sector in Latvia by promoting the development of information society and ICT education thus increasing the competitiveness of Latvia on a global scale. 
                <br>
                LIKTA joins the Code4Europe consortium to encourage Latvian youth to learn programming and digital literacy in an interesting and engaging way. Our main mission is to promote the EU Code Week initiative, empower teachers and students to become a digitally savvy generation, and make programming and technology skills accessible to all.',
                'link_url' => 'https://www.likta.lv',
                'main_img_url' => 'images/partners/likta.png'
            ],
            (object)[
                'id' => 8,
                'name' => 'JA Ukraine',
                'logo_url' => 'images/partners/JAUkraine1.png',
                'categories' => ['Partners'],
                'description' => 'Junior Achievement Ukraine is a non-governmental organization that fosters youth entrepreneurship, financial literacy, and digital skills. As part of the Code4Europe Consortium, we implement initiatives to enhance digital literacy and develop IT talent in Ukraine. Our efforts focus on organizing educational events, hackathons, trainings for educators, and creating opportunities for young people through partnerships with leading IT companies.',
                'link_url' => 'https://ja-ukraine.org',
                'main_img_url' => 'images/partners/JAUkraine1.png'
            ],
            (object)[
                'id' => 9,
                'name' => 'CityLab, STEM Labs (GREECE)',
                'logo_url' => 'images/partners/citylab.png',
                 'categories' => ['Partners'],
                'description' => 'CityLab is a company in the area of STEM / Educational Robotics School Services, offered since 2014 to students (age 4 to 18), schools, teachers (via “train the trainer” programs), in general workshops and seminars open for the public, as well as in corporate seminars and activities. The program is designed and carried out by a team of scientists and engineers, with degrees in one or more STEM fields. 
                <br>
                CityLab, as a National Hub Leader for Greece, will act as a central touchpoint for the promotion and dissemination of EU Code Week, supporting Ambassadors and Leading Teachers to create Events and Activities, engaging the Digital Skills Ecosystem. Moreover, CityLab will assist in the creation of a “Dream Jobs Digital Career Pathway” plan.
                CityLab will also assist in the validation and approval of the suggested activities and will contribute by designing and implementing lessons in the fields of STEM and Robotics.',
                'link_url' => 'https://www.citylab.gr',
                'main_img_url' => 'images/partners/citylab.png'
            ],
            (object)[
                'id' => 10,
                'name' => 'European Centre for Women in Technology - ECWT',
                'logo_url' => 'images/partners/ecwt.png',
                'categories' => ['Partners'],
                'description' => 'The European Centre for Women in Technology - ECWT is a key partner in the Code4Europe Consortium, emphasizing the growing importance of Diversity, Equity, Inclusion and Sustainability in Digital Transformation and reaching the Digital Decade targets. ECWT collaborates with its National Points of Contacts - N-PoCs in more than 30 European countries, enlisting a diverse array of women-in-tech organizations and key ecosystem players as partners for EU Code Weeks 2024-2026. ECWTs initiatives aim specifically to demonstrate out of the box thinking of female involvement in digital careers, contribute to making the Code Weeks more inclusive and impactful,  aligning with high profile campaigns & events such as Girls in ICT day, create synergies with other Women in STEM / Digital initiatives throughout Europe and new linkages with innovative girls and ecosystems globally.
                <br>
                Within the Code4Europe Consortium, ECWT leads and co-leads diverse initiatives aimed at motivating and assisting young females in embarking on digital professions. ECWT is  responsible for an innovative program of interactive \'Girls in Digital\' events at EU and National level and which involves organizing campaigns, events, and collaborations to highlight  and award female role models, showcase effective mentoring programs, contribute to expanding the European EU Code Week to new countries with a focus on enhancing the accessibility and attractiveness of digital skills and employment for young girls and create synergies with other Coding and STEM initiatives.
                <br>
                Additionally, ECWT is key to Code4Europe\'s larger plan, which aims to guarantee that initiatives for digital education equally benefit boys and girls. In regard to institutionalizing  Regional Hubs the Nordic Hub desires to serve as a good example for other regions. ECWT will contribute to identify and support impactful and scalable models through Grant Rounds. ECWT will also collaborates to create materials and run campaigns using social media platforms like TikTok and YouTube to showcase success stories and encouraging role models',
                'link_url' => 'https://ecwt.eu/',
                'main_img_url' => 'images/partners/ecwt.png'
            ],
            (object)[
                'id' => 11,
                'name' => ' Euractiv',
                'logo_url' => 'images/partners/Euractiv.png',
                'categories' => ['Partners'],
                 'description' => 'Euractiv is an independent pan-European media network specialised in EU affairs. We cover EU policy processes upstream of decisions, summarising the issues without taking sides. Euractiv’s policy coverage is spread across eight ‘hubs’, Agrifood, Economy, Energy & Environment & Transport, Global Europe, Health, Politics, Technology, and Defence. Our news coverage is complemented by a strong events programme where we bring together the key stakeholders across the breadth of European policy-making for constructive discussion and debate. Euractiv is an experienced communication, dissemination, and exploitation partner in many European projects.',
                'link_url' => 'https://www.euractiv.com/',
                'main_img_url' => 'images/partners/Euractiv.png'
            ],
            (object)[
                'id' => 12,
                'name' => 'Officina Futuro Fondazione W-Group ETS',
                'logo_url' => 'images/partners/offwg.jpg',
                'categories' => ['Partners'],
                'description' => 'Officina Futuro Fondazione W-Group ETS is an Italian organization dedicated to promoting equality and inclusion in education and the workforce, with a particular focus on reducing the gender gap in STEM (Science, Technology, Engineering, and Mathematics) fields. Through its innovative programs and partnerships with both public and private sectors, the foundation works to inspire young people, particularly girls, to explore and develop skills in technology and digital creativity. By fostering an environment of collaboration and empowerment, Officina Futuro Fondazione W-Group is driving positive social change and helping to shape the future of education in Italy and beyond.
                Girls Code It Better (GCIB) is a flagship initiative of Officina Futuro Fondazione W-Group, created to tackle the gender imbalance in STEM fields by engaging middle and high school girls in hands-on digital learning experiences. The program offers specialized “clubs” where girls learn programming, robotics, digital creativity, and entrepreneurship in a supportive and stimulating environment. By focusing on building confidence, leadership, and problem-solving skills, GCIB encourages girls to pursue further education and careers in technology. The initiative has reached thousands of students across Italy, equipping them with the tools to succeed in traditionally male-dominated industries. 
                As part of the Code4Europe project, Girls Code It Better will share its extensive experience from thousands of workshops conducted across Italy. GCIB will offer its expertise by creating a specialized framework for STEM workshops, which will be delivered online by expert coaches to participants across Europe. To further promote the initiative, GCIB will organize "sprint" clubs, both in-person and online, aimed at engaging girls from all over Europe. Additionally, a 30-hour in-person GCIB Club will be launched, providing a deeper, hands-on experience to inspire and empower girls in STEM. These workshops will focus on reducing the digital gender gap, fostering entrepreneurship, and enhancing teamwork, critical thinking, and creativity. Through its involvement in Code4Europe, GCIB aims to inspire and empower girls throughout Europe to pursue their passions in technology and innovation.',
                'link_url' => 'https://www.girlscodeitbetter.it',
                'main_img_url' => 'images/partners/offwg.jpg'
            ],
            (object)[
                'id' => 13,
                'name' => 'Charlie Miller Group',
                'logo_url' => 'images/partners/charliemiller.webp',
                'categories' => ['Partners'],
                'description' => 'As the co-founder of Be My Eyes, I have 10 years experience in accessibility for people who are blind or visually impaired.',
                'link_url' => 'https://charliemiller.group',
                'main_img_url' => 'images/partners/charliemiller.web'
            ],
            (object)[
                'id' => 14,
                'name' => 'CyRIC - Cyprus Research and Innovation Center',
                'logo_url' => 'images/partners/cyric.png',
                'categories' => ['Partners'],
               'description' => 'CyRIC is a fast-growing company with a strategic aim to become an important regional Center developing disruptive products for the world markets, providing unique, high-quality services to the industry. It  offers Research and Innovation services for its customers in the fields of engineering design and prototyping, electronics and communications and software solutions. In addition, specialized consultancy and entrepreneurship services are offered to startups and SMEs. CyRIC also accumulates vast experience in Research and Innovation and Industry projects with participation in more than 40 R&D projects with budget, exceeding 40 million Euros, either as a coordinator or as a partner.
                CyRIC will coordinate one of the 20 national and regional hubs, that of Cyprus, in collaboration with the EU Code Week Ambassador and the assigned Leading Teachers. Pointing out on the local needs CyRIC will create a dynamic network of central touchpoints for the promotion and dissemination of information about EU Code Week​, to empower and expand such impactful activities, that are closer to the local needs and context​.',
                'link_url' => 'https://www.cyric.eu',
                'main_img_url' => 'images/partners/cyric.png'
            ],
            (object)[
                'id' => 15,
                'name' => 'Uni Systems Information Technology Systems Commercial Single Member Societe Anonyme (trading as Uni Systems S.M.S.A.)',
                'logo_url' => 'images/partners/Unisystems.png',
                'categories' => ['Partners'], 
                'description' => 'Uni Systems is one of the most reliable European Information and Communication Technology companies that delivers a wide range of products and services, helping its customers adapt and excel in a rapidly changing and challenging business environment. Uni Systems is a long-standing strategic partner to financial institutions, public organizations, telecom operators, enterprises, and institutions in the European region. It has a proven track record of successful large-scale, complex and critical ICT projects in more than 30 countries through its business entities in Athens, Brussels, Bucharest, Luxembourg, and Milan. Its portfolio includes from modern ICT infrastructures (cloud based and virtualized) up to state of the art business applications (platform based or on demand). Through its RDI department, the company has thus far participated in the planning, implementation, and dissemination of more than 40 National and European projects under numerous programmes (Horizon Europe, H2020, Digital Europe, Erasmus+, Greek General Secretariat for Research and Technology, etc.), across numerous domains such as Energy, Smart Cities, Mobility, Digital Skills & Education, Security & Cybersecurity, Environment & Climate Change, Health, Culture, etc. 
                <br>
                Uni Systems, as a technology company, has focused a lot during the past few years in the upskilling and reskilling of its workforce, and also continuously engages in corporate social responsibility activities that seek to develop digital skills in young graduates and audiences. One such example is the coding academies that the company has run in the past few years, targeted to new graduates that may not have such a background but who wish to learn more about coding and ICT, some of which are offered employment with the company after the end of the training programme – this is funded entirely by the company. More recently, the company has fully appreciated the need to extend such activities to younger audiences and has organized summer camps for the employees’ children, focusing on STEM topics, particularly engineering, robotics, coding, programming and algorithms, etc. 
                <br>
                As part of its participation in the Code4Europe consortium, Uni Systems will lead the development of a toolkit and promotional campaign for CSR activities, targeted to companies and the industry. The toolkit will seek to provide a plethora of CSR actions and initiatives that companies can pursue / organize in order to engage with schools and promote the EU CodeWeek as well as careers in STEM and digital fields. Uni Systems is also a contributing partner to the Greek National Hub for EU CodeWeek, led by Citylab.',
                'link_url' => 'https://www.unisystems.com/',
                'main_img_url' => 'images/partners/Unisystems.png'
            ],
            (object)[
                'id' => 16,
                'name' => 'Science on Stage Germany',
                'logo_url' => 'images/partners/sos.jpg',
                'categories' => ['Partners'],
                'description' => 'Science on Stage Germany is a non-profit educational initiative and part of the largest network for STEM teachers in Europe. We put STEM in the spotlight, support educators, offer up-to-date teaching materials, international education festivals and much more. As part of the Code Week, we coordinate the regional hub Germany, Austria, Liechtenstein and Switzerland.',
                'link_url' => 'https://www.science-on-stage.de/',
                'main_img_url' => 'images/partners/sos.jpg'
            ],
            (object)[
                'id' => 17,
                'name' => 'National Collage of Ireland',
                'logo_url' => 'images/partners/nci.png',
                'categories' => ['Partners'],
                 'description' => 'National College of Ireland (NCI) is an Irish not-for-profit, state-aided third-level education institution founded in 1951. In 2016, NCI became the first institution outside of the Institute of Technology sector to offer higher education apprenticeships. NCI is involved in WP2 and WP4 bringing up its high performace and expertise in the educational sector by collaborations with  academic institutions, particularly univeristies in the digital sector, via its project via The Cloud Competency Centre',
                'link_url' => 'https://www.ncirl.ie/',
                'main_img_url' => 'images/partners/nci.png'
            ],
            (object)[
                'id' => 18,
                'name' => 'Intel',
                'logo_url' => 'images/partners/Intel-Logo.png',
                'categories' => ['Partners'],
                 'description' => 'Intel is an industry leader, creating world-changing technology that enables global progress and enriches lives. Inspired by Moore’s Law, we continuously work to advance the design and manufacturing of semiconductors to help address our customers’ greatest challenges. By embedding intelligence in the cloud, network, edge and every kind of computing device, we unleash the potential of data to transform business and society for the better. 
                Intel\'s mission is to create technology that improves lives, with a focus on inclusivity and expanding digital readiness. As the digital economy grows rapidly, there is an increasing demand for AI, digital, and green skills to drive national competitiveness and secure supply chains. However, a significant skills gap persists. To address this, Intel has launched the Intel Digital Readiness Program portfolio aimed at equipping diverse audiences with the knowledge and trust needed to responsibly engage with emerging technologies. As part of the Code4Europe project, our role is to provide engaging, tested content to help build digital trust and cyber and AI skills across the EU.',
                'link_url' => 'https://www.intel.com/content/www/us/en/homepage.html',
                'main_img_url' => 'images/partners/Intel-Logo.png'
            ],
            (object)[
                'id' => 19,
                'name' => 'Simplon.co',
                'logo_url' => 'images/partners/simplon.png',
                'categories' => ['Partners'],
                 'description' => 'Simplon.co is a network of social digital factories that offer free, intensive courses in digital professions in France and abroad. As the national hub for France in the Code4Europe Consortium, Simplon enhances digital education by organizing events and supporting schools, teachers, and ambassadors during EU Code Week. Its mission is to build a strong network to foster digital skills among youth and address Europe’s digital skills gap​.
                Simplon leads initiatives like hackathons and mentorship programs, promoting digital careers and making technology accessible to all, especially underrepresented groups. It plays an important role in mobilizing national ecosystems to strengthen digital education across Europe​..',
                'link_url' => 'https://simplon.co/',
                'main_img_url' => 'images/partners/simplon.png'
            ],
            (object)[
                'id' => 20,
                'name' => 'Terawe',
                'logo_url' => 'images/partners/terawe1.png',
                'categories' => ['Partners'],
                 'description' => 'Terawe Technologies Limited is a subsidiary of Terawe Corporation, a Global IT Solutions and Services company. Terawe are leaders in cloud technologies including Data, AI, Predictive Analytics, Machine Learning, Fog and Edge Computing, and IoT. The company also has extensive expertise in new and emergent technologies including Cognitive Services and Mixed Reality.
                <br>
                With over 30 years experience in education and a global education customer base, Terawe works with ministries of education, industry leaders and international organizations such as the UNESCO Institute for Information Technologies in Education to design and implement solutions to support educators, system leaders and students, and to improve learning outcomes. From admission to graduation and on to research, from curriculum design to assessment, our solutions enable students and institutions to realize their potential.',
                'link_url' => 'https://www.terawe.com',
                'main_img_url' => 'images/partners/terawe.png'
            ],
            (object)[
                'id' => 21,
                'name' => 'DIGITALEUROPE',
                'logo_url' => 'images/partners/DIGITALEUROPE.png',
                'categories' => ['Partners'],
                 'description' => 'DIGITALEUROPE, the leading trade association representing digitally transforming industries in Europe, stands for a regulatory environment that enables European businesses and citizens to prosper from digital technologies. With its members, DIGITALEUROPE shapes industrial policy positions on all relevant legislative matters and contributes to the development and implementation of relevant EU policies.
                <br>
                Its members of over 45,000 businesses, operating and investing in Europe, include 106 corporations which are global leaders in their own field, and 41 national trade associations.
                <br>
                DIGITALEUROPE leads stakeholder engagement and community building as well as supporting communications, events management, and providing support to National Hubs and local partners. ',
                'link_url' => 'https://www.digitaleurope.org',
                'main_img_url' => 'images/partners/DIGITALEUROPE.png'
            ],
            (object)[
                'id' => 22,
                'name' => 'GENÇ BAŞARI EĞİTİM VAKFI - JA TÜRKİYE',
                'logo_url' => 'images/partners/turkey.png',
                'categories' => ['Partners'],
                 'description' => 'Genç Başarı Education Foundation directs its efforts to raise young people and children with an entrepreneurial mindset and builds a bridge between the business world and education by ensuring the active participation of business professionals and entrepreneurs in the programs. Contributing to the training of successful young people who will play an active role in social and economic life. Genç Başarı aims to develop entrepreneurship awareness and behavioral structure in young people and children by experiencing them and also to have young people and children adopt entrepreneurship as a career alternative.',
                'link_url' => 'https://gencbasari.org/',
                'main_img_url' => 'images/partners/turkey.png'
            ],
            (object)[
                'id' => 23,
                'name' => 'LINKS Foundation',
                'logo_url' => 'images/partners/links.png',
                'categories' => ['Partners'],
                 'description' => 'Fondazione LINKS – Leading Innovation & Knowledge for Society (Italy) is a non-profit private foundation, established in 2016 by the Polytechnic University of Turin and the Compagnia di San Paolo Foundation. Operating at both national and international levels, LINKS promotes research, development, and innovation in the field of ICT technologies. The EdTech Unit within LINKS is specifically tasked with advancing technological, cultural, and social innovation in the educational ecosystem. Its core focus lies in exploring the synergies between emerging technologies and education, with the objective of fostering technological progress by promoting computational thinking, coding, critical thinking, and creative learning.
                <br>
                As part of EU Code Week, LINKS acts as the national coordinator for Italy, with the mission of supporting local communities and contributing to the co-creation of innovative methodologies and resources aimed at enhancing coding and digital skills within the educational landscape. Through its activities, LINKS supports the wider European agenda for digital education and skills development.',
                'link_url' => 'https://linksfoundation.com/en/',
                'main_img_url' => 'images/partners/links.png'
            ],
            (object)[
                'id' => 24,
                'name' => 'European Parents Association',
                'logo_url' => 'images/partners/epa.jpg',
                'categories' => ['Partners'],
                 'description' => 'FEPA has been the only EU-level organisation representing parents as a stakeholder group in education since its foundation in 1985. Through our 30+ member organisations we have a nearly full coverage of Europe as we have working contact with almost all EU-member states, while we have members from some non-EU countries (e.g. Serbia) as well.
                The main objectives of EPA, reaching out to 100 million European parents:
                - to promote and advocate for the active involvement of parents as primary educators at all stages of the education of their children,
                - to support parents\' associations and individual parents for stakeholder involvement in different European countries by offering opportunities for training, cooperation and exchanging information,
                - to support the highest possible quality of education for all children in Europe especially by active involvement in EU-level policy development and assessment
                - to disseminate relevant European information among its members.
                <br>
                EPA has started discussions with its members regarding digitalization and in particular the internet use back in 2014 when it issued its first position paper on the topic calling upon parents to engage in shaping the digital development rather than refusing to acknowledge its future importance. 
                Starting from this position paper EPA engaged in a first European project called “Parentnets” (http://www.parentnets.com) together with cooperation partners from Spain, Ireland, Portugal and Romania to establish an online game, video clips and an interactive handbook to make parents aware of six major concerns, cyberbullying, online gaming and phishing among others and offer advice on how to deal with these issues.
                In 2020 the annual theme of the organization was “Parenting in the Digital Age” adopted at a GA back in 2017 in the framework of a three-year working plan. It couldn’t have been more timely given the impact of the health crisis on the educational sector specifically the closure of school buildings worldwide and the shift to remote teaching and learning, in many cases online. During this period the importance of media and digital literacy became evident to everyone and surveys and studies have been conducted in many countries to find out how to best support learners (pupils and students) but also teachers and trainers as well as parents and families in the common endeavor to keep the learning and evaluation processes going. 
                In this situation EPA’s involvement in a specific project “Media Literacy for Parents” is of particular interest (www.medialiteracy4parents.eu). The project aimed at providing trainings for parents of school age children in this field as well as offering a WebApp and a Parents’ Guide. The partners in the project were from Bulgaria, Cyprus, Greece, Italy and Poland and the material can be found on the website.
                <br>
                EPA is currently involved in two more projects in this field: HERMMES – Holistic Education and Media Maturity in Educational Settings – developing a framework curriculum for media education, training materials for educators and parents and school policy guidelines (https://hermmes.eu/) and e-Safety and e-Creativity, a network for teachers, parents and guardians (https://e-safety-network.eu/) that specifically deals with combatting cyberbullying and online-addiction so the CodeWeek falls very well in line with these initiatives, trying to enhance digital skills and fostering safe use as well as promoting non screen activities.',
                'link_url' => 'https://europarents.eu/',
                'main_img_url' => 'images/partners/epa.jpg'
            ],
             (object)[
                'id' => 25,
                'name' => 'Junior Achievement Bulgaria ',
                'logo_url' => 'images/partners/JABulgaria1.png',
                'categories' => ['Partners'],
                'description' => 'Junior Achievement (JA) Bulgaria is proud to serve as the national hub for the European Code Week, an initiative that empowers young people to explore and develop their digital skills through coding, programming, and technology. As part of the Code4Europe consortium, JA Bulgaria is committed to fostering digital literacy, innovation, and creativity across the country. With a strong focus on youth education and entrepreneurship, for more than 27 years JA Bulgaria has been providing innovative education experiences and programs to youth around the whole country. As a national hub for Bulgaria, JA Bulgaria will coordinate and support a wide range of coding events, workshops, and activities, ensuring that participants of all ages have the opportunity to experience the power of coding and computational thinking. By collaborating with schools, educators, and partners, JA Bulgaria aims to inspire the next generation of digital creators, contributing through practise-based solutions to a vibrant, tech-savvy future for Europe.',
                'link_url' => 'https://jabulgaria.org/',
                'main_img_url' => 'images/partners/JABulgaria1.png'
            ],
             (object)[
                'id' => 26,
                'name' => 'I. osnovna škola Čakovec',
                'logo_url' => 'images/partners/IOSCK.png',
                'categories' => ['Partners'],
                'description' => 'I. osnovna škola Čakovec (Croatia) is the oldest and largest primary school in the region, dedicated to an individualized approach to students and the development of modern skills. It places special emphasis on teamwork, collaboration, problem-solving, and programming. The school provides its students with an education that prepares them for the challenges of the 21st century.',
                'link_url' => 'https://prvaoscakovec.eu',
                'main_img_url' => 'images/partners/IOSCK.png'
            ],
            (object)[
                'id' => 27,
                'name' => 'Fundacja Koalicji na Rzecz Polskich Innowacji',
                'logo_url' => 'images/partners/logo_kpi.jpg',
                'categories' => ['Partners'],
                'description' => 'Fundacja Koalicji na Rzecz Polskich Innowacji (Coalition for Polish Innovation) has been operating since 2015 as a platform integrating all participants of the innovation ecosystem, such as businesses, research institutions, authorities, and public administration, creating a strong network of cooperation aimed at facilitating the development of the R&D sector and increasing the level of innovation in the Polish economy. The Coalition also supports smart legislation and co-creates solutions that foster innovation and entrepreneurial growth, as well as encourages investment in research and development. Over the years, the Coalition has engaged more than a hundred active, pro-innovation entities, participated in advisory bodies of Ministries, and defined and implemented solutions that promote the development of the R&D sector. As the coordinator of the European Digital Innovation Hub WAMA EDIH, the Coalition supports the digital transformation of businesses and the implementation of innovative digital technologies. Currently, the Coalition serves as the Polish hub for the Code4Europe project, assisting the community of teachers and educators and supporting digital education.',
                'link_url' => 'https://koalicjadlainnowacji.pl',
                'main_img_url' => 'images/partners/logo_kpi.jpg'
            ],
            (object)[
                'id' => 28,
                'name' => 'WIDE ANDCO',
                'logo_url' => 'images/partners/WIDE_CO.png',
                'categories' => ['Partners'],
                'description' => 'WIDE asbl was founded as a non-profit in 2014 and, after over a decade of active work, evolved into the social enterprise WIDE ANDCO (S.I.S) in 2021. Its mission is to create a meaningful social impact in the field of gender equality in Luxembourg. WIDE ANDCO is committed to fostering networking, skill development, and building self-confidence for individuals of all genders, ages, and cultural or professional backgrounds. It plays an active role in various initiatives, particularly those that emphasise the importance of women\'s inclusion in the digital world, with a focus on the ICT and digital sectors.
                <br>
                In addition, WIDE ANDCO offers a wide range of activities, including events, workshops, conferences, and training sessions, all centred on digital education, skills development, employability, and entrepreneurship. Its participation in multiple Erasmus+ projects, both as coordinators and partners, highlights its dedication to empowering youth and fostering development on national and international levels.
                 <br>
                As the leader of WP5 Girls in Digital, WIDE and its team will contribute by shaping ideas and offering expertise on the challenges of implementing programmes for girls and women. The organisation will also focus on forming partnerships with public schools and governmental bodies through online campaigns, event organisation, webinars, awareness raising, and creating synergies with other initiatives. Furthermore, WIDE ANDCO will serve as the national hub for Luxembourg.',
                'link_url' => 'https://wide.lu/',
                'main_img_url' => 'images/partners/WIDE_CO.png'
            ],
            (object)[
                'id' => 29,
                'logo_url' => 'images/partners/africa.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 30,
                'logo_url' => 'images/partners/apple.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 31,
                'logo_url' => 'images/partners/amazon.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 32,
                'logo_url' => 'images/partners/code-org.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 33,
                'logo_url' => 'images/partners/colabora_coderdojo.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 34,
                'logo_url' => 'images/partners/digital-skills.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 35,
                'logo_url' => 'images/partners/emma.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 36,
                'logo_url' => 'images/partners/colabora_eun.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 37,
                'logo_url' => 'images/partners/google.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 38,
                'logo_url' => 'images/partners/lego_sponosorboard.jpg',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 39,
                'logo_url' => 'images/partners/makeblock.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 40,
                'logo_url' => 'images/partners/meet_and_code_logo.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 41,
                'logo_url' => 'images/partners/Micro-bit.jpg',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 42,
                'logo_url' => 'images/partners/open_roberta.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 43,
                'logo_url' => 'images/partners/colabora_PublicLibraries2030.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 44,
                'logo_url' => 'images/partners/scratch.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 45,
                'logo_url' => 'images/partners/urbinocarlo.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 46,
                'name' => __('partners.ja_spain_name'),
                'logo_url' => 'images/partners/jaspain.png',
                'categories' => ['Partners'],
                'description' => __('partners.ja_spain_description'),
                'link_url' => 'https://fundacionjaes.org/',
                'main_img_url' => 'images/partners/jaspain.png'
            ],
            (object)[
                'id' => 47,
                'name' => 'Avanade',
                'logo_url' => 'images/partners/avanade.png',
                'categories' => ['Partners'],
                'description' => 'Avanade is the world’s leading expert on Microsoft. Trusted by over 5,000 clients worldwide, we deliver AI-driven solutions that unlock the full potential of people and technology, optimize operations, foster innovation and drive growth.
                <br>
                As Microsoft’s Global SI Partner we combine global scale with local expertise in AI, cloud, data analytics, cybersecurity, and ERP to design solutions that prioritize people and drive meaningful impact. We champion diversity, inclusion, and sustainability, ensuring our work benefits society and business.
                 <br>
                Avanade have been in partnership with JA Worldwide and JA Europe as our global charity partnership for many years and are leading on Code4Europe WP4 Careers in Digital.',
                'link_url' => 'https://www.avanade.com/en-gb',
                'main_img_url' => 'images/partners/avanade.png'
            ],
            (object)[
                'id' => 48,
                'name' => 'EU-ASE',
                'logo_url' => 'images/partners/eu-ase.png',
                'categories' => ['Partners'],
                'description' => 'The European Alliance to Save Energy (EU-ASE) is a cross-sectoral, business led organisation which aims to ensure that the voice of energy efficiency is heard across Europe.
                <br/>
                EU-ASE members have operations across all the 27 Member States of the European Union, employ over 340.000 people in the EU and have an aggregated annual turnover of €115 billion.',
                'link_url' => 'https://euase.net/',
                'main_img_url' => 'images/partners/eu-ase.png'
            ],
             (object)[
                'id' => 49,
                'logo_url' => 'images/partners/philpott.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 50,
                'logo_url' => 'images/partners/All4youth_logo.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 51,
                'logo_url' => 'images/partners/coding_pirates.png',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 52,
                'logo_url' => 'images/partners/hp.jpg',
                'categories' => ['Sponsor'],
            ],
            (object)[
                'id' => 53,
                'logo_url' => 'images/partners/KC.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 54,
                'logo_url' => 'images/partners/nvidia.png',
                'categories' => ['Sponsor'],
            ],
             (object)[
                'id' => 55,
                'logo_url' => 'images/partners/tech-shecan.png',
                'categories' => ['Sponsor'],
            ],
        ]);
    }

public function render()
    {
        if ($this->filter === 'Council Presidency') {
            // Council Presidency content
            $councilContent = collect([
                (object)[
                    'name' => 'Annie Bergh – Sweden',
                    'title' => 'Council President',
                    'description' => 'Building bridges between classrooms and code
                        Annie Bergh began her educational journey in 1991 as a preschool teacher and later taught students aged 6 to 13. But since 2014, she’s taken on a broader mission: supporting all 85 schools in Malmö municipality as a driving force behind internationalisation, coding, and robotics. Annie is the proud caretaker of 17 NAO robots—yes, actual humanoid robots—which teachers across Malmö can borrow to bring coding and AI to life in their classrooms. Through hands-on workshops and energetic TeachMeets, she inspires educators from preschool to upper secondary to integrate technology into their teaching in meaningful and creative ways. 
                        Until recently, Annie also led the regional First Lego League (FLL) initiative for eight years, helping young minds explore science and innovation through teamwork and robotics. While she no longer teaches in a classroom, she’s still very much an educator—just one with a few more robots and a lot more cables.
                        My motto in the presidency is: Innovate, educate, collaborate: Together, I know that we can build a brighter, more collaborative future through the power of code.',
                    'image' => 'images/council/AnnieBergh.jpg',
                ],
            ]);

            // Render the Council Presidency content view
            return view('livewire.council-content-component', [
                'councilMembers' => $councilContent
            ]);
        }

        // Handle "EU Code Week Supporters" (Sponsors)
        if ($this->filter === 'EU Code Week Supporters') {
            $partners = $this->getAllPartners()->filter(function ($partner) {
                return in_array('Sponsor', $partner->categories);
            })->paginate(16);
        } else {
            // Default handling for Partners
            $partners = $this->getAllPartners()->filter(function ($partner) {
                return in_array($this->filter, $partner->categories);
            })->paginate(16);
        }

        return view('livewire.partner-content-component', [
            'partners' => $partners,
            'selectedPartner' => $this->selectedPartner,
        ]);
    }

}
