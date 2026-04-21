<?php

namespace Database\Seeders;

use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        CommitteeMember::truncate();
        Committee::truncate();

        // Honorary Chair
        $honorary = Committee::create([
            'name' => 'Honorary Chair',
            'slug' => 'honorary-chair',
            'description' => 'Honorary Chair of the conference.',
            'sort_order' => 1,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $honorary->id,
            'name' => 'Pr. Aly Mohamed Salem Boukhary',
            'title' => 'Honorary Chair',
            'affiliation' => 'President, Nouakchott University, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Organizing Committee
        $organizing = Committee::create([
            'name' => 'Organizing Committee',
            'slug' => 'organizing-committee',
            'description' => 'Committee responsible for organizing the conference logistics and execution.',
            'sort_order' => 2,
            'is_published' => true,
        ]);

        $organizingMembers = [
            ['title' => 'Chair', 'name' => 'Mohamed Abdel Wedoud M\'hamed', 'affiliation' => 'Vice-Dean of Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Vice-Chair', 'name' => 'CHEIKH Sidi', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Member', 'name' => 'HIMEIDY Mohamed', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'AHMED Sidi Mohamed', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'CHEIKH Ahmed Salem', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'DIAKITÉ Mohamed Lamine', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Member', 'name' => 'EL BENANY Mohamed Mahmoud', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMED SALECK Fatimetou', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMEDEN Ahmed', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMEDOU EL GHOTOB Cheikh Tourad', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'SALIHI Mohamed Lamine', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'SID\'AHMED Marième', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'SIDI El Veth', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'Med Vall Zeyad', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
        ];

        foreach ($organizingMembers as $index => $member) {
            CommitteeMember::create([
                'committee_id' => $organizing->id,
                'name' => $member['name'],
                'title' => $member['title'],
                'affiliation' => $member['affiliation'],
                'sort_order' => $index,
                'is_published' => true,
            ]);
        }

        // Scientific Committee
        $scientific = Committee::create([
            'name' => 'Scientific Committee',
            'slug' => 'scientific-committee',
            'description' => 'Committee responsible for scientific review and content evaluation.',
            'sort_order' => 3,
            'is_published' => true,
        ]);

        $scientificMembers = [
            // Steering Board
            ['title' => 'Steering Board', 'name' => 'MOHAMED ELHADJ Yahya', 'affiliation' => 'DAHD, Arab Center for Research and Policy Studies, Qatar'],
            ['title' => 'Steering Board', 'name' => 'ABDUL-MAGEED Muhammad', 'affiliation' => 'University of British Columbia (Canada)& Mohamed bin Zayed University of Artificial Intelligence (UAE)'],
            ['title' => 'Steering Board', 'name' => 'DERICHE Mohamed', 'affiliation' => 'College of Engineering and Information Technology, Ajman university, UAE'],
            ['title' => 'Steering Board', 'name' => 'JEMNI Mohamed', 'affiliation' => 'LaTICe, University of Tunis, Director of ICT (ALECSO), Tunisia'],
            ['title' => 'Steering Board', 'name' => 'KOUBAA Anis', 'affiliation' => 'College of Engineering, Alfaisal University'],
            ['title' => 'Steering Board', 'name' => 'KOUZOU Abdella', 'affiliation' => 'Ziane Achour University of Djelfa, Djelfa, Algeria'],
            ['title' => 'Steering Board', 'name' => 'MEZIANE Farid', 'affiliation' => 'College of Science and Engineering, University of Derby, UK'],
            ['title' => 'Steering Board', 'name' => 'NANNE Mohamedade Farouk', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            // Members
            ['title' => 'Member', 'name' => 'ABDELALI Ahmed', 'affiliation' => 'National Center for AI, SDAIA, KSA'],
            ['title' => 'Member', 'name' => 'ABDELOUAFI Meziane', 'affiliation' => 'Faculty of Sciences, Mohammed First University, Morocco'],
            ['title' => 'Member', 'name' => 'AL-KHATIB Wasfi', 'affiliation' => 'King Fahd University of Petroleum and Minerals, KSA'],
            ['title' => 'Member', 'name' => 'AL-MUBAID Hisham', 'affiliation' => 'University of Houston-Clear Lake, USA'],
            ['title' => 'Member', 'name' => 'AL-SALEHI Abdulrahman', 'affiliation' => 'COMSATS University Islamabad, Pakistan'],
            ['title' => 'Member', 'name' => 'AZROUR Mourade', 'affiliation' => 'Faculty of Sciences and Technics, Moulay Ismail University, Morocco'],
            ['title' => 'Member', 'name' => 'BEN ABDALLAH BEN LAMINE Sana', 'affiliation' => 'ENSI, University of Manouba, Tunisia'],
            ['title' => 'Member', 'name' => 'BEN NASER Hashmi', 'affiliation' => 'Imam Muhammad Bin Saud Islamic University, KSA'],
            ['title' => 'Member', 'name' => 'BEN ROMDHANE Karim', 'affiliation' => 'Zitouna University, Tunisia'],
            ['title' => 'Member', 'name' => 'BEN SAID Ahmed', 'affiliation' => 'Qatar University, Qatar'],
            ['title' => 'Member', 'name' => 'BIHA Sidi', 'affiliation' => 'ESP, Mauritania'],
            ['title' => 'Member', 'name' => 'BOUAHADDA Hanen', 'affiliation' => 'Faculté des sciences de Tunis FST, Tunisia'],
            ['title' => 'Member', 'name' => 'CHAFFAR Soumaya', 'affiliation' => 'University of Prince Mugrin (UPM), KSA'],
            ['title' => 'Member', 'name' => 'CHEIKH Sidi', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'CHEIKH TOURAD Mohamedou', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'DADI El Wardani', 'affiliation' => 'National School of Applied Sciences, Abdelmalek Essaadi University, Morocco'],
            ['title' => 'Member', 'name' => 'DEMBA Moussa', 'affiliation' => 'Institut Supérieur du Numérique (Sup Num), Mauritania'],
            ['title' => 'Member', 'name' => 'DHIB Cheikh', 'affiliation' => 'Institut Supérieur du Numérique (Sup Num), Mauritania'],
            ['title' => 'Member', 'name' => 'DIAKITÉ Mohamed Lamine', 'affiliation' => 'Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'EJBALI Ridha', 'affiliation' => 'Faculty of Sciences, University of Gabes, Tunisia'],
            ['title' => 'Member', 'name' => 'EL AOUN Moustapha', 'affiliation' => 'Ecole Supérieure Polytechnique (ESP), Mauritania'],
            ['title' => 'Member', 'name' => 'ELHAYEK Ahmed', 'affiliation' => 'University of Prince Mugrin (UPM), KSA'],
            ['title' => 'Member', 'name' => 'GUESSOUM Ahmed', 'affiliation' => 'National School of Artificial Intelligence, USTHB University, Algeria'],
            ['title' => 'Member', 'name' => 'HARRAG Fouzi', 'affiliation' => 'College of Sciences, Ferhat Abbas University, Algeria'],
            ['title' => 'Member', 'name' => 'IDRIS Salim', 'affiliation' => 'Damascus University, Syria'],
            ['title' => 'Member', 'name' => 'JABBAR Rateb', 'affiliation' => 'Qatar University, Qatar'],
            ['title' => 'Member', 'name' => 'KRAIEM Naoufel', 'affiliation' => 'College of Computer Science, King Khalid University, KSA'],
            ['title' => 'Member', 'name' => 'LACHGAR Mohamed', 'affiliation' => 'Cadi Ayyad University, Morocco'],
            ['title' => 'Member', 'name' => 'LAKHOUAJA Abdelhak', 'affiliation' => 'Faculty of Sciences, Mohammed First University, Morocco'],
            ['title' => 'Member', 'name' => 'MAZROUI Azzeddine', 'affiliation' => 'University Mohammed First, Morocco'],
            ['title' => 'Member', 'name' => 'MOHAMED BABOU Hafedh', 'affiliation' => 'Ecole Supérieure Polytechnique (ESP), Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMED DILLA Mohamed El Hacen', 'affiliation' => 'Institut Supérieur de Génie Industriel (ISGI), Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMED MAHMOUD El Benany', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'MOHAMEDEN Ahmed', 'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania'],
            ['title' => 'Member', 'name' => 'MOUHNI Naoual', 'affiliation' => 'FST Errachidia, Moulay Ismail University of Meknes, Morocco'],
            ['title' => 'Member', 'name' => 'OULD ELHASSEN AOUEILEYINE Mohamed', 'affiliation' => 'SupCom, Cartage University, Tunisia'],
            ['title' => 'Member', 'name' => 'OUTFAROUIN Ahmad', 'affiliation' => 'Ibn Zohr University, Morocco'],
            ['title' => 'Member', 'name' => 'PALUMBO Fabrizio', 'affiliation' => 'Oslo Metropolitan University, Norvège'],
            ['title' => 'Member', 'name' => 'SAFAA El Ouahabi', 'affiliation' => 'Polydisciplinary Faculty of Nador, Mohammed First University, Morocco'],
            ['title' => 'Member', 'name' => 'SAKLY Houneida', 'affiliation' => 'National School of Computer Sciences, University of Mannouba, Tunisia'],
            ['title' => 'Member', 'name' => 'SALEH Hussain', 'affiliation' => 'Damascus University, Syria'],
            ['title' => 'Member', 'name' => 'SI LHOUSSAIN Aouragh', 'affiliation' => 'ENSIAS, Mohamed V University, Morocco'],
            ['title' => 'Member', 'name' => 'SOUFAN Othman', 'affiliation' => 'University of Prince Mugrin (UPM), KSA'],
            ['title' => 'Member', 'name' => 'TOURAD DIALLO Mamadou', 'affiliation' => 'Institut Supérieur du Numérique (Sup Num), Mauritania'],
            ['title' => 'Member', 'name' => 'YOUSFI Abdellah', 'affiliation' => 'Faculty of Law, Economics and Social Sciences, University of Mohamed V, Morocco'],
            ['title' => 'Member', 'name' => 'ZERROUKI Taha', 'affiliation' => 'ESI, Bouira University, Algeria'],
        ];

        foreach ($scientificMembers as $index => $member) {
            CommitteeMember::create([
                'committee_id' => $scientific->id,
                'name' => $member['name'],
                'title' => $member['title'],
                'affiliation' => $member['affiliation'],
                'sort_order' => $index,
                'is_published' => true,
            ]);
        }

        // Exhibitions Committee
        $exhibitions = Committee::create([
            'name' => 'Exhibitions Committee',
            'slug' => 'exhibitions-committee',
            'description' => 'Committee responsible for managing exhibitions and sponsors.',
            'sort_order' => 4,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $exhibitions->id,
            'name' => 'MOHAMEDOU EL GHOTOB Cheikh Tourad',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Logistics Committee
        $logistics = Committee::create([
            'name' => 'Logistics Committee',
            'slug' => 'logistics-committee',
            'description' => 'Committee responsible for logistics.',
            'sort_order' => 5,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $logistics->id,
            'name' => 'Fatimetou Mohamed-Saleck',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Workshops Committee
        $workshops = Committee::create([
            'name' => 'Workshops Committee',
            'slug' => 'workshops-committee',
            'description' => 'Committee responsible for organizing workshops.',
            'sort_order' => 6,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $workshops->id,
            'name' => 'EL BENANY Med Mahmoud',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Session Committee
        $session = Committee::create([
            'name' => 'Session Committee',
            'slug' => 'session-committee',
            'description' => 'Committee responsible for session management.',
            'sort_order' => 7,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $session->id,
            'name' => 'Ahmed Mohameden',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Registration Committee
        $registration = Committee::create([
            'name' => 'Registration Committee',
            'slug' => 'registration-committee',
            'description' => 'Committee responsible for registration.',
            'sort_order' => 8,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $registration->id,
            'name' => 'EL Veth Sidi',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Nouakchott, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);

        // Communication Committee
        $communication = Committee::create([
            'name' => 'Communication Committee',
            'slug' => 'communication-committee',
            'description' => 'Committee responsible for communication.',
            'sort_order' => 9,
            'is_published' => true,
        ]);

        CommitteeMember::create([
            'committee_id' => $communication->id,
            'name' => 'Sidi Mohamed Ahmed',
            'title' => 'Coordinator',
            'affiliation' => 'Faculty of Sciences and Techniques, Nouakchott University, Mauritania',
            'sort_order' => 0,
            'is_published' => true,
        ]);
    }
}
