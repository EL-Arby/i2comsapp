using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.IO;
using System.Text;
/// <summary>
/// Summary description for Lit
/// </summary>

//****************************************************************************//
//  NOM :  A2SL.cpp							 						          //
//  Corps du programme principal											  //
//  Copyrigth Z. Zemirli, 2010; A. Abdelali + K. Ayadi + Y. Elhadj, 2013      //
//****************************************************************************//
//  DESCRIPTION                                                               //
//  Translator from Arabic to Sign Language									  //
//****************************************************************************//
//  ADMINISTRATION   Zouhir ZEMIRLI    |V1.0    |                             //
//  Date de Creation du Fichier		   |21.10.10|							  //
//  Date de derniere Modiffication	   |24.02.13|   AA                        //
//  Date de derniere Modiffication	   |20.03.13|   KA + YE                   //
//  Date de conversion to c#           |12.12.17|   KA                        //
//  Date de derniere Modiffication     |30.09.19|   KA                        //
//****************************************************************************//

public class Signword
{
    public string word { get; set; }
    public string Type { get; set; }
}

public class Lit
{
    string buffer1;
 
    static int Max_Stop_Word = 15;
    //Length = 100
    static string[] stop_word_in = {
    "وامسحوا",  "نفلأ", "الطهارتين", "داخلان", "المتطهرين", "فاطهروا", "حثيات", "متيامنا", "غسلان", "الختانين",
    "تعبدية", "يداس", "خيف", "المطهرون", "فامسحوا",
    "مفرجة", "العاص", "المبدل", "واجبة", "مستغن", "وبشترط", "محترق", "بطروء","بطرؤ", "بناقض" };
    //Length = 100
    static string[] stop_word_out = {
    "مسح + (إش - أنتم)", "نفل", "الطهارة + كبير + صغير", " داخل + (إش - إثنان)", "طهارة + (إش - جمع)",
    "(إش - أمر) + (إش - أنتم) + طهارة", "حثي +  (إش - جمع)", "يمين", "غسل+ (إش - إثنان)", "ختان+ (إش - إثنان)",
    "عبادة", "يداس", "خوف", "طهارة + (إش - جمع)", "مسح + (إش - أنتم)" };

    static char[,] Buck_To_Arabic = new char[45,2] {
	{ '\'','ء' },{ '|','آ' },{ '>','أ' },{ '&','ؤ' },{ '<','إ' },{ '}','ئ' },{ 'A','ا' },{ 'b','ب' },{ 'p','ة' },
	{ 't','ت' },{ 'v','ث' },{ 'j','ج' },{ 'H','ح' },{ 'x','خ' },{ 'd','د' },{ '*','ذ' },{ 'r','ر' },{ 'z','ز' },
	{ 's','س' },{ '$','ش' },{ 'S','ص' },{ 'D','ض' },{ 'T','ط' },{ 'Z','ظ' },{ 'E','ع' },{ 'g','غ' },{ '_','ـ' },
	{ 'f','ف' },{ 'q','ق' },{ 'k','ك' },{ 'l','ل' },{ 'm','م' },{ 'n','ن' },{ 'h','ه' },{ 'w','و' },{ 'Y','ى' },
	{ 'y','ي' },{ 'F','ً' },{ 'N','ٌ' },{ 'K','ٍ' },{ 'a','َ' },{ 'u','ُ' },{ 'i','ِ' },{ '~','ّ' },{ 'o','ْ' } };
    //Length 11, 34, 20 (Adding empty element to get 34 element in the row)
static string[ , ] Part_Group = new string[11,34] {
            { "حاشا","خلا","عدا","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","" },
    { "من","عن","إلى","على","في","ك","ل","ب","ربّ","منذ","مذ","","","","","","","","","","","","","","","","","","","","","","","" },
    { "إنّ","أنّ"," كأنّ"," لكنّ","ليت"," لعلّ" ,"","","","","","","","","","","","","","","","","","","","","","","","","","","",""},
    { "كان","يكون","كانت","صار","صارت"," يصير"," أمسى","ليس","ليست","ظلّ","ظلّت","أضحى"," أضحت","يضحي","أصبح","أصبحت"," يصبح"," بات","باتت"," يبيت"," مازال","لازال"," لايزال"," لازالت","","","","","","","","","","" },
    { "أن","كي","لن","حتى","ل","إذن","","","","","","","","","","","","","","","","","","","","","","","","","","","","" },
    { "لم"," لمّا","ول","فل","ثمّ ل"," مهما"," حيثما"," أينما","كيفما","","","","","","","","","","","","","","","","","","","","","","","","","" },
    { "هل","من","ما","متى","أين","ماذا","كيف","أ","آ","أيّان","","","","","","","","","","","","","","","","","","","","","","","","" },
    { "يا","أ"," أي"," أيا"," هيا"," وا","","","","","","","","","","","","","","","","","","","","","","","","","","","","" },
    {
                "عند"," أمام","وراء"," خلف"," مع"," قبل"," بعد"," تحت","أيّ"," كلّ"," بعض"," غير"," سوى",
    " ليل","شمال"," جنوب"," يمين"," شرق"," غرب"," شطر"," أسفل","أعلى","جنب"," جانب"," تلقاء"," قدّام",
    " فوق"," أعلى","  شهر"," سنة"," غروب"," شروق"," دون","شهور" },
    { "يوم"," حين"," ساعة"," زمان"," أزمان"," أيام"," أوقات"," وقت"," لحظة","","","","","","","","","","","","","","","","","","","","","","","","","" },
    { "أيها"," أيتها","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","" }
    };

