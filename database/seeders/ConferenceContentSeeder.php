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
            'hero_badge' => '23–25 December 2026 • Nouakchott',
            'hero_display_mode' => 'single',
            'hero_single_image' => 'maurit_2024',
            'hero_lead' => 'A premier platform for researchers, academics and professionals to discuss advances in AI, digital transformation, ethics, and real-world applications in developing countries.',
            'info_dates' => '23–25 Dec 2026',
            'info_location' => 'Convention Center, Nouakchott',
            'about_title' => 'Bridging the AI Divide',
            'about_lead' => 'I2COMSAPP 2026 addresses the transformative power of Artificial Intelligence specifically through the lens of developing nations.',
            'vision_body' => 'The conference provides a premier interdisciplinary platform for researchers, practitioners, and educators to present and discuss the most recent innovations, trends, and concerns as well as practical challenges encountered and solutions adopted in the fields of AI.',
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
            'Deadline for abstract submission extended to May 30th',
            'Keynote speakers confirmed for the Opening Ceremony',
            'Early Bird Registration now open!',
        ];
        foreach ($news as $i => $title) {
            NewsItem::query()->updateOrCreate(
                ['title' => $title],
                ['sort_order' => $i, 'is_active' => true]
            );
        }

        $speakers = [
            [
                'name' => 'Dr. Amadou Ba',
                'role_title' => 'Professor of Computer Science',
                'affiliation' => 'University of Nouakchott',
                'bio' => 'Specialist in NLP and African languages processing, focusing on bridge technologies for rural development.',
                'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAtOAcrpaAPbZHUDbfTRFmXFlYSHZ4mw8Mep0XxrcbOax9CO8pH0WVeOT5xAlHH3OUktILBufA0fHD-y6RkyQ-X4ikXm4qsut4wDNVugglaS-W4qHK4EZbqB-4LB6GKcEnUT3HTnpKQXJUFP12GUsAdONB73ZiOmBic_F16gXzsTNVYR_jit8rLds5PQ9WMVrS_gHqv5t7kEWFSOTg8mWiQQ8ADutflXNP6E8KZNPOyupCQWfrlEAlb02KHid6Gz522E7MxbZES89o',
            ],
            [
                'name' => 'Dr. Elena Petrova',
                'role_title' => 'Lead AI Researcher',
                'affiliation' => 'Global Tech Institute, London',
                'bio' => 'Pioneer in Ethical AI frameworks and algorithmic transparency in public sector decision-making.',
                'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD-8fqL4WoE1qaqlTsL4OkbMwtdehfrfO4CmXI2fh5exk9kmcx0MBzy5cBoiW_k4KKlI9My03xHyns32J8yEjH5iJZgA6xznKqkYCcsywV-ytCccmOSbm25qJ8VNB_Q9Wk-W-8Jej6bOmcS566wUir97DzFOwR8lxOpd6veqj4Fp2gM28BFCpGP9UzINMmTdmqWAYEUPnPOV8UjihJgQenTAQK1tU-FI7EBg568-1LUSsncJhALrNlJVS_B-8r_74_nT1iFXXcPuR8',
            ],
            [
                'name' => 'Prof. Marcus Chen',
                'role_title' => 'Chair of Cyber-Physical Systems',
                'affiliation' => 'MIT Research Labs',
                'bio' => 'Expert in autonomous robotics and AI-driven predictive maintenance for industrial infrastructures.',
                'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBREjwwflLFyY62vpQP4IUBWHpWMi51xkyRdGoLvdFSbgLZ5NQ2X3hOimTFZ5sA5iBXrQSNErxc3z7lMdkxIaDoEHTYWtVXPAW5CpZq_Cb4Dr_dSks6DJIMAaWGntLJ1j824_rnmTNyKTseKHJ_DwLdj4H65YogQv6s0aEK5XoWRwUxmJJ5y95Z-txeTp55a1yoQGCyUNnP4YLR_yDVRhVelEUubg1xsTwgG2D773xPN6_-T5Vbhh1-tuJWnPK_UmtcjfHNI4Yfh50',
            ],
            [
                'name' => 'Dr. Sarah Al-Farsi',
                'role_title' => 'Director of Health AI',
                'affiliation' => 'Medical Research Council',
                'bio' => 'Focuses on leveraging ML for disease outbreak prediction and personalized diagnostics in resource-limited settings.',
                'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB3Qid6ZuX_f7UUFgpPdmsnPLnwJAyudxZM_hmrDJ1GIJ9gdAq1A-odiz5XwFXy-AkU7yxwjre_CCt-u8qoa9jGA1gj4PEh9IJBJ1IAxvt6kH3lduRgeYQv-LV3EE-11YyFeWflUr3qtr1O_oT-2bxpkJVdBou_H_yfNjLrWPwncttZGIGntmjP6U18Gi327OiUlWnl1Ksfhl_2TwNV8xwxRIVSosi4R4UrAdsMgd-2Vr3hWiNOHk3m6d-ePtaJp_-FsbsnzllG4fg',
            ],
        ];
        foreach ($speakers as $i => $row) {
            Speaker::query()->updateOrCreate(
                ['name' => $row['name']],
                array_merge($row, ['sort_order' => $i, 'is_published' => true])
            );
        }

        $milestones = [
            [
                'title' => 'Paper Submission',
                'milestone_date' => '2026-06-15',
                'description' => 'Deadline for submitting full research papers for peer review.',
                'accent' => 'primary',
            ],
            [
                'title' => 'Acceptance Notification',
                'milestone_date' => '2026-08-20',
                'description' => 'Authors will receive decisions from the international program committee.',
                'accent' => 'secondary',
            ],
            [
                'title' => 'Camera-Ready Paper',
                'milestone_date' => '2026-10-10',
                'description' => 'Final versions of accepted papers must be submitted by this date.',
                'accent' => 'tertiary',
            ],
            [
                'title' => 'Conference Main Dates',
                'milestone_date' => '2026-12-23',
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
            ['title' => 'Digital Economy-Oriented AI', 'description' => 'Models for financial prediction, market analysis, and digital trade in emerging markets.', 'icon_name' => 'account_balance', 'featured' => true, 'sort_order' => 0],
            ['title' => 'AI for Biometrics', 'description' => 'Identity management and secure recognition systems.', 'icon_name' => 'face', 'featured' => false, 'sort_order' => 1],
            ['title' => 'AI/ML in Healthcare', 'description' => 'Predictive diagnostics and personalized patient care.', 'icon_name' => 'medical_services', 'featured' => false, 'sort_order' => 2],
            ['title' => 'AI in Education', 'description' => 'Adaptive learning platforms and classroom analytics.', 'icon_name' => 'school', 'featured' => false, 'sort_order' => 3],
            ['title' => 'Autonomous Systems', 'description' => 'Robotics, UAVs, and self-driving technologies.', 'icon_name' => 'precision_manufacturing', 'featured' => false, 'sort_order' => 4],
            ['title' => 'Oil & Gas / Mining', 'description' => 'Resource optimization and predictive maintenance in industrial sectors.', 'icon_name' => 'oil_barrel', 'featured' => false, 'sort_order' => 5],
            ['title' => 'Agriculture', 'description' => 'Precision farming and crop yield prediction.', 'icon_name' => 'agriculture', 'featured' => false, 'sort_order' => 6],
            ['title' => 'Disability Support', 'description' => 'Assistive AI for inclusivity and accessibility.', 'icon_name' => 'accessible', 'featured' => false, 'sort_order' => 7],
            ['title' => 'Generative AI', 'description' => 'Creative models and content generation ethics.', 'icon_name' => 'model_training', 'featured' => false, 'sort_order' => 8],
            ['title' => 'Cloud Computing', 'description' => 'Distributed AI architectures and network security.', 'icon_name' => 'cloud', 'featured' => false, 'sort_order' => 9],
        ];
        foreach ($topics as $row) {
            ConferenceTopic::query()->updateOrCreate(
                ['title' => $row['title']],
                array_merge($row, ['is_published' => true])
            );
        }
    }
}
