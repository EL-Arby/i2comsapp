<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workshops = [
            [
                'title' => 'Unlocking Educational Potential: A Practical Guide to Integrating Generative Artificial Intelligence in the classroom',
                'slug' => 'generative-ai-education',
                'abstract' => 'This workshop will explore the applications of generative Artificial Intelligence in educational settings. The workshop will cover foundational concepts of AI, specific use cases in teaching and learning, and hands on activities that showcase the integration of AI technologies, from both student and instructor perspectives.',
                'presenters' => 'Prof. Cheikh Ould Moulaye (Senior Instructor) and Mariem Moulaye from Manitoba University, Canada.',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Generative AI in the Era of Large Language Models (LLMs)',
                'slug' => 'llms-workshop',
                'abstract' => 'The development of generative technologies and LLMs for diverse domains presents unique challenges, particularly in ensuring their reliability, safety, and ethical use. This workshop will discuss these challenges focusing on the critical need for trustworthy AI systems that respect privacy, prevent bias, and operate within acceptable boundaries. It will also cover current methods developed to meet these challenges and their wide scale of applications such as in education, finance, and health. This rich linguistic and cultural diversity in the Arab world and North Africa region offers a unique context for the application and development of these technologies.',
                'presenters' => 'Group of expert scientists and professionals from different Universities, MBZUAI and others.',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Presentation of the AlKhalil Platform for Arabic Language Processing',
                'slug' => 'alkhalil-platform',
                'abstract' => 'As part of the great interest shown by the information and communication technology industry in natural language processing, particularly for the Arabic language, the Oujda-NLP team carried out the AlKhalil Platform for Arabic Language Processing, with the valuable support of the Arab League Educational, Cultural and Scientific Organization (ALECSO). This platform aims to provide researchers interested in processing the Arabic language with a set of morphosyntactic analyzers developed for this language.',
                'presenters' => 'Prof. Azzeddine Mazroui and Prof. Abdelhak Lakhouaja, from Oujda-NLP team, Mohammad Ist University, Morocco.',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'From Machine Learning to Tiny Machine Learning with Edge Impulse',
                'slug' => 'tiny-ml-edge-impulse',
                'abstract' => 'This workshop will guide participants through the journey of creating, training, and deploying machine learning models on edge devices using Edge Impulse. The focus will be on understanding the transition from traditional machine learning to the challenges and optimizations required for tiny machine learning on embedded systems.',
                'presenters' => 'Dr. Eng. Mohamed Ould-Elhassen Aoueileyine from Innov\'COM Lab, SUPCOM, University of Carthage, Tunisia.',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Medical Image Segmentation and Surgical Guidance',
                'slug' => 'medical-image-segmentation',
                'abstract' => 'In this workshop, we will first present the basic concepts of medical image segmentation with artificial intelligence, discussing how it has revolutionized the field of surgical planning in recent years. We will describe some available tools to run advanced segmentation algorithms on medical images. In the second part of the workshop, we will describe the technologies available for image guided medical treatments, reviewing concepts such as electromagnetic and optical tracking systems, image registration and augmented reality.',
                'presenters' => 'Javier Pascau & Mónica García-Sevilla, Universidad Carlos III de Madrid, Madrid, Spain',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($workshops as $workshop) {
            Workshop::create($workshop);
        }
    }
}
