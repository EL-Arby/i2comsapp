<?php

namespace Database\Seeders;

use App\Models\ConferenceMilestone;
use App\Models\ConferenceTopic;
use App\Models\NewsItem;
use App\Models\SiteSetting;
use App\Models\Speaker;
use Illuminate\Database\Seeder;

class ConferenceContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'hero_badge' => '14–16 December 2026 • Nouakchott',
            'hero_display_mode' => 'single',
            'hero_single_image' => 'maurit_2024',
            // 'hero_lead' => 'A premier platform for researchers, academics and professionals to discuss advances in AI, digital transformation, ethics, and real-world applications in developing countries.',
            'info_dates' => '14–16 Dec 2026',
            'info_location' => 'Nouakchott University Campus, Nouakchott.',
            'about_title' => 'Scope',
            'about_lead' => 'Artificial Intelligence (AI) technologies offer transformative potential for developing countries, presenting innovative solutions to longstanding challenges across healthcare, education, economic growth, infrastructure, and sustainable resource management.
By adopting AI-driven approaches, these countries have the opportunity to bypass traditional development stages, accelerating socio-economic progress and significantly enhancing the quality of life.
In alignment with this vision, the International Conference series on Artificial Intelligence and its Applications in the Age of Digital Transformation "I2COMSAPP" serves as an essential platform that convenes global experts, researchers, practitioners, policymakers, and innovators.
The conference promotes the exploration of cutting-edge advancements, identifies key challenges, and showcases practical implementations of AI and Machine Learning (ML) technologies.
Furthermore, it facilitates knowledge exchange, collaboration, and networking among stakeholders committed to responsible and impactful AI innovations that advance societal and industrial progress.
Building upon the academic excellence, substantial social impact, and successful publication outcomes in Springer’s Scopus-indexed Lecture Notes in Networks and Systems (LNNS) series achieved by our inaugural conference, the 3rd edition of I2COMSAPP invites international contributions to delve deeper into recent advances, practical applications, and future trends of AI and ML.
Special emphasis will be placed on the transformative potential of these technologies in fostering sustainable development and improving socio-economic outcomes in developing regions.',
            'vision_quote' => 'Empowering the next generation of researchers to solve local problems with global technologies.',
            'timeline_title' => 'Submission Timeline',
            'timeline_subtitle' => 'Keep track of these critical milestones to ensure your research is part of I2COMSAPP 2026.',
            'cta_title' => 'Ready to shape the future of AI in Africa?',
            'cta_lead' => 'Download the template and submit your research today. Be part of the conversation that matters.',
        ] as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $news = [
            // 'Deadline for abstract submission extended to May 30th',
            // 'Keynote speakers confirmed for the Opening Ceremony',
            // 'Early Bird Registration now open!',
        ];
        foreach ($news as $i => $title) {
            NewsItem::query()->updateOrCreate(
                ['title' => $title],
                ['sort_order' => $i, 'is_active' => true]
            );
        }

       $speakers = [
    [],
    [],
];

foreach ($speakers as $i => $row) {

    if(empty($row['name'])) {
        continue;
    }

    Speaker::query()->updateOrCreate(
        ['name' => $row['name']],
        array_merge($row, [
            'sort_order' => $i,
            'is_published' => true
        ])
    );

}

        $milestones = [
            [
                'title' => 'Paper Submission',
                'milestone_date' => '2026-07-15',
                'description' => 'Deadline for submitting full research papers for peer review.',
                'accent' => 'tertiary',
            ],
            [
                'title' => 'Acceptance Notification',
                'milestone_date' => '2026-09-30',
                'description' => 'Authors will receive decisions from the international program committee.',
                'accent' => 'secondary',
            ],
            [
                'title' => 'Camera-Ready Paper',
                'milestone_date' => '2026-10-15',
                'description' => 'Final versions of accepted papers must be submitted by this date.',
                'accent' => 'tertiary',
            ],
            [
                'title' => 'Conference Main Dates',
                'milestone_date' => '2026-12-14',
                'description' => 'Join us in Nouakchott for the flagship event and keynote sessions.',
                'accent' => 'highlight',
            ],
        ];
        foreach ($milestones as $i => $row) {
            ConferenceMilestone::query()->updateOrCreate(
                ['title' => $row['title']],
                array_merge($row, ['sort_order' => $i, 'is_published' => true])
            );
        }


