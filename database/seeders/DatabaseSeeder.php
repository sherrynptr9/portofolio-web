<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Education;
use App\Models\SkillGroup;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Organization;
use App\Models\Certification;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Sherrynita',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Profile
        Profile::truncate();
        Profile::create([
            'edition_tag' => 'FOLIO INDEX • VOL. IV',
            'section_number' => '01 / Curated Biography',
            'badge_role' => 'UI/UX, Website, & Data Analyst',
            'name' => 'Sherrynita Marsya Putri Setiawan, S.Kom',
            'about_text' => 'I am a 2026 graduate of the Information Systems program at Gunadarma University with a GPA of 3.78, specializing in Web UI/UX Design, Web Development (PHP, Laravel, React), and Data Analysis. Through my experience as a Web Developer intern at ION Network, I have redesigned user interfaces (UI) for various company platforms and implemented them into functional websites using a variety of frameworks. I hold a certification from BNSP under the Data Analyst scheme, having earned the "competent" designation. My involvement in the Student Executive Board (BEM) and Karang Taruna has also helped me develop leadership and teamwork skills. With my combined experience in web design and development, I am committed to creating digital solutions that are aesthetically pleasing, functional, and data-driven.',
            'photo' => 'images/sherrynita_profile.jpg',
            'cv_file' => '#',
            'phone' => '+62 812-3456-7890',
            'phone_note' => 'Available via WhatsApp & Call',
            'email' => 'sherrynitamarsya@gmail.com',
            'email_note' => 'Send direct message',
            'location' => 'Kec. Beji, Kota Depok',
            'location_note' => 'Jawa Barat, Indonesia (Open to WFH / Onsite)',
            'linkedin' => 'linkedin.com/in/sherrynita',
            'linkedin_url' => 'https://linkedin.com/in/sherrynita',
            'github' => 'github.com/sherrynita',
            'github_url' => 'https://github.com/sherrynita',
            'response_time' => '< 24 Hours',
            'response_note' => 'Actively accepting new projects',
            'footer_bio' => 'I am an Information Systems graduate leveraging expertise in web development, UI/UX, and data analysis to create aesthetic, data-driven digital solutions.',
            'dispatch_social' => 'ReadCV • GitHub • LinkedIn • Substack',
            'office_note' => 'Office: studio@creativecraft.archive',
        ]);

        // 3. Education
        Education::truncate();
        Education::create([
            'degree' => "Computer Science Bachelor's Degree in Information Systems",
            'faculty_university' => 'FACULTY OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY • GUNADARMA UNIVERSITY',
            'period' => '2022 – 2026',
            'courses' => "Algorithms and Programming, Object-Oriented Programming, Pemrograman Berbasis Web, Database System, System Testing and Implementation, Human-Computer Interaction, Information Systems Analysis and Design, Introduction to Data Science, Data Mining Concepts, Big Data Computing, Data Modeling and Visualization, Statistics, Data Structures and Organization",
            'award_title' => "Recipient of the Academic Excellence Chancellor's Medal for Undergraduate HCI Capstone Thesis.",
            'order' => 1
        ]);

        // 4. Skill Groups & Skills
        SkillGroup::truncate();
        Skill::truncate();

        // Group 1: UI/UX Craft
        SkillGroup::create([
            'group_key' => 'ui_ux',
            'title' => 'UI/UX Craft',
            'subtitle' => 'Spatial balance, design token pipelines, and user research rigor.',
            'icon' => 'fa-bezier-curve',
            'icon_color' => 'green',
            'confidence_score' => 'Confidence 95.5%',
            'order' => 1,
        ]);
        $uiuxSkills = [
            ['name' => 'Figma', 'percentage' => 98],
            ['name' => 'Sketch', 'percentage' => 90],
            ['name' => 'Canva', 'percentage' => 100],
            ['name' => 'User Research & Usability Testing', 'percentage' => 95],
            ['name' => 'Information Architecture', 'percentage' => 95],
            ['name' => 'Visual & Interaction Design', 'percentage' => 95],
        ];
        foreach ($uiuxSkills as $i => $s) {
            Skill::create([
                'group_key' => 'ui_ux',
                'subgroup' => null,
                'name' => $s['name'],
                'percentage' => $s['percentage'],
                'order' => $i + 1,
            ]);
        }

        // Group 2: Full Stack Web Developer
        SkillGroup::create([
            'group_key' => 'fullstack',
            'title' => 'Full Stack Web Developer',
            'subtitle' => 'End-to-end web engineering, scalable architectures, and robust API integrations.',
            'icon' => 'fa-code',
            'icon_color' => 'red',
            'confidence_score' => 'Confidence 91.25%',
            'order' => 2,
        ]);
        $feSkills = [
            ['name' => 'HTML', 'percentage' => 90],
            ['name' => 'CSS', 'percentage' => 95],
            ['name' => 'JavaScript', 'percentage' => 85],
            ['name' => 'React.js', 'percentage' => 90],
            ['name' => 'Bootstrap', 'percentage' => 95],
            ['name' => 'Tailwind CSS', 'percentage' => 95],
        ];
        foreach ($feSkills as $i => $s) {
            Skill::create([
                'group_key' => 'fullstack',
                'subgroup' => 'Frontend Development',
                'name' => $s['name'],
                'percentage' => $s['percentage'],
                'order' => $i + 1,
            ]);
        }

        $beSkills = [
            ['name' => 'PHP', 'percentage' => 90],
            ['name' => 'Laravel', 'percentage' => 90],
            ['name' => 'Java', 'percentage' => 85],
            ['name' => 'MySQL', 'percentage' => 95],
            ['name' => 'API', 'percentage' => 90],
            ['name' => 'GitHub', 'percentage' => 95],
        ];
        foreach ($beSkills as $i => $s) {
            Skill::create([
                'group_key' => 'fullstack',
                'subgroup' => 'Backend Development',
                'name' => $s['name'],
                'percentage' => $s['percentage'],
                'order' => $i + 10,
            ]);
        }

        // Group 3: Data Analytics
        SkillGroup::create([
            'group_key' => 'data_analytics',
            'title' => 'Data Analytics',
            'subtitle' => 'Quantitative storytelling, predictive modeling, and business telemetry.',
            'icon' => 'fa-chart-simple',
            'icon_color' => 'orange',
            'confidence_score' => 'Confidence 88.125%',
            'order' => 3,
        ]);
        $dataSkills = [
            ['name' => 'SQL', 'percentage' => 95],
            ['name' => 'Python', 'percentage' => 95],
            ['name' => 'R', 'percentage' => 75],
            ['name' => 'Tableau', 'percentage' => 80],
            ['name' => 'Microsoft Power BI', 'percentage' => 95],
            ['name' => 'Google Looker Studio', 'percentage' => 85],
            ['name' => 'Statistics', 'percentage' => 85],
            ['name' => 'Data Cleaning & Preparation', 'percentage' => 95],
        ];
        foreach ($dataSkills as $i => $s) {
            Skill::create([
                'group_key' => 'data_analytics',
                'subgroup' => null,
                'name' => $s['name'],
                'percentage' => $s['percentage'],
                'order' => $i + 1,
            ]);
        }

        // 5. Experiences
        Experience::truncate();
        Experience::create([
            'period' => 'November 2025 – Februari 2026',
            'position' => 'Web Developer Intern',
            'company' => 'ION Network',
            'tags' => 'UI Design, Web Development, Database Planning, System Localization, Form Security (CAPTCHA), Web Frameworks',
            'summary' => 'Collaborated throughout the website development cycle, from user interface (UI) design and database architecture planning to the implementation of technical and functional features for various company projects.',
            'contributions_title' => null,
            'contributions' => "User Interface (UI/UX) Design: Led the redesign of the visual interface for the company’s four main web portals: Surya Citra Technology, ProDC, Alcen.id, and ION Enterprise.\nFront-End Development: Translated design mockups into functional, responsive websites for the Surya Citra Technology and Alcen.id projects.\nOptimization & Security: Integrated CAPTCHA protection into the website’s form architecture to effectively minimize spam activity.\nSystem Localization: Developed and implemented multilingual features (Indonesian and English) to improve the website’s accessibility and audience reach.\nArchitecture & Framework: Actively collaborated with the development team to plan the system’s database structure and build web components using a framework.",
            'metric_1_val' => '4 Portals',
            'metric_1_desc' => "Redesign of core enterprise portals: Surya Citra, ProDC, Alcen.id, ION",
            'metric_2_val' => '2 Languages',
            'metric_2_desc' => 'Bilingual system localization (Indonesian & English) and CAPTCHA security',
            'order' => 1,
        ]);

        Experience::create([
            'period' => 'June 2025',
            'position' => 'Moderator',
            'company' => 'Business Matching for Financing 2025 Bank Indonesia',
            'tags' => 'Session Facilitation, Financial Reporting, Stakeholder Mediation, MSME (UMKM)',
            'summary' => null,
            'contributions_title' => 'KEY RESPONSIBILITIES & CONTRIBUTIONS:',
            'contributions' => "Session Facilitation: Directed and moderated strategic business-matching sessions connecting MSMEs (UMKM)/Cooperatives with key financial institutions.\nStakeholder Mediation: Served as the primary liaison bridging the communication between business owners and financial entities to explore concrete funding opportunities.\nReporting & Documentation: Synthesized complex discussion outcomes and accurately compiled official summary reports as mandated by Bank Indonesia.",
            'metric_1_val' => 'MSME / UMKM',
            'metric_1_desc' => 'Facilitated financing matches for regional cooperatives & MSMEs',
            'metric_2_val' => '100% Mandated',
            'metric_2_desc' => 'Official synthesis and summary reporting mandated by Bank Indonesia',
            'order' => 2,
        ]);

        // 6. Projects
        Project::truncate();
        $projects = [
            [
                'badge' => 'UI/UX & WEBSITE BUILD',
                'category_filter' => 'UI/UX Design, Website',
                'title' => 'Alcen.ID',
                'description' => 'Comprehensive patient consult portal, EHR synchronization, and biometric monitoring widgets designed across iOS, Android, and web responsive breakpoints.',
                'tags' => 'Figma, User Journeys, Tokens',
                'image' => 'images/project_alcen.png',
                'link' => '#',
                'order' => 1,
            ],
            [
                'badge' => 'UI/UX & WEBSITE BUILD',
                'category_filter' => 'UI/UX Design, Website',
                'title' => 'Surya Citra Technology',
                'description' => 'Ultra-fast storefront built with Next.js App Router, Tailwind CSS, Stripe Elements checkout, and instantaneous edge inventory catalog caching.',
                'tags' => 'Next.js 14, Tailwind, Stripe API',
                'image' => 'images/project_surya_citra.png',
                'link' => '#',
                'order' => 2,
            ],
            [
                'badge' => 'UI/UX',
                'category_filter' => 'UI/UX Design',
                'title' => 'ION Enterprise',
                'description' => 'Supervised classification model analyzing 250,000+ subscription accounts with an interactive Tableau executive board drill-down.',
                'tags' => 'Python, Scikit-Learn, Tableau',
                'image' => 'images/project_ion_enterprise.png',
                'link' => '#',
                'order' => 3,
            ],
            [
                'badge' => 'UI/UX',
                'category_filter' => 'UI/UX Design',
                'title' => 'ProDC',
                'description' => '450+ multi-brand atomic components, automated Style-Dictionary token exports, and WCAG 2.1 AAA color compliance standards.',
                'tags' => 'Figma Tokens, Zeroheight, Storybook',
                'image' => 'images/project_prodc.png',
                'link' => '#',
                'order' => 4,
            ],
            [
                'badge' => 'DATA ANALYST',
                'category_filter' => 'Data Analyst',
                'title' => 'Synthetix Developer Docs',
                'description' => 'Documentation engine featuring full-text Algolia search, live API playground consoles, and markdown MDX interactive components.',
                'tags' => 'MDX, React, Algolia',
                'image' => 'images/project_synthetix.png',
                'link' => '#',
                'order' => 5,
            ],
            [
                'badge' => 'DATA ANALYST',
                'category_filter' => 'Data Analyst',
                'title' => 'Global Supply Telemetry',
                'description' => 'Logistics bottleneck diagnosis across 14 European freight centers utilizing SQL window functions and automated Power BI alerts.',
                'tags' => 'PostgreSQL, Power BI, Pandas',
                'image' => 'images/project_global_supply.png',
                'link' => '#',
                'order' => 6,
            ],
        ];
        foreach ($projects as $p) {
            Project::create($p);
        }

        // 7. Organizations
        Organization::truncate();
        $orgs = [
            [
                'badge_role' => 'Leadership',
                'period' => '2021 – 2022',
                'position' => 'Head of Design & Tech Division',
                'organization' => 'Google Developer Student Clubs (GDSC)',
                'description' => 'Led a cohort of 35 student developers and designers. Organized 6 intensive design sprints and coordinated the annual Google Solution Challenge mentorship series.',
                'tangible_outcome' => '4 student projects reached the global Top 100 Solution Challenge semifinal bracket.',
                'link' => '#',
                'order' => 1,
            ],
            [
                'badge_role' => 'Governance',
                'period' => '2020 – 2021',
                'position' => 'Vice President',
                'organization' => 'University Information Systems Student Association',
                'description' => 'Managed academic symposiums, partnered with industry tech firms for internship placements, and oversaw a departmental student council budget of €25,000.',
                'tangible_outcome' => 'Increased active student association membership by 45% across three computing majors.',
                'link' => '#',
                'order' => 2,
            ],
            [
                'badge_role' => 'Mentorship',
                'period' => '2022 – Present',
                'position' => 'Mentor & Series Speaker',
                'organization' => 'Data Science & Design Community Series',
                'description' => 'Conducting monthly masterclasses on "Bridging UI Heuristics and Quantitative Analytics" for aspiring career switchers and junior designers.',
                'tangible_outcome' => 'Directly mentored 22 fellows into full-time junior UI/UX and BI analyst placements.',
                'link' => '#',
                'order' => 3,
            ],
        ];
        foreach ($orgs as $o) {
            Organization::create($o);
        }

        // 8. Certifications
        Certification::truncate();
        $certs = [
            [
                'issuer' => 'GOOGLE • COURSERA',
                'title' => 'Professional Data Analytics',
                'description' => 'In-depth statistical workflows, R language, spreadsheets, and SQL data cleaning capstone.',
                'issued_date' => 'Issued: Oct 2023',
                'badge_text' => 'Verified Active',
                'badge_type' => 'green',
                'logo' => 'images/cert_google.png',
                'link' => '#',
                'order' => 1,
            ],
            [
                'issuer' => 'INTERACTION DESIGN FOUNDATION (IXDF)',
                'title' => 'Certified Interaction Designer',
                'description' => 'Affordances, mental models, cognitive ergonomics, and mobile gestural interaction design.',
                'issued_date' => 'Issued: Mar 2023',
                'badge_text' => 'Top 1% Class',
                'badge_type' => 'yellow',
                'logo' => 'images/cert_ixdf.png',
                'link' => '#',
                'order' => 2,
            ],
            [
                'issuer' => 'AMAZON WEB SERVICES (AWS)',
                'title' => 'AWS Cloud Practitioner & Data Pipeline',
                'description' => 'Cloud architecture fundamentals, S3, Redshift analytics, and automated data ingestion.',
                'issued_date' => 'Issued: Jan 2022',
                'badge_text' => 'ID: #AWS-410972',
                'badge_type' => 'gray',
                'logo' => 'images/cert_aws.png',
                'link' => '#',
                'order' => 3,
            ],
        ];
        foreach ($certs as $c) {
            Certification::create($c);
        }

        // 9. Courses
        Course::truncate();
        $courses = [
            [
                'provider' => 'DeepLearning.AI',
                'hours' => '60 Hours',
                'title' => 'Advanced SQL & Data Warehousing',
                'description' => 'Window queries, snowflake schemas, star schemas, indexing strategies, and database query profiling for high-volume consumer apps.',
                'status' => 'Completed • Grade: 98%',
                'order' => 1,
            ],
            [
                'provider' => 'Frontend Masters',
                'hours' => '85 Hours',
                'title' => 'Full-Stack Modern Web Engineering',
                'description' => 'State machines, reactive streams, AST abstractions, browser rendering engines, and performance auditing for modern web applications.',
                'status' => 'Completed • Project Defense Passed',
                'order' => 2,
            ],
            [
                'provider' => 'DesignCode',
                'hours' => '45 Hours',
                'title' => 'Design Systems at Scale & Tokens',
                'description' => 'Multi-brand theming engines, W3C Design Tokens Community Group specifications, automated GitHub CI actions, and Figma plugins.',
                'status' => 'Completed • Capstone Shipped',
                'order' => 3,
            ],
            [
                'provider' => 'Wharton Online',
                'hours' => '50 Hours',
                'title' => 'Business Intelligence & Storytelling',
                'description' => 'Executive-level narrative structure, quantitative visualization ethics, cognitive load minimization in reports, and boardroom presentations.',
                'status' => 'Completed • Executive Badge',
                'order' => 4,
            ],
        ];
        foreach ($courses as $b) {
            Course::create($b);
        }
    }
}