    public Lit() { }
    ~Lit() { }

    /*--------------------------------------------------------------------------------*/
    int Check_Stop_Word(string Word)
    {
        //unsigned pdest;
        int pdest;
        for (int i = 0; i < Max_Stop_Word; i++)
        {
            //pdest = Word.find(stop_word_in[i]);
            pdest = Word.IndexOf(stop_word_in[i]);
            //if (pdest != -1) return i;
            if (pdest != -1) return i;
        }
        return -1;
    }
    /*--------------------------------------------------------------------------------*/
    int Check_Part_Group(string Word)
    {
        //unsigned pdest; int i, j;
        int pdest; int i, j;
        int[] IMG = new int[11] { 3, 11, 6, 24, 6, 9, 10, 6, 34, 10, 2 };
        for (i = 0; i < 11; i++)
        {

            for (j = 0; j < IMG[i]; j++)
            {
                //pdest = Word.find(Part_Group[i][j]);
                pdest = Word.IndexOf(Part_Group[i,j]);
                //if (pdest != string::npos) return i;
                if (pdest != -1) return i;
            }
        }
        return -1;
    }
    /*--------------------------------------------------------------------------------*/
    string Translate(string buffer1, string Word)
    ////SOLUTION  : المُسْلِمُونَ [musolim_1] ال DET مُسْلِم NOUN  ُونَ NSUFF_MASC_PL_NOM 
    {
        int i;
        string Translation;
        //unsigned pdest;
        int pdest;
        //char *pdest0, *pdest1, *pdest2;
        int pdest0, pdest1, pdest2;
        //char[] mot = new char[40];
        string mot;
        //Translation.clear();
        Translation = string.Empty;
        bool Dual, Plural, Noun, FEM, DUAL, Suffixe2, Suffixe3, Suffixe4, prop_noun;
        //static int PREP = 0;
        int PREP = 0;
        //int longueur = Word.length();
        int longueur = Word.Length;
        Dual = false; Plural = false; Noun = false; FEM = false; DUAL = false;
        Suffixe2 = false; Suffixe3 = false; Suffixe4 = false; prop_noun = false;
        //for (i = 0; i < longueur; i++) mot[i] = Word.at(i); mot[i] = '\0';
        mot = Word;
        int j = (int)mot.Length - 1;
        pdest = buffer1.IndexOf("NEG_PART");
        if (pdest != -1)
        {
            if (mot[0] == 'و') //{ for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0';  }
            { mot = mot.Substring(1, mot.Length - 1); }
            else if (mot[0] == 'ف') //{ for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0'; }
            { mot = mot.Substring(1, mot.Length - 1); }
            Translation += mot; Noun = true;
        }
        pdest = buffer1.IndexOf("INTERJ"); if (pdest != -1) Translation += mot;
        pdest = buffer1.IndexOf("INTERROG_PART"); if (pdest != -1) Translation += mot;
        pdest = buffer1.IndexOf("EXCEPT_PART"); if (pdest != -1) Translation += mot;
        pdest = buffer1.IndexOf("REL_PRON"); if (pdest != -1) Translation += mot;
		pdest = buffer1.IndexOf("FUNC_WORD"); if (pdest != -1) Translation += mot;
        pdest = buffer1.IndexOf("IV3FS");
        if (pdest != -1)
        {
            //for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0';
            mot = mot.Substring(1, mot.Length - 1);
            Translation += " (إش - أنت) + ";
        }
        //pdest = buffer1.find("IV3MS" );	
        //if( pdest != -1 ) { for (i=0; i<(int)mot.Length; i++) mot[i]=mot[i+1]; mot[i]='\0'; }

        pdest = buffer1.IndexOf("CONJ");
        if (pdest != -1)
        {
            if (mot[0] == 'و') //{ for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0'; }
            { mot = mot.Substring(1, mot.Length - 1); }
        else if (mot[0] == 'ف') //{ for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0'; }
            { mot = mot.Substring(1, mot.Length - 1); }
        }
        if (mot[j - 1] == 'ً') { Translation += mot; Noun = true; }
        pdest = buffer1.IndexOf("PREP");
        if (pdest != -1)
        {
            //pdest = strstr(mot,"لله" ); if ( pdest != -1 ) { Translation+="الله"; Noun=true;}
            /*pdest0 = strstr(mot, "منذ");
            pdest1 = strstr(mot, "رب");
            pdest2 = strstr(mot, "في");*/
            pdest0 = mot.IndexOf("منذ");
            pdest1 = mot.IndexOf("رب");
            pdest2 = mot.IndexOf("في");
            //if ((pdest0 != null) || (pdest1 != null) || (pdest2 != null)) ;
            if ((pdest0 != -1) || (pdest1 != -1) || (pdest2 != -1)) ;
            else if ((mot[0] == 'ب') || (mot[0] == 'ك')) /*||(mot[0]=='ل'))*/
            {
                //for (i = 0; i < (int)mot.Length; i++) mot[i] = mot[i + 1]; mot[i] = '\0';
                mot = mot.Substring(1,mot.Length-1);
            }
            if (!Noun) Translation += mot;
            PREP++;
            Noun = true;
        }
        pdest = buffer1.IndexOf("DET");
        if (pdest != -1)
        {
            if ((mot[0] == 'ا') || (mot[1] == 'ل')) // { for (i = 0; i < (int)mot.Length - 1; i++) mot[i] = mot[i + 2]; mot[i + 1] = '\0'; }
            { mot = mot.Substring(2, mot.Length-2); } 
            //Translation+=mot; Noun=true;
        }
        pdest = buffer1.IndexOf("PVSUFF_DO:3FS");
        if (pdest != -1)
        {
            int k = (int)mot.Length - 1;
            if ((mot[k - 1] == 'ه') && (mot[k] == 'ا'))
               //{ mot[j - 1] = '\0'; Suffixe3 = true; }
            { mot = mot.Substring(0, mot.Length - 2); Suffixe3 = true; }
        }
        pdest = buffer1.IndexOf("PVSUFF_DO:3D");
        if (pdest != -1)
        {
            int k = (int)mot.Length - 1;
            if ((mot[k - 2] == 'ه') && (mot[k - 1] == 'م') && (mot[k] == 'ا'))
            //{ mot[j - 2] = '\0'; Suffixe4 = true; }
            { mot = mot.Substring(0, mot.Length - 3); Suffixe4 = true; }
        }
        pdest = buffer1.IndexOf("PVSUFF_DO:2MS");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 1] = '\0';
            mot = mot.Substring(0, mot.Length - 1);
            Suffixe2 = true;
        }
        pdest = buffer1.IndexOf("PVSUFF_SUBJ:3FD");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 2] = '\0';
            mot = mot.Substring(0, mot.Length - 2);
            Translation += "(إش - مؤنث) "; Translation += " + (إش - إثنان) + "; Translation += mot; Noun = true;
        }
        pdest = buffer1.IndexOf("PVSUFF_SUBJ:1S");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 1] = '\0';
            mot = mot.Substring(0, mot.Length - 1);
            Translation += "(إش - أنا) + "; Translation += mot; Noun = true;
            if (Suffixe2) Translation += "+ (إش - أنت) ";
        }
        pdest = buffer1.IndexOf("NOUN_PROP");
        if ((pdest != -1) && (!Noun))
        {
            Translation += mot; Noun = true; prop_noun = true;
        }
        pdest = buffer1.IndexOf("PVSUFF_SUBJ:3FD");
        if (pdest != -1)
        { 
            //mot[(int)mot.Length - 2] = '\0'; 
            mot = mot.Substring(0, mot.Length - 2); DUAL = true; FEM = true;
        }
        //pdest = buffer1.IndexOf("قَبْلَ" );		if( pdest != -1 ) Translation+=mot;
        pdest = buffer1.IndexOf("VERB_PERFECT");
        if ((pdest != -1) && (!Noun)) { Translation += mot; if (PREP == 0) Translation += " + (إش - ماضي)"; else PREP = 0; }
        pdest = buffer1.IndexOf("VERB_IMPERFECT"); if ((pdest != -1) && (!Noun)) Translation += mot;
        pdest = buffer1.IndexOf("VERB_PASSIVE"); if ((pdest != -1) && (!Noun)) Translation += mot;
        pdest = buffer1.IndexOf("NSUFF_MASC_DU_NOM");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 2] = '\0';
            mot = mot.Substring(0, mot.Length - 2);
            Translation += mot; Translation += " + (إش - إثنان)"; Noun = true; //Translation+="+ (إش - مذكر)"; 
        }
        pdest = buffer1.IndexOf("NSUFF_MASC_DU_ACCGEN_POSS");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 1] = '\0';
            mot = mot.Substring(0, mot.Length - 1);
            Translation += mot; Translation += " + (إش - أنا)"; Noun = true; // Translation+="+ (إش - مذكر)";
        }
        pdest = buffer1.IndexOf("NSUFF_MASC_DU_ACCGEN");
        if ((pdest != -1) && (!Noun))
        {
            //mot[(int)mot.Length - 2] = '\0';
            mot = mot.Substring(0, mot.Length - 2);
            Translation += mot; Translation += " + (إش - إثنان)"; Noun = true; // Translation+="+ (إش - مذكر)";
        }
        pdest = buffer1.IndexOf("NSUFF_FEM_DU_NOM");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 3] = '\0';
            mot = mot.Substring(0, mot.Length - 3);
            Translation += mot + "ة"; Translation += " + (إش - إثنان)"; Noun = true; // Translation+="+ (إش - مؤنث)"; 
        }
        pdest = buffer1.IndexOf("NSUFF_FEM_PL");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 2] = '\0';
            mot = mot.Substring(0, mot.Length - 2);
            Translation += mot; Translation += "+ (إش - مؤنث) "; Translation += " + (إش - جمع) "; Noun = true; Plural = true;
        }
        pdest = buffer1.IndexOf("NSUFF_MASC_PL_NOM");
        if (pdest != -1)
        {
            //mot[(int)mot.Length - 2] = '\0';
            mot = mot.Substring(0, mot.Length - 2);
            Translation += mot; Translation += " + (إش - مذكر) "; Translation += " + (إش - جمع) "; Noun = true; Plural = true;
        }
        pdest = buffer1.IndexOf("PLF");
        if (pdest != -1)
        {
            if (!Plural) { Translation += mot; Translation += "+ (إش - مؤنث) "; Translation += " + (إش - جمع) "; Noun = true; }
        }
        pdest = buffer1.IndexOf("PL");
        if ((pdest != -1) && (!Noun))
        {
            if (!Plural) { Translation += mot; Translation += " + (إش - جمع) "; Noun = true; }
        }
        pdest = buffer1.IndexOf("NOUN"); if ((pdest != -1) && (!Noun)) Translation += mot;
        pdest = buffer1.IndexOf("ADJ"); if ((pdest != -1) && (!Noun)) Translation += mot;
        pdest = buffer1.IndexOf("ADV"); if (pdest != -1) Translation += mot;
        if (Suffixe3) Translation += " + (إش - ها) "; else if (Suffixe4) Translation += " + (إش - هما) ";
        return Translation;
    }
    /*--------------------------------------------------------------------------------*/

	 /*--------------------------------------------------------------------------------*/
    public string VerifyTransRules(List<Signword>SignWord)
    {
        string result = "";
		bool LoopS7 = false, LoopS8=false, FinalState=false, Action;
        int state = 0,i;
        for (i = 0; i < SignWord.Count; i++)
        {
			Action = false;
            //Verbal Phrase
            if ((state==0) && (SignWord[i].Type.Equals("VIM") || SignWord[i].Type.Equals("VPE") || SignWord[i].Type.Equals("VPA")))
            {
                state = 2;
                result += SignWord[i].word;
				Action = true;
            }
			if ((state == 7) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 7;
                LoopS7 = true;
                result = SignWord[i-1].word + " + "+ SignWord[i].word + " + " + result;
				Action = true;
            }
            if ((state == 2) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 7;
				Action = true;
                //result = SignWord[i].word + " + " + result;
            }
            if ((state == 7) && (SignWord[i].Type.Equals("PUNCT")) )
            {
				FinalState = true;
                if (! LoopS7) result = SignWord[i-1].word + " + " + result;
                state = 21;//Final Case (Inversion): V + S \ O => S \ O + V
                LoopS7 = false;
				Action = true;
            }
			if ((state == 7) && (SignWord[i].Type.Equals("P")))
            {
                state = 25;
				Action = true;
                //result += " + " + SignWord[i].word;
            }
			if ((state == 25) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 26;          
				// S + P + O + V
                result = SignWord[i-2].word + " + " + SignWord[i-1].word + " + "+ SignWord[i].word + " + " + result;
				Action = true;
            }
			if ((state == 26) && (SignWord[i].Type.Equals("PUNCT")) )
            {
				FinalState = true;
                state = 27;//Final Case (Inversion): V + S + P + O => S + P + O + V                
				Action = true;
            }
            //Neg + V \ ADJ, ADV
            if ((state == 0) && (SignWord[i].Type.Equals("NEG")))
            {
                state = 3;
                result += SignWord[i].word;
				Action = true;
            }            
			if ((state == 3) && (SignWord[i].Type.Equals("VIM") || SignWord[i].Type.Equals("VPE") || SignWord[i].Type.Equals("VPA") || SignWord[i].Type.Equals("ADJ") || SignWord[i].Type.Equals("ADV")))
            {
                state = 8;
                result = SignWord[i].word + " + " + result;
				Action = true;
            }			
            if ((state == 8) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 22;//Final Case (Inversion): Neg + V \ ADV,ADJ => V \ ADV,ADJ + Neg
				Action = true;
            }
			if ((state == 23) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 23;
                LoopS8 = true;
                result = SignWord[i-1].word + " + "+ SignWord[i].word + " + " + result;
				Action = true;
            }
			if ((state == 8) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 23;
				Action = true;
            }
			if ((state == 23) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 24;//Final Case (Inversion): Neg + V \ ADV,ADJ + S + O => S + O + V \ ADV,ADJ + Neg
				if (!LoopS8) 
					result = SignWord[i-1].word + " + " + result;
				LoopS8 = false;
				Action = true;
            }
            //Noun Phrase
            if ((state == 1) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 1;
                result += " + " + SignWord[i].word;
				Action = true;
            }
			if ((state == 0) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 1;
                result += SignWord[i].word;
				Action = true;
            }        
            // S + Neg
            if ((state == 1) && (SignWord[i].Type.Equals("NEG")))
            {
                state = 4;
				Action = true;
            }
            if ((state == 4) && (SignWord[i].Type.Equals("VIM") || SignWord[i].Type.Equals("VPE") || SignWord[i].Type.Equals("VPA") || SignWord[i].Type.Equals("ADJ") || SignWord[i].Type.Equals("ADV")))
            {
                state = 9;
                result += " + " + SignWord[i].word + " + " + SignWord[i-1].word;
				Action = true;
            }
            if ((state == 9) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 10;//Final Case (Inversion) : S + Neg + v => S + V + Neg
				Action = true;
            }
            if ((state == 9) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 11;
                result = SignWord[i].word + " + " + result;
				Action = true;
            }
            if ((state == 11) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 12;//Final Case (Inversion) : S + Neg + v O => O + S + V + Neg
				Action = true;
            }
            // S + V
            if ((state == 1) && (SignWord[i].Type.Equals("VIM") || SignWord[i].Type.Equals("VPE") || SignWord[i].Type.Equals("VPA") || SignWord[i].Type.Equals("ADJ") || SignWord[i].Type.Equals("ADV")))
            {
                state = 5;
                Action = true;
            }
            if ((state == 5) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 13;//Final Case (No Action) : S + V => S + V 
                result += " + " + SignWord[i-1].word;
				Action = true;
            }
            if ((state == 5) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 14;
                result += " + " + SignWord[i].word + " + " + SignWord[i - 1].word;
				Action = true;
            }
            if ((state == 14) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 15;//Final Case (Inversion) : S + V + O => S + O + V 
				Action = true;
            }
            if ((state == 5) && (SignWord[i].Type.Equals("P") ))
            {
                state = 16;
                result += " + " + SignWord[i - 1].word;
				Action = true;
            }
            if ((state == 16) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 17;//Final Case (Delete) : S + V + P => S + V 
				Action = true;
            }
            //S + P
            if ((state == 1) && (SignWord[i].Type.Equals("P")))
            {
                state = 6;
                result += " + " + SignWord[i].word;
				Action = true;
            }
            if ((state == 6) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 18;//Final Case (No Action) : S + P => S + P 
				Action = true;
            }
            if ((state == 6) && (SignWord[i].Type.Equals("ADJ") || SignWord[i].Type.Equals("ADV")))
            {
                state = 19;
                result += " + " + SignWord[i].word;
				Action = true;
            }
            if ((state == 19) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 20;//Final Case (No Action) : S + P + ADV, ADJ => S + P + ADV,ADJ
				Action = true;
            }            
			// Interro + V + O 			
            if ((state == 0) && (SignWord[i].Type.Equals("IP")))
            {
                state = 28;
                result += SignWord[i].word;
				Action = true;
            }            
			if ((state == 28) && (SignWord[i].Type.Equals("VIM") || SignWord[i].Type.Equals("VPE") || SignWord[i].Type.Equals("VPA")))
            {
                state = 29;
                result += " + " +SignWord[i].word;
				Action = true;
            }			            
			if ((state == 29) && (SignWord[i].Type.Equals("NP") || SignWord[i].Type.Equals("N") || SignWord[i].Type.Equals("PL") || SignWord[i].Type.Equals("PLF")))
            {
                state = 30;                
                result = SignWord[i].word + " + " + result;
				Action = true;
            }			
			if ((state == 30) && (SignWord[i].Type.Equals("PUNCT")))
            {
				FinalState = true;
                state = 31;//Final Case (Inversion): Interro + V + O =>  O + Interro + V 				
				Action = true;
            }
			if (! Action) 
			{
				break;
				//if (i==0) result += (SignWord[i].Type.Equals("PUNCT")?"":SignWord[i].word);
				//  else 
                //result += (SignWord[i].Type.Equals("PUNCT")?"":" + " + SignWord[i].word);// + "("+ SignWord[i].Type + ")";
			}
        }
		
		if (! FinalState )
        {
            result = "";
            for (i = 0; i < SignWord.Count; i++)
            {
                				
				if (i==0) result += (SignWord[i].Type.Equals("PUNCT")?"":SignWord[i].word );//+ "("+ SignWord[i].Type + ")");
				  else 
                result += (SignWord[i].Type.Equals("PUNCT")?"":" + " + SignWord[i].word );//+ "("+ SignWord[i].Type + ")");
            }
        }
		
        return result;
    }
    /*----------------------------------------------------------------------------------*/

    public string Get_Type(string word)
    {
        int pdest;
        string result = "OTHER"; 
        // SOLUTION 1: كِتاب [kitAb_1] كِتاب NOUN // SOLUTION 1: الطَهارَة [TahArap_1] ال DET طَهار NOUN َة NSUFF_FEM_SG 
        pdest = word.IndexOf("CONJ");                if (pdest != -1) result = "C";
        pdest = word.IndexOf("PREP");                if (pdest != -1) result = "P";
        pdest = word.IndexOf("NOUN_PROP");
        if (pdest != -1) result = "NP";
        else
        {
          pdest = word.IndexOf("NOUN");              if (pdest != -1) result = "N";
        }
        pdest = word.IndexOf("VERB_IMPERFECT");      if (pdest != -1) result = "VIM";
        pdest = word.IndexOf("VERB_PERFECT");        if (pdest != -1) result = "VPE";
        pdest = word.IndexOf("VERB_PASSIVE");        if (pdest != -1) result = "VPA";
        pdest = word.IndexOf("INTERJ");              if (pdest != -1) result = "I";
        pdest = word.IndexOf("INTERROG_PART");       if (pdest != -1) result = "IP";
        pdest = word.IndexOf("REL_PRON");            if (pdest != -1) result = "RP";
        pdest = word.IndexOf("EXCEPT_PART");         if (pdest != -1) result = "EP";
        pdest = word.IndexOf("FUNC_WORD");           if (pdest != -1) result = "FW"; //أن -  قد  -  إن
        pdest = word.IndexOf("PRON_1S");             if (pdest != -1) result = "P1S";
        pdest = word.IndexOf("NEG_PART");            if (pdest != -1) result = "NEG";
        pdest = word.IndexOf("PLF");
        if (pdest != -1) result = "PLF";
        else
        {
            pdest = word.IndexOf("PL");              if (pdest != -1) result = "PL";
        }
        pdest = word.IndexOf("NOT FOUND");           if (pdest != -1) result = "NOT FOUND" ;
        pdest = word.IndexOf("ADJ");                 if (pdest != -1) result = "ADJ";
        pdest = word.IndexOf("ADV");                 if (pdest != -1) result = "ADV";        
        return result;
    }
    /*--------------------------------------------------------------------------------*/

	
	
	
    //****************************************************************************************************//
    // Function OnLIT (OnA2sl old name)																	  //
    // the input file : Morphar.txt																		  //
    // the output file: A2SL.txt																		  //
    // the working directory : c:\\temp\\																  //
    //																									  //
    // if you want to use an argument as input in the command prompt:									  //
    //   1)uncomment the declaration of "OnLIT" function with argv[1], pls do the same in the "LIT.h"	  //										  //
    //   2)uncomment the line : streaming the entry of file "strFileName"								  //
    // you can change the working directory to the current directory (the exe program directory )		  //
    // for both input and/or outfile.																	  //
    //****************************************************************************************************//

    public void OnLIT(string path, string sessionid)
    {
        //SOLUTION  : المُسْلِمُونَ [musolim_1] ال DET مُسْلِم NOUN ُونَ NSUFF_MASC_PL_NOM 
        //.(PUNCT)
        string Word, Previous_Word, Result_Translation, Str_File, Str_Trans;
        string line;
        //unsigned pdest;
        int pdest;
        //inmt  result; 
        bool new_line = true;
        //char mot1[40] = "وامسحوا";
        string mot1 = "وامسحوا";
        Word = string.Empty;
        Str_File = "";
        Str_Trans = "";
		string InputFile = path + "Morphar"+sessionid+".txt";
        string OutputFile = path + "A2SL"+sessionid+".txt";

		string OutputFileNew = path + "A2SLNew.txt";
        List<Signword> SignWord = new List<Signword>();

        if (!File.Exists(InputFile))
        {
            Console.WriteLine("Erreur : Ouverture impossible du fichier à traiter : {0} does not exist!", InputFile);
            return;
        }
        FileStream fsIn = new FileStream(InputFile, FileMode.Open, FileAccess.Read, FileShare.Read);
        // Create an instance of StreamReader that can read
        // characters from the FileStream.
        using (StreamReader sr = new StreamReader(fsIn, Encoding.GetEncoding(1256)))
        {           
			SignWord.Clear();
            // While not at the end of the file, read lines from the file.
            while (sr.Peek() > -1)
            {
                line = sr.ReadLine();
                //getline(fent, line);
                //line.append(1,'\n');
                pdest = line.IndexOf("INPUT : ");
                //cout << "A2SL Buffer : " << line << " Serch Input " << pdest <<" Vs " << -1 << endl;
                if (pdest != -1)
                {
                    //result = pdest - buffer1 + 6; //fprintf(fout,"[");
                    //Word.clear();
                    Word = string.Empty;
                    //while (buffer1[++result]!='\n') Word+=buffer1[result];
                    //Word = line.substr(8, line.length()); // before 6  with ':'
                    Word = line.Substring(8, line.Length - 8); // before 6  with ':'
                                                               //fprintf(fout,"%c",buffer1[result]);}	fprintf(fout,"]");

                }

                //int group_part=Check_Part_Group(Word);

                pdest = line.IndexOf("SOLUTION");
                if (pdest != -1)
                {
                    //cout <<"Here 242!!! BF" <<endl;
                    //char* tt = strdup(line.c_str());
                    string tt = line;// strdup(line.c_str());
                    //cout <<"Here 242!!!" <<tt<<endl;
                    Result_Translation = Translate(tt, Word);
                    if (new_line) new_line = false;
                    else { if (Result_Translation.Length==0) ; else Str_File +=" + "; }
                    Str_File += Result_Translation;
					if (Result_Translation.Length>0)
					{
						Signword SW = new Signword();
						SW.word = Result_Translation;
						SW.Type = Get_Type(tt);
						SignWord.Add(SW);
					}
                }
                pdest = line.IndexOf("PUNCT");
                if (pdest != -1) 
				{ 
					//"\n"
                    Signword SW = new Signword();
                    SW.word = line.ElementAt(0).ToString();
                    SW.Type = "PUNCT";
                    SignWord.Add(SW);
                    Str_File += Environment.NewLine; new_line = true;
                    Str_Trans += VerifyTransRules(SignWord);
                    Str_Trans += Environment.NewLine;
                    SignWord.Clear();
				} 

                pdest = line.IndexOf("NOT FOUND");
                if (pdest != -1)
                {
                    int index = Check_Stop_Word(Word);
                    if (index != -1) 
					{
						Str_File+= " + " + stop_word_out[index];
						Signword SW = new Signword();
						SW.word = stop_word_out[index];
						SW.Type = "NOT FOUND";
						SignWord.Add(SW);                  
					}
					
                }
                //Console.WriteLine(input);
            }

            if (File.Exists(OutputFile))
                    File.Delete(OutputFile);
            
            //File.WriteAllText(OutputFile, Str_File, Encoding.GetEncoding(1256));
            File.WriteAllText(OutputFile, Str_Trans, Encoding.GetEncoding(1256));
            if (File.Exists(OutputFileNew))
					File.Delete(OutputFileNew);

            //File.WriteAllText(OutputFileNew, Str_Trans, Encoding.GetEncoding(1256));
			File.WriteAllText(OutputFileNew, Str_File, Encoding.GetEncoding(1256));
			sr.Close();
        }

    }
    //void LIT::OnLIT(string strFileName);
    /*--------------------------------------------------------------------------------*/
    private void WriteToFile(string outputfile, string a_variable)
    {
        //StreamWriter sw = new StreamWriter(outputfile);
        using (StreamWriter sw = File.AppendText(outputfile))
        {
            sw.Write(a_variable);
        }            
    }
}