$topics = [

    [
        'title' => 'AI for Digital Economy and Finance:',
        'description' => "• Algorithmic Trading\n• Financial Forecasting\n• Customer Behavior Analysis\n• Fraud Detection and Prevention\n• Personalized Marketing and Recommendation Systems",
        'icon_name' => 'account_balance',
        'featured' => true,
        'sort_order' => 0,
    ],

    [
        'title' => 'AI for Biometrics and Cybersecurity:',
        'description' => "• Facial Recognition\n• Fingerprint and Iris Recognition\n• Voice Recognition\n• Biometric Security Systems",
        'icon_name' => 'fingerprint',
        'featured' => false,
        'sort_order' => 1,
    ],

    [
        'title' => 'AI for Healthcare and Well-being:',
        'description' => "• Disease Diagnosis and Predictive Modeling\n• Remote Patient Monitoring\n• Telemedicine\n• Electronic Health Records Analysis\n• Drug Discovery and Development",
        'icon_name' => 'medical_services',
        'featured' => false,
        'sort_order' => 2,
    ],

    [
        'title' => 'AI for Education and Learning:',
        'description' => "• Personalized Learning Paths\n• Online and Remote Learning Environments\n• Domain Modeling and Knowledge Extraction\n• Intelligent Tutoring Systems\n• Automated Grading and Assessment",
        'icon_name' => 'school',
        'featured' => false,
        'sort_order' => 3,
    ],

    [
        'title' => 'AI for Autonomous Systems and Robotics:',
        'description' => "• Autonomous Vehicles\n• Robotics Applications\n• Drone Applications\n• Smart Cities and Infrastructure\n• Disaster Management\n• Industrial Automation and Manufacturing",
        'icon_name' => 'precision_manufacturing',
        'featured' => false,
        'sort_order' => 4,
    ],

    [
        'title' => 'AI for Energy and Resource Management:',
        'description' => "• Predictive Maintenance for Equipment\n• Reservoir Modeling and Optimization\n• Environmental Monitoring and Compliance\n• Supply Chain Management",
        'icon_name' => 'oil_barrel',
        'featured' => false,
        'sort_order' => 5,
    ],

    [
        'title' => 'AI for Agriculture and Food Security:',
        'description' => "• Precision Agriculture\n• Crop Disease Detection and Management\n• Agricultural Robotics and Automation\n• Soil Health Analysis",
        'icon_name' => 'agriculture',
        'featured' => false,
        'sort_order' => 6,
    ],

    [
        'title' => 'AI for Culture and Accessibility:',
        'description' => "• Assistive Technologies for the Visually Impaired\n• Speech Recognition and Augmented Communication\n• Mobility Aids and Navigation Systems\n• Cognitive Support for Neurodiverse Individuals",
        'icon_name' => 'accessible',
        'featured' => false,
        'sort_order' => 7,
    ],

    [
        'title' => 'Generative AI and Creative Technologies:',
        'description' => "• Image Generation and Style Transfer\n• Text Generation and Natural Language Generation\n• Poetry Generation\n• Video Synthesis",
        'icon_name' => 'model_training',
        'featured' => false,
        'sort_order' => 8,
    ],

    [
        'title' => 'AI for Networking, Cloud, and Emerging Tech:',
        'description' => "• AI for 5G/6G\n• AI for Cloud/Edge/Fog Computing\n• AI and Networking",
        'icon_name' => 'cloud',
        'featured' => false,
        'sort_order' => 9,
    ],

    [
        'title' => 'Other Relevant Topics in AI:',
        'description' => "",
        'icon_name' => 'psychology',
        'featured' => false,
        'sort_order' => 10,
    ],

];

