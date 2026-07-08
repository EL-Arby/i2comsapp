// MorpharV2.cpp : Defines the exported functions for the DLL application.
//
// Morphar.cpp : Defines the entry point for the console application.
//
//****************************************************************************//
//  NOM :  Morphar.cpp							 						      //
//  Corps du programme principal											  //
//  Copyrigth Z. Zemirli, 2010; A. Abdelali + K. Ayadi + Y. Elhadj, 2013      //
//****************************************************************************//
//  DESCRIPTION                                                               //
//  Arabic morphological analyzer											  //
//****************************************************************************//
//  ADMINISTRATION   Zouhir ZEMIRLI    |V1.0    |                             //
//  Date de Creation du Fichier		   |21.10.10|							  //
//  Date de derniere Modiffication	   |24.02.13|  AA                         //
//  Date de derniere Modiffication	   |20.03.13|   KA + YE                   //
//****************************************************************************//

using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.IO;
using System.Text;

/// <summary>
/// Summary description for Morphar
/// </summary>
public class Morphar
{

    string buffer1;
    static int res = 0;
    static int i;
    static bool init = false;
    static bool morphar = false;
    static char[] sav_nomf = new char[100];//100

    static char[] sav_nom_fent = new char[100];//100

    static int pos;
    static int pauses_v;
    static bool done;
    const int size_buf = 300;

    static char[] separateurs = { ' ',',','!','\'','&','-','_','^','$','.','+','=',
'*',':','/',')','\"','(','؟','،','\\','؛',';','{','}','1','2','3','4','5','6','7','8','9','0' };

    static string m_strFileName, m_StrPathName;
    //const char * m_strFileName, m_StrPathName;

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
    //#define NBP 42
    const int NBP = 42;
    static string[] Scheme_Broken_Plural = {
    "أَفْعُل","أَفْعال","أَفْعِلَة","فِعْلَة","فُعْل","فُعُل","فُعَل","فِعَل","فُعلَة","فَعَلة","فَعالا","فعاليّ",
    "فَاعَة", "فَعْلَى","فِعَلَة","فُعَّل","فِعال","فُعُول","فِعْلان","فُعْلان","فُعَلاء","أَفْعِلاء","فَعالِل",
    "فَعالِيل","أَفاعِل","أَفاعيل","تَفاعِل","تَفاعيل","مَفاعِل","مَفاعيل","يَفاعِل","يفاعيل","فواعل",
    "فواعيل","فياعل","فياعيل","فعائل","فَعالَى","فُعالَي","فُعالَى","فَعالَي","فَعاليّ" };

