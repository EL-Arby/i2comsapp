<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            [
                'name' => 'Prof. Mohamed JEMNI',
                'role_title' => 'Director of ICT',
                'affiliation' => 'The Arab League Educational, Cultural and Scientific Organization',
                'bio' => 'Mohamed Jemni is a Professor of Computer Science and Educational Technologies at the University of Tunis, Tunisia. He is the Director of ICT at The Arab League Educational, Cultural and Scientific Organization ALECSO (www.alecso.org). He has been the General Director of the Computing Center El Khawarizmi, the Internet services provider for the sector of higher education Tunisia, from 2008 to 2013. He is a Senior member IEEE and co-editor of Springer Lecture Notes in educational Technology. At ALECSO, he is currently leading several projects related to the promotion of effective use of ICT in education in the Arab world, namely, Artificial Intelligence, Smart Learning, OER, cloud computing and the strategic project of development of the "Unified Arab System for Blockchain-based Certificate Authentication". He produced two patents and published more than 300 papers in international journals, conferences and books. He produced many studies for international organizations such as UNESCO and ITU. Prof. Jemni has been awarded the honorary distinction of Commander of the Order of the Tunisian Republic in May 2009 and the Order of Educational Merit in July 2007. Prof. Jemni and his research Laboratory have received several awards, including the Silver medal of the International Fair of Inventions in Kuwait 2007, the UNESCO Prize 2008 for the e-learning curriculum they developed for visually impaired, President\'s Award for the integration of persons with disabilities 2009 and the "World Summit Award (WSA) – Mobile 2010" in the field of social inclusion.',
                'photo_url' => '/images/speakers/Mohamed-Jemni.jpg',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'Prof. Farid MEZIANE',
                'role_title' => 'Head of the Data Science Research Centre',
                'affiliation' => 'University of Derby, United Kingdom',
                'bio' => 'Farid Meziane is a professor of Data Science, Head of the Data Science Research Centre, the University\'s lead for the Data Science academic research theme and the chair of the college of Science and Engineering Research Committee at the University of Derby, UK. He obtained a PhD in Computer Science from the University of Salford, UK on his work on producing formal specification from Natural Language requirements. The work was considered at that time as pioneering in the area and paved the way for a large interest in automating the production of software specifications from informal requirements. He has authored over 200 scientific papers and participated in many national and international research projects. He is the co-chair of the international conference on application of Natural Language to information systems; co-chair of the international conference on Information Science and Systems. He is serving in the programme committee of over ten international conferences. He is an associate editor for the data and knowledge engineering (Elsevier) journal and the managing editor of the International Journal of Information Technology and Web Engineering (IDEA publishing). He was awarded the Highly Commended Award from the Literati Club, 2001 for his paper on Intelligent Systems in Manufacturing: Current Development and Future Prospects.',
                'photo_url' => '/images/speakers/Farid-Meziane.jpg',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'name' => 'Prof. Anis KOUBAA',
                'role_title' => 'Director of Research and Initiatives Center',
                'affiliation' => 'Prince Sultan University, Saudi Arabia',
                'bio' => 'Anis Koubaa is a distinguished Full Professor in Computer Science, recognized for his pioneering work at the intersection of Generative AI and Large Language Models (LLMs). Serving as the Research and Initiatives Center Director at Prince Sultan University, Professor Koubaa spearheads groundbreaking research in AI, Unmanned Systems, and the Internet-of-Things. His contributions, such as the "Oyoon" surveillance system for Face Recognition and Vehicle License Plate Identification and the development of PSUGPT, a chatbot assistant for Prince Sultan University leveraging ChatGPT and LLMs, are testament to his innovation. With over 20 edited books with Springer, his expertise in the field is undisputed. Recognized among the top 2% of scientists by Stanford University, he has received accolades, including the AI Leadership Award in 2022.',
                'photo_url' => '/images/speakers/Anis-Koubaa.jpg',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'name' => 'Prof. Mohamed DERICHE',
                'role_title' => 'Artificial Intelligence Research Center (AIRC)',
                'affiliation' => 'Ajman University, United Arab Emirates',
                'bio' => 'Mohamed Deriche is currently a Professor of AI/ML at the College of Engineering and Information Technology and serving the Artificial Intelligence Research Center (AIRC), Ajman University, Ajman, United Arab Emirates. He received his B.Sc. degree in electrical engineering from the National Polytechnic School, Algeria, and his Ph.D. degree in signal processing from the University of Minnesota in 1994. He worked at Queensland University of Technology, Australia, before joining King Fahd University of Petroleum and Minerals (KFUPM) in Dhahran, Saudi Arabia. He has published more than 300 papers in multimedia signal and image processing.',
                'photo_url' => '/images/speakers/Mohamed-Deriche.jpg',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'name' => 'Prof. Muhammad ABDUL-MAGEED',
                'role_title' => 'Canada Research Chair in NLP and Machine Learning',
                'affiliation' => 'University of British Columbia & Mohamed bin Zayed University of Artificial Intelligence',
                'bio' => 'Abdul-Mageed maintains an associate professor and a Canada research chair in natural language processing (NLP) and machine learning at the University of British Columbia (UBC), where he is a founding member of UBC\'s Center for Artificial Intelligence. His research program focuses on deep representation learning and natural language socio-pragmatics, with a goal to innovate more equitable, efficient, and social machines for improved human health, safer social networking, and reduced information overload. He also has a special focus on Arabic NLP.',
                'photo_url' => '/images/speakers/Muhammad-Abdul-Mageed.jpg',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($speakers as $speaker) {
            Speaker::create($speaker);
        }
    }
}