$topics = [
    [
        'title' => 'AI for Digital Economy and Finance:',
        'description' => "• Algorithmic Trading and Financial Forecasting\n• Customer Behavior Analysis\n• Fraud Detection and Prevention\n• Personalized Marketing and Recommendation Systems\n• Etc",
        'icon_name' => 'account_balance',
        'featured' => true,
        'sort_order' => 0,
    ],
    [
        'title' => 'AI for Biometrics and Cybersecurity:',
        'description' => "• Facial Recognition\n• Fingerprint and Iris Recognition\n• Voice and Speech Recognition\n• Biometric Security Systems\n• Etc",
        'icon_name' => 'fingerprint',
        'featured' => false,
        'sort_order' => 1,
    ],
    [
        'title' => 'AI for Healthcare and Well-being:',
        'description' => "• Disease Diagnosis and Predictive Modeling\n• Remote Patient Monitoring\n• Remote Diagnosis and Telemedicine\n• Electronic Health Records Analysis\n• Drug Discovery and Development\n• Etc",
        'icon_name' => 'medical_services',
        'featured' => false,
        'sort_order' => 2,
    ],
    [
        'title' => 'AI for Education and Learning:',
        'description' => "• Personalized Learning Paths\n• Online and Remote Learningenvironments\n• Domain modeling and knowledge extraction\n• Intelligent Tutoring Systems\n• Automated Grading and Assessment\n• Etc",
        'icon_name' => 'school',
        'featured' => false,
        'sort_order' => 3,
    ],
    [
        'title' => 'AI for Autonomous Systems and Robotics:',
        'description' => "• Autonomous Vehicles\n• Robotics and Drone Applications\n• Smart Cities and Infrastructure\n• Disaster Management\n• Industrial Automation and Manufacturing\n• Etc",
        'icon_name' => 'precision_manufacturing',
        'featured' => false,
        'sort_order' => 4,
    ],
    [
        'title' => 'AI for Energy and Resource Management:',
        'description' => "• Predictive Maintenance for Equipment\n• Reservoir Modeling and Optimization\n• Environmental Monitoring and Compliance\n• Supply Chain Management\n• Etc",
        'icon_name' => 'oil_barrel',
        'featured' => false,
        'sort_order' => 5,
    ],
    [
        'title' => 'AI for Agriculture and Food Security:',
        'description' => "• Precision Agriculture\n• Crop Disease Detection and Management\n• Agricultural Robotics and Automation\n• Soil Health Analysis\n• Etc",
        'icon_name' => 'agriculture',
        'featured' => false,
        'sort_order' => 6,
    ],
    [
        'title' => 'AI for Culture and Accessibility:',
        'description' => "• Assistive Technologies for the Visually Impaired\n• Speech Recognition and Augmented Communication\n• Mobility Aids and Navigation Systems\n• Cognitive Support for Neurodiverse Individuals\n• Etc",
        'icon_name' => 'accessible',
        'featured' => false,
        'sort_order' => 7,
    ],
    [
        'title' => 'Generative AI and Creative Technologies:',
        'description' => "• Image Generation and Style Transfer\n• Text Generation and Natural Language Generation\n• Poetry Generation\n• Video Synthesis\n• Etc",
        'icon_name' => 'model_training',
        'featured' => false,
        'sort_order' => 8,
    ],
    [
        'title' => 'AI for Networking, Cloud, and Emerging Tech:',
        'description' => "• AI for 5G/6G\n• AI for Cloud/Edge/Fog computing\n• AI and Networking\n• Etc",
        'icon_name' => 'cloud',
        'featured' => false,
        'sort_order' => 9,
    ],
    [
        'title' => 'Other Relevant Topics in AI:',
        'description' => '',
        'icon_name' => 'psychology',
        'featured' => false,
        'sort_order' => 10,
    ],
];
        foreach ($topics as $topic) {

    \App\Models\ConferenceTopic::updateOrCreate(
        ['title' => $topic['title']],
        $topic
    );

}

    }
}