    static char[,] Buck_To_Arabic = new char[45, 2] {
    { '\'','ء' },{ '|','آ' },{ '>','أ' },{ '&','ؤ' },{ '<','إ' },{ '}','ئ' },{ 'A','ا' },{ 'b','ب' },{ 'p','ة' },
    { 't','ت' },{ 'v','ث' },{ 'j','ج' },{ 'H','ح' },{ 'x','خ' },{ 'd','د' },{ '*','ذ' },{ 'r','ر' },{ 'z','ز' },
    { 's','س' },{ '$','ش' },{ 'S','ص' },{ 'D','ض' },{ 'T','ط' },{ 'Z','ظ' },{ 'E','ع' },{ 'g','غ' },{ '_','ـ' },
    { 'f','ف' },{ 'q','ق' },{ 'k','ك' },{ 'l','ل' },{ 'm','م' },{ 'n','ن' },{ 'h','ه' },{ 'w','و' },{ 'Y','ى' },
    { 'y','ي' },{ 'F','ً' },{ 'N','ٌ' },{ 'K','ٍ' },{ 'a','َ' },{ 'u','ُ' },{ 'i','ِ' },{ '~','ّ' },{ 'o','ْ' } };
    //Length 11, 34, 20 (Adding empty element to get 34 element in the row)
    static string[,] Part_Group = new string[11, 34] {
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


    public Morphar()
    {
    }

/*--------------------------------------------------------------------------------*/
bool Ponctuation(string c) // REVIEW
{
    string separ = "?؛؟.,،:!";
    if ((separ.IndexOf(c) != -1)) return true;
    else return false;
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
int Check_Part_Group(string Word)
{
    int pdest; int i, j;
    int[] IMG = new int[11] { 3, 11, 6, 24, 6, 9, 10, 6, 34, 10, 2 };
    for (i = 0; i < 11; i++)
    {

        for (j = 0; j < IMG[i]; j++)
        {
            pdest = Word.IndexOf(Part_Group[i,j]);
            if (pdest != -1) return i;
        }
    }
    return -1;
}
/*----------------------------------------------------------------------------------------------------------*/
void Extract_solutions(string path, string sessionid)
{
    //AfxMessageBox("Extracting Solutions...");
    bool solution; int pdest; int result;
    string Word, Stem, SolutionContent;
    int group_part, Counter_group_part = 0, Count_Word = 0;

        //ofstream ftemp("e:\\hostingspaces\\yelhadj\\a2arsl.ariscom.org\\wwwroot\\temp\\Solutions.txt");
        //while (!feof(fent))
        //{
        //fgets(buffer1,size_buf,fent); 

        string InputFile = path +"Arabic_Outfile"+sessionid+".txt";
        string OutputFile = path + "Solutions"+sessionid+".txt";
        if (!File.Exists(InputFile))
        {
            Console.WriteLine("Erreur : Ouverture impossible du fichier à traiter : {0} ", InputFile);
            return;
        }
        if (File.Exists(OutputFile))
            File.Delete(OutputFile);
        FileStream fsIn = new FileStream(InputFile, FileMode.Open, FileAccess.Read, FileShare.Read);
        // Create an instance of StreamReader that can read
        // characters from the FileStream.
	SolutionContent = string.Empty;
        using (StreamReader sr = new StreamReader(fsIn, Encoding.GetEncoding(1256)))
        {
            // While not at the end of the file, read lines from the file.
            while (sr.Peek() > -1)
            {
                buffer1 = sr.ReadLine();
                //buffer1 += Environment.NewLine;
                pdest = buffer1.IndexOf("PUNCT");
                if (pdest != -1) 
		{ 
		    SolutionContent += Environment.NewLine + ".";//WriteToFile(OutputFile, Environment.NewLine + "."); 
		    continue; 
		}

                pdest = buffer1.IndexOf("INPUT");
                if (pdest != -1)
                {
                    Word = string.Empty;  //sprintf(message,buffer1); AfxMessageBox(message);
                                          //result = pdest - buffer1 + 14;
                                          //while (buffer1[result]!='\n') Word+=buffer1[result++];
                    Word = buffer1.Substring(14, buffer1.Length - 14);
                    SolutionContent += Environment.NewLine + Word + "\t"; //WriteToFile(OutputFile, Environment.NewLine + Word + "\t"); 
		    Count_Word++;
                    //***************************************************************************************
                    group_part = Check_Part_Group(Word);
                    if (group_part != -1) Counter_group_part++;
                    //***************************************************************************************
                    solution = true;
                    //fgets(buffer1,size_buf,fent); // skip LOOK-UP WORD outfile.txt  Skip blank line in Arabic_Outfile.txt
                    //getline(fent, buffer1);
                    buffer1 = sr.ReadLine();
                    while ((sr.Peek() > -1) && (solution))
                    {
                        //fgets(buffer1,size_buf,fent);
                        //getline(fent, buffer1);
                        buffer1 = sr.ReadLine();
                        pdest = buffer1.IndexOf("SOLUTION");
                        if (pdest != -1)
                        {  // SOLUTION 1: كِتاب [kitAb_1] كِتاب NOUN // SOLUTION 1: الطَهارَة [TahArap_1] ال DET طَهار NOUN َة NSUFF_FEM_SG 

                            pdest = buffer1.IndexOf("CONJ"); if (pdest != -1) SolutionContent += "C+";//WriteToFile(OutputFile, "C+");
                            pdest = buffer1.IndexOf("PREP");
                            if (pdest != -1)
                            {
                                //result = pdest - buffer1 + 1; // test isolated preposition
                                result = pdest + 1;
                                if (buffer1.Length <= (result + 4)) 
					SolutionContent += "Prep";//WriteToFile(OutputFile, "Prep"); 
				else 
					SolutionContent += "Prep+";//WriteToFile(OutputFile, "Prep+");
                                //if(buffer1[result+4]=='\n') ftemp<<"Prep";	else	ftemp<<"Prep+";
                            }
                            pdest = buffer1.IndexOf("NOUN_PROP");
                            if (pdest != -1)
                            {
                                Stem = string.Empty;
                                SolutionContent += "NP";//WriteToFile(OutputFile, "NP");
                                //result = pdest - buffer1 -2;
                                result = pdest - 2;
                                while (buffer1[result] != ' ') result--;
                                while (buffer1[++result] != ' ') Stem += buffer1[result];
                                pdest = buffer1.IndexOf("NSUFF_FEM_SG");
                                if (pdest != -1) { Stem += 'َ'; Stem += 'ة'; }
                                if (Stem[0] == 'ِ')
                                {
                                    //Stem.Delete(0,1);
                                    //Stem.Insert(0,'إ');
                                    //Stem[0] = 'إ';
                                    Stem = 'إ' + Stem.Substring(1, Stem.Length - 1);
                                }
                                SolutionContent += "(" + Stem + ")";//WriteToFile(OutputFile, "(" + Stem + ")");
                            }
                            else
                            {
                                pdest = buffer1.IndexOf("NOUN");
                                if (pdest != -1)
                                {
                                    Stem = string.Empty;
                                    SolutionContent += "N";//WriteToFile(OutputFile, "N");//<<buffer1;
                                                                 //result = pdest - buffer1 -2;
                                    result = pdest - 2;
                                    while (buffer1[result] != ' ') result--;
                                    while (buffer1[++result] != ' ') Stem += buffer1[result];
                                    pdest = buffer1.IndexOf("NSUFF_FEM_SG");
                                    if (pdest != -1) { Stem += 'َ'; Stem += 'ة'; }
                                    if (Stem[0] == 'ِ')
                                    {
                                        //Stem.Delete(0,1);
                                        //Stem.Insert(0,'إ');
                                        //Stem[0] = 'إ';
                                        Stem = 'إ' + Stem.Substring(1, Stem.Length - 1);
                                    }
                                    SolutionContent += "(" + Stem + ")";//WriteToFile(OutputFile, "(" + Stem + ")");
                                }
                            }

                            pdest = buffer1.IndexOf("VERB_IMPERFECT"); if (pdest != -1) SolutionContent += "VI";//WriteToFile(OutputFile, "VI");
                            pdest = buffer1.IndexOf("VERB_PERFECT"); if (pdest != -1) SolutionContent += "VP";//WriteToFile(OutputFile, "VP");
                            pdest = buffer1.IndexOf("INTERJ"); if (pdest != -1) SolutionContent += "I";//WriteToFile(OutputFile, "I");
                            pdest = buffer1.IndexOf("INTERROG_PART"); if (pdest != -1) SolutionContent += "IP";//WriteToFile(OutputFile, "IP");
                            pdest = buffer1.IndexOf("REL_PRON"); if (pdest != -1) SolutionContent += "RP";//WriteToFile(OutputFile, "RP");
                            pdest = buffer1.IndexOf("FUNC_WORD"); if (pdest != -1) SolutionContent += "FW";//WriteToFile(OutputFile, "FW"); //أن -  قد  -  إن
                            pdest = buffer1.IndexOf("PRON_1S"); if (pdest != -1) SolutionContent += "P1S";//WriteToFile(OutputFile, "P1S");
                            pdest = buffer1.IndexOf("NEG_PART"); if (pdest != -1) SolutionContent += "NEG_PART";//WriteToFile(OutputFile, "NEG_PART");
                            //fgets(buffer1,size_buf,fent); // Read GLOSS
                            //getline(fent, buffer1);
                            buffer1 = sr.ReadLine();
                            pdest = buffer1.IndexOf("PL"); if (pdest != -1) SolutionContent += "+(PL)";//WriteToFile(OutputFile, "+(PL)");
                            SolutionContent += "-";//WriteToFile(OutputFile, "-");
                        }
                        else solution = false;
                    }

                }
                pdest = buffer1.IndexOf("NOT FOUND");
                if (pdest != -1) SolutionContent += "NOT FOUND" + Environment.NewLine;//WriteToFile(OutputFile, "NOT FOUND" + Environment.NewLine);
            }
	    File.WriteAllText(OutputFile, SolutionContent, Encoding.GetEncoding(1256));
            sr.Close();
        }

       
    //sprintf(message,"Count_Word=%d\tCount_Group_Part=%d",Count_Word,Counter_group_part); AfxMessageBox(message); 
}
/*--------------------------------------------------------------------------------*/

/*---------------------------------------------------------------------------
strsch est une Fonction de comparaison (Mot avec schème)
Elle retourne la racine si le mot peut coller dans le schème sinon le mot
vide est retourné.
Ex: si on fourni le mot=مَدَارِسٌ  et schème=مَفَاعِلٌ
alors elle nous retourne la racine درس.
/*---------------------------------------------------------------------------*/
bool strsch(string mot, string scheme)
{
    int i, lm = mot.Length, ls = scheme.Length;
    //for (i=0;i<lm;i++) {	sprintf(message,"%c - %c",mot[i],scheme[i]); AfxMessageBox(message); }	//exit(1);
    //sprintf(message,"%s\n%s\nlm=%d - ls=%d",mot,scheme,lm,ls); AfxMessageBox(message); 
    i = 0;
    if (lm == ls)
    {
        while (i < lm)
        {
            //sprintf(message,"%s\n%s\nmot[%i]=%c\tscheme[%i]=%c",mot, scheme,i,mot[i],i,scheme[i]); AfxMessageBox(message); 
            if (mot.ElementAt(i) != scheme.ElementAt(i))
            {
                if ((scheme.ElementAt(i) == 'ف') || (scheme.ElementAt(i) == 'ع') || (scheme.ElementAt(i) == 'ل')) ;
                else return false;
            }
            i++;           // تَفاعِل    تَجارِب 
        }
        //sprintf(message,"FOUND"); AfxMessageBox(message); 
        return true;
    }
    else return false;
}


int verif_scheme_broken_plural(string Word)
{
    for (int i = 0; i < NBP ; i++)
    {
        //sprintf(message,"mot a verifier=%s\tScheme a Verifer=%s",Word,Scheme_Broken_Plural[i]); AfxMessageBox(message);
        if (strsch(Word, Scheme_Broken_Plural[i])) return i;
    }
    return -1;
}

    /*string replace_str(string str, string orig, string rep)
    {
        char[] buffer = new char[4096];
        string p;

        if (!(p = strstr(str, orig)))  // Is 'orig' even in 'str'?
            return str;
        strncpy(buffer, str, p - str); // Copy characters from 'str' start to 'orig' st$
        buffer[p - str] = '\0';
        sprintf(buffer + (p - str), "%s%s", rep, p + strlen(orig));
        return buffer;
    }*/

    // SOLUTION 1: (Almusolimuwna) [musolim_1] Al/DET+musolim/NOUN+uwna/NSUFF_MASC_PL_NOM
    // SOLUTION  : المُسْلِمُونَ [musolim_1] ال DET مُسْلِم NOUN ُونَ NSUFF_MASC_PL_NOM 
    //void extract_solution(string xftemp, string xbuffer)
    string extract_solution(string xbuffer)
    {
    int i, l, j, k, nb_token = 1; bool first_line = true; //char NUM[2];
    string result;
        result = string.Empty;
        //xftemp << "OF: "<< xbuffer << endl;
    l = xbuffer.Length;
        for (i = 0; i < l; i++)
            if ((xbuffer.ElementAt(i) == '/') || (xbuffer.ElementAt(i) == '+') || (xbuffer.ElementAt(i) == '\n'))
            {
                xbuffer = xbuffer.Remove(i, 1);
                xbuffer = xbuffer.Insert(i, " ");
                //xbuffer[i] = ' ';
            }
     
     /*xbuffer.Replace('/', ' ');
     xbuffer.Replace('+', ' ');
     xbuffer.Replace('\n', ' ');
     */
        //xbuffer.replace(i,1,1,' '); 
        //xftemp << "BF: "<< xbuffer << endl;


        //string tokenPtr;
        //string dup = strdup(xbuffer.c_str());
    //    string filename = xftemp;
    string dup = xbuffer+'\0';
        dup = dup.Trim();
    //tokenPtr = strtok(dup, " ");
    string[] tokens = dup.Split(new char[]{' '});

    foreach (string tokenPtr in tokens)
    {
        l = tokenPtr.Length;
            for (i = 0; i < l; i++)
                if ((nb_token == 1) || ((nb_token > 1) && (nb_token % 2 == 0)))
                    result += tokenPtr[i].ToString();// WriteToFile(filename, tokenPtr[i].ToString());
            else
            {
                j = 0;
                if (nb_token == 3) while (tokenPtr[j++] != ')')
                    {
                        for (i = 0; i < 45; i++)
                            if (tokenPtr[j] == Buck_To_Arabic[i,0])
                            {
                                    result += Buck_To_Arabic[i, 1].ToString();// WriteToFile(filename, Buck_To_Arabic[i,1].ToString());
                                break;
                            }
                    }
                else
                {
                    for (i = 0; i < l; i++)
                    {
                        for (k = 0; k < 45; k++)
                            if (tokenPtr[i] == Buck_To_Arabic[k,0])
                            {
                                    result += Buck_To_Arabic[k, 1].ToString();// WriteToFile(filename, Buck_To_Arabic[k,1].ToString());
                                break;
                            }
                    }
                }

            }
            result += " ";// WriteToFile(filename, " ");
       nb_token++;
        //tokenPtr = strtok(NULL, " ");  // get next token 
                                       //AfxMessageBox(tokenPtr);
    }
        return result;
}


/////////////////////////////////////////////////////////////////////////////
//****************************************************************************************************//
// Function OnArabic																				  //
// the input file : outfile.txt																		  //
// the output file: Arabic_Outfile.txt - not_found.txt												  //
// the working directory : c:\\temp\\																  //
//																									  //
// if you want to use an argument as input in the command prompt:									  //
//   1)uncomment the declaration of "OnMorphar" function with argv[1], pls do the same in the "Morphar.h"	  //										  //
//   2)uncomment the line : streaming the entry of file without the working directory c:\\temp\\	  //
// you can change the working directory to the current directory (the exe program directory )		  //
// for both input and/or outfile.																	  //
//****************************************************************************************************//

void OnArabic(string path, string sessionid)
{
    int i, j, total_solution = 0;
    int pdest;
    int non;
    string Word, car, Filecontent, FileNFcontent;


        //ofstream ftemp("outfile.ara");
        //ofstream ftemp("c:\\temp\\Arabic_Outfile.txt");
        //ofstream ftemp("e:\\hostingspaces\\yelhadj\\a2arsl.ariscom.org\\wwwroot\\temp\\Arabic_Outfile.txt");
        Filecontent = string.Empty;
        FileNFcontent = string.Empty;
        string InputFile = path + "outfile"+sessionid+".txt";
        string OutputFile = path +"Arabic_Outfile"+sessionid+".txt";
        string OutputFileNF = path + "not_found.txt";
        if (!File.Exists(InputFile))
        {
            Console.WriteLine("Erreur : Ouverture impossible du fichier à traiter : {0} ", InputFile);
            return;
        }
        if (File.Exists(OutputFile))
            File.Delete(OutputFile);
        if (File.Exists(OutputFileNF))
            File.Delete(OutputFileNF);
        car = string.Empty;
        FileStream fsIn = new FileStream(InputFile, FileMode.Open, FileAccess.Read, FileShare.Read);
        // Create an instance of StreamReader that can read
        // characters from the FileStream.
        using (StreamReader sr = new StreamReader(fsIn, Encoding.GetEncoding(1256)))
        {
            // While not at the end of the file, read lines from the file.
            while (sr.Peek() > -1)
            {
                buffer1 = sr.ReadLine();
                buffer1 += Environment.NewLine;
                pdest = buffer1.IndexOf("INPUT");
                if (pdest != -1)
                {
                    non = buffer1.IndexOf("Alphabetic");
                    if (non == -1) Filecontent += Environment.NewLine + buffer1 + Environment.NewLine;//WriteToFile(OutputFile, Environment.NewLine + buffer1 + Environment.NewLine);
                    else
                    {
                        car = buffer1.ElementAt(14).ToString();
                        //cout << "byffer1 = "<< buffer1 << endl;
                        //cout << "car = "<< car << endl;
                        //sprintf(message,"car = %s",car); AfxMessageBox(message);
                        if (Ponctuation(car)) Filecontent += Environment.NewLine + car + "(PUNCT)" + Environment.NewLine;// WriteToFile(OutputFile, "\n" + car + "(PUNCT)" + Environment.NewLine);
                        car = string.Empty;
                    }
                }
                else
                {
                    pdest = buffer1.IndexOf("SOLUTION");
                    if (pdest != -1)
                    {
                        //extract_solution(OutputFile, buffer1);
                       Filecontent += extract_solution(buffer1);
                        total_solution++;
                    }
                    else
                    {
                        pdest = buffer1.IndexOf("GLOSS");
                        if (pdest != -1) Filecontent += Environment.NewLine + buffer1;// WriteToFile(OutputFile, Environment.NewLine + buffer1);
                    }
                }
                pdest = buffer1.IndexOf("NOT FOUND"); //      Comment: sHrp NOT FOUND
                if (pdest != -1)
                {
                    i = 0;
                    while (buffer1.ElementAt(i) != ':') i++; i += 2;
                    while (buffer1.ElementAt(i) != ' ')
                    {
                        for (j = 0; j < 45; j++)
                            if (buffer1.ElementAt(i) == Buck_To_Arabic[j,0])
                            {
                                Filecontent += Buck_To_Arabic[j, 1].ToString();// WriteToFile(OutputFile, Buck_To_Arabic[j,1].ToString());
                                break;
                            }
                        i++;
                    }
                    FileNFcontent += Environment.NewLine;// WriteToFile(OutputFileNF, Environment.NewLine);
                    Filecontent += "NOT FOUND" + Environment.NewLine;// WriteToFile(OutputFile, "NOT FOUND"+ Environment.NewLine);
                }
            }
            File.WriteAllText(OutputFile, Filecontent, Encoding.GetEncoding(1256));
            File.WriteAllText(OutputFileNF, FileNFcontent, Encoding.GetEncoding(1256));
            sr.Close();
        }

        //sprintf(message,"Total Solution = %i",total_solution); AfxMessageBox(message);


    }

/*
void OnMorpharBama(string fileTitle)
{
    const char szFilters[] =
        "Fichiers textes (*.txt)|*.txt|Fichiers LAT (*.LAT)|*.LAT|Tous fichiers (*.*)|*.*||";
    char* nom_fent = "\0";

    m_strFileName = fileTitle;
    ifstream fent(m_strFileName.c_str());
    //strcpy(nom_fent,m_strFileName.c_str());
    if (!fent.is_open())
    {
        cout << "Erreur : Ouverture impossible du fichier à traiter : " << nom_fent << endl;
        //MessageBox(NULL,message,entete,MB_ICONSTOP);
        exit(1);
    }
    ofstream ftemp("infile.txt");
    while (fent.good())
    {
        getline(fent, buffer1);
        ftemp << buffer1;
    }
    fent.close();
    ftemp.close();
    system("perl aramorph.pl < infile.txt > outfile.txt ");
    //AfxMessageBox("End of process...",MB_OK);
}
*/

//******************************************************************************************************//
// Function OnMORPHARBAMADicV2																		    //
// the input file : any file copied in infile.txt													    //
// the output file: outfile.txt																		    //
// the working directory : c:\\temp\\																    //
//																									    //
// you can change the working directory to the current directory (the exe program directory )		    //
// for both input and/or outfile:																	    //
//   uncomment the line : streaming the entry of file (In\Out) without the working directory c:\\temp\\ //
//******************************************************************************************************//
/*
void OnMORPHARBAMADicV2(string fileTitle)
{
    const char szFilters[] =
        "Fichiers textes (*.txt)|*.txt|Fichiers LAT (*.LAT)|*.LAT|Tous fichiers (*.*)|*.*||";
    char* nom_fent = "\0";

    m_strFileName = fileTitle;
    //strcpy(nom_fent,m_strFileName.c_str());
    ifstream fent(m_strFileName.c_str());//ifstream fent(m_strFileName); before
    if (!fent.is_open())
    {
        cout << "Erreur : Ouverture impossible du fichier à traiter : " << nom_fent << endl;
        exit(1);
    }
    //ofstream ftemp("infile.txt");
    ofstream ftemp("c:\\temp\\infile.txt");
    while (fent.good())
    {
        getline(fent, buffer1);
        ftemp << buffer1;
        if (fent.good()) ftemp << "\n";
    }
    fent.close();
    ftemp.close();
    //system("perl aramorph_dic_v2.pl < infile.txt > outfile.txt " );
    system("perl aramorph_dic_v2.pl < c:\\temp\\infile.txt > c:\\temp\\outfile.txt ");
}
*/
//******************************************************************************************************//
// Function OnApostV2																					//
// the input file : Arabic_Outfile.txt																	//
// the output file: Morphar.txt																		    //
// the working directory : c:\\temp\\																    //
//																									    //
// you can change the working directory to the current directory (the exe program directory )		    //
// for both input and/or outfile:																	    //
//   uncomment the line : streaming the entry of file (In\Out) without the working directory c:\\temp\\ //
//******************************************************************************************************//

void OnApostV2(string path, string sessionid)
{
    Extract_solutions(path, sessionid);
    int count_NF = 0, NBS = 1, NB_Solution=0;
    bool solution1 = false;
    string Word, Stem, Previous_Word, FileContent;
    Previous_Word = string.Empty;
    FileContent = string.Empty;
    Stem = string.Empty;
        //ifstream fent("Arabic_Outfile.txt");    
        //ofstream ftemp("Morphar.txt");

        //string InputFile = "c:\\temp\\Arabic_Outfile.txt";
        //string OutputFile = "c:\\temp\\Morphar.txt";
        //string InputFile = "e:\\hostingspaces\\yelhadj\\a2arsl.ariscom.org\\wwwroot\\temp\\Arabic_Outfile.txt";
        //string OutputFile = "e:\\hostingspaces\\yelhadj\\a2arsl.ariscom.org\\wwwroot\\temp\\Morphar.txt";
    string InputFile = path + "Arabic_Outfile"+sessionid+".txt";
    string OutputFile = path + "Morphar"+sessionid+".txt";
    if (!File.Exists(InputFile))
        {
            Console.WriteLine("Erreur : Ouverture impossible du fichier à traiter : {0} ", InputFile);
            return;
        }
    if (File.Exists(OutputFile))
            File.Delete(OutputFile);
        
    FileStream fsIn = new FileStream(InputFile, FileMode.Open, FileAccess.Read, FileShare.Read);
        // Create an instance of StreamReader that can read
        // characters from the FileStream.
        using (StreamReader sr = new StreamReader(fsIn, Encoding.GetEncoding(1256)))
        {
            // While not at the end of the file, read lines from the file.
            while (sr.Peek() > -1)
            {
                buffer1 = sr.ReadLine();
                buffer1 += Environment.NewLine;
                int pdest; int result;
                pdest = buffer1.IndexOf("INPUT");
                if (pdest != -1)
                {
                    Word = string.Empty;
                    NB_Solution = 0;
                    //result = pdest - buffer1.length() + 14;
                    Word = buffer1.Substring(14, buffer1.Length - 14);
                    //while (buffer1[result]!='\n') Word+=buffer1[result++];
                    //WriteToFile(OutputFile, Environment.NewLine + "INPUT : " + Word + "");
                    FileContent += Environment.NewLine + "INPUT : " + Word + "";
                }
                pdest = buffer1.IndexOf("NOT FOUND");
                if (pdest != -1)//WriteToFile(OutputFile, "NOT FOUND" + Environment.NewLine);
                    FileContent += "NOT FOUND" + Environment.NewLine;
                //fprintf(ftemp,"NOT FOUND\n", buffer1);

                pdest = buffer1.IndexOf("GLOSS");
                if ((pdest != -1) && (solution1))
                {
                    solution1 = false;
                    int p;
                    p = buffer1.IndexOf("(PLF)");
                    if (p != -1)
                    {
                        int index = verif_scheme_broken_plural(Stem);
                        if (index != -1)
                        {
                            //ftemp.seekp(-2, SEEK_CUR); WriteToFile(OutputFile, " -PLF- " + Environment.NewLine);
                            //WriteToFile(OutputFile, "Stem : (" + Stem + ") جمع تكسير علي وزن ");
                            //WriteToFile(OutputFile, Scheme_Broken_Plural[index] + " \n");
                            FileContent = FileContent.Substring(0, FileContent.Length - 2);
                            FileContent += " -PLF- " + Environment.NewLine;
                            FileContent += "Stem : (" + Stem + ") جمع تكسير علي وزن ";
                            FileContent += Scheme_Broken_Plural[index] + " " + Environment.NewLine;
                        }
                        else //WriteToFile(OutputFile, "(" + Stem + ") جمع تكسير؟" + Environment.NewLine);
                            FileContent += "(" + Stem + ") جمع تكسير؟" + Environment.NewLine;
                    }
                    p = buffer1.IndexOf("(PL)");
                    if (p != -1)
                    {
                        int index = verif_scheme_broken_plural(Stem);
                        if (index != -1)
                        {
                            //ftemp.seekp(-2, SEEK_CUR); WriteToFile(OutputFile, " -PL- "+ Environment.NewLine);
                            //WriteToFile(OutputFile, "Stem : (" + Stem + ") جمع تكسير علي وزن ");
                            //WriteToFile(OutputFile, Scheme_Broken_Plural[index] + " " + Environment.NewLine);
                            FileContent = FileContent.Substring(0, FileContent.Length - 2);
                            FileContent += " -PL- " + Environment.NewLine;
                            FileContent += "Stem : (" + Stem + ") جمع تكسير علي وزن ";
                            FileContent += Scheme_Broken_Plural[index] + " " + Environment.NewLine;
                        }
                        else //WriteToFile(OutputFile, "(" + Stem + ") جمع تكسير؟" + Environment.NewLine);
                            FileContent += "(" + Stem + ") جمع تكسير؟" + Environment.NewLine;
                    }

                }
                pdest = buffer1.IndexOf("SOLUTION 1");
                if (pdest != -1)
                {
                    NB_Solution++; Stem = string.Empty;
                    if (NB_Solution == 1)
                    {
                        buffer1.Remove(9, 1);
                        buffer1.Insert(9, " ");
                        //WriteToFile(OutputFile, buffer1);
                        FileContent += buffer1;
                        pdest = buffer1.IndexOf("NOUN");
                        if (pdest != -1)
                        {
                            result = pdest - 2;
                            while (buffer1.ElementAt(result) != ' ') result--;
                            while (buffer1.ElementAt(++result) != ' ') Stem += buffer1.ElementAt(result);
                            pdest = buffer1.IndexOf("NSUFF_FEM_SG");
                            if (pdest != -1) { Stem += 'َ'; Stem += 'ة'; }
                        }
                        solution1 = true;
                        Previous_Word = Stem;
                    }
                }
                pdest = buffer1.IndexOf("PUNCT");
                if (pdest != -1) FileContent += buffer1;//WriteToFile(OutputFile, buffer1);

            }
            File.WriteAllText(OutputFile, FileContent, Encoding.GetEncoding(1256));
            sr.Close();
        }
    
}


//void Morphar::OnMorphar(string fileTitle)
public void OnMorphar(string path, string sessionid)
{
    morphar = true;
    //OnMORPHARBAMADicV2(fileTitle);
    OnArabic(path, sessionid);
    OnApostV2(path, sessionid);
    morphar = false;
}

    /*--------------------------------------------------------------------------------*/
    private void WriteToFile(string outputfile, string a_variable)
    {
        //StreamWriter sw = new StreamWriter(outputfile);
        using (StreamWriter sw = File.AppendText(outputfile))
        {
            sw.Write(a_variable);
        }
    }

    /// <summary>
    /// Determines a text file's encoding by analyzing its byte order mark (BOM).
    /// Defaults to ASCII when detection of the text file's endianness fails.
    /// </summary>
    /// <param name="filename">The text file to analyze.</param>
    /// <returns>The detected encoding.</returns>
    public static Encoding GetEncodingNew(string filename)
    {
        // Read the BOM
        var bom = new byte[4];
        using (var file = new FileStream(filename, FileMode.Open, FileAccess.Read))
        {
            file.Read(bom, 0, 4);
        }

        // Analyze the BOM
        if (bom[0] == 0x2b && bom[1] == 0x2f && bom[2] == 0x76) return Encoding.UTF7;
        if (bom[0] == 0xef && bom[1] == 0xbb && bom[2] == 0xbf) return Encoding.UTF8;
        if (bom[0] == 0xff && bom[1] == 0xfe) return Encoding.Unicode; //UTF-16LE
        if (bom[0] == 0xfe && bom[1] == 0xff) return Encoding.BigEndianUnicode; //UTF-16BE
        if (bom[0] == 0 && bom[1] == 0 && bom[2] == 0xfe && bom[3] == 0xff) return Encoding.UTF32;
        return Encoding.ASCII;
    }



}