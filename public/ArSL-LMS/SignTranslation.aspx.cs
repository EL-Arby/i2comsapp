using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;

//using System.Windows.Forms;
using System.Diagnostics;
using System.Security.Permissions;

using System.IO;
using System.Text;
using Website.Data;

using MySql.Data;
using MySql.Data.MySqlClient;
using System.Runtime.InteropServices;


public partial class SignTranslation : System.Web.UI.Page
{

    string SignFileName="";
    protected void Page_Load(object sender, EventArgs e)
    {
		    if (!IsPostBack)
        {
     		Session["StrSigmlFiles"] = "";
			Session["StrInfo"] = "";
			Session["StrContent"] = "";
            //if (!Directory.Exists(@"c:\temp"))
            //    Directory.CreateDirectory(@"c:\temp");
        }
    }

    protected void page_UnLoad(object sender, EventArgs e)
    {
    }

    protected void WriteToFile(string fileName, string strContent)
    {
        try
        {
            if (File.Exists(fileName))
                File.Delete(fileName);
        }
        catch (Exception Ex)
        {
        }
        File.WriteAllText(fileName, strContent, Encoding.GetEncoding(1256));
        
    }

    void ART()
    {
        //writing the input file in the temp directory
        WriteToFile(ConfigurationSettings.AppSettings["FilePath"] + "inputfile1.txt", phrase.InnerHtml);
		//WriteToFile(ConfigurationSettings.AppSettings["AppPath"] + "\\temp\\inputfile.txt", phrase.InnerHtml);
        //  WriteToFile(Server.MapPath("/temp/")+ "inputfile.txt", phrase.InnerHtml);
     
    }

    void MORPHAR()
    {
	string path = "c:\\temp\\";
        //calling perl with aramorph_dic_v2
        System.Diagnostics.Process proc = new System.Diagnostics.Process();
        proc.StartInfo.FileName = @"C:\inetpub\wwwroot\bin\p.bat";
	//proc.StartInfo.FileName = Server.MapPath("/bin/")+"p1.bat";
        proc.StartInfo.RedirectStandardError = true;
        proc.StartInfo.RedirectStandardOutput = true;
        proc.StartInfo.UseShellExecute = false;
        //proc.StartInfo.WorkingDirectory = @"c:\inetpub\wwwroot\bin";
		proc.StartInfo.WorkingDirectory = Server.MapPath("/bin/");
        proc.StartInfo.WindowStyle = ProcessWindowStyle.Hidden;
        proc.Start();
        proc.WaitForExit();
        Label3.Text = " Running Perl  = Error =" + proc.StandardError.ReadToEnd();

        proc.WaitForExit();
        Label3.Text = " <br> Running Perl  = Output =" + proc.StandardOutput.ReadToEnd();
        proc.WaitForExit();

        /*MorpharClass Morpharcl = new MorpharClass();
        using (Morpharcl)
        {
            Morpharcl.OnMorphar();//ConfigurationSettings.AppSettings["FilePath"] + "inputfile.txt");
        }
		*/
		
	Morphar Morpharcl = new Morphar();
        Morpharcl.OnMorphar(path,"1");//ConfigurationSettings.AppSettings["FilePath"] + "inputfile.txt");
		
    }

    void LIT()
    {
	/*	
        //calling perl with aramorph_dic_v2
        System.Diagnostics.Process proc = new System.Diagnostics.Process();
        proc.StartInfo.FileName = @"C:\inetpub\wwwroot\bin\LitBatch.bat";
		//proc.StartInfo.FileName = Server.MapPath("/bin/")+"p1.bat";
        proc.StartInfo.RedirectStandardError = true;
        proc.StartInfo.RedirectStandardOutput = true;
        proc.StartInfo.UseShellExecute = false;
        //proc.StartInfo.WorkingDirectory = @"c:\inetpub\wwwroot\bin";
		proc.StartInfo.WorkingDirectory = Server.MapPath("/bin/");
        proc.StartInfo.WindowStyle = ProcessWindowStyle.Hidden;
        proc.Start();
        proc.WaitForExit();
        Label3.Text = " Running Lit  = Error =" + proc.StandardError.ReadToEnd();

        proc.WaitForExit();
        Label3.Text = " <br> Running Lit  = Output =" + proc.StandardOutput.ReadToEnd();
        proc.WaitForExit();
*/

		/*
		LITClass litcl = new  LITClass();
        using (litcl)
        {
            litcl.OnLIT();//ConfigurationSettings.AppSettings["FilePath"] + "outfile.pos");
        }
     */
	 
	    string path = "c:\\temp\\";
        Lit litcl = new Lit();
        litcl.OnLIT(path, "1");     
     
    }

    void SAR()
    {
        //Processing(phrase.InnerHtml);
        SARProcess(File.ReadAllText(ConfigurationSettings.AppSettings["FilePath"] + "A2SL1.txt", Encoding.GetEncoding(1256)));     
		//SARProcess(File.ReadAllText(Server.MapPath("/temp/")+ "A2SL.txt", Encoding.GetEncoding(1256)));
    }

    //[SecurityPermission(SecurityAction.Assert, Unrestricted = true)] 
    protected void Button1_Click(object sender, EventArgs e)
    {
        ART();

        MORPHAR();

        LIT();

        SAR();
     
    }
    
    protected void SARProcess(string Sphrase)
    {
        char[] SepPhrase = {'\n'};
        char[] SepPonc = {'.', '-', ',', '?', '!', ':', ';', '؟'};
        char[] SepToken = {'+'};
        string path = ConfigurationSettings.AppSettings["SignfolderPath"];// "C:\\Program Files\\eSIGN\\SiGMLSigning\\Files\\";

        string SigmlFile = "", strresult = "", strInfo = "", strContent="";
        string strHTML = "<table border=1 align=center> <tr> <td>م</td> <td> المحتوى العربي</td><td>الترجمة الإشارية </td><td> المحتوى الإشاري</td></tr>";
        string[] ArraySigmlFile;
        string[] ArrayPhrase;
        SigmlFile = Sphrase;
        ArraySigmlFile = SigmlFile.Split(SepPhrase);
        ArrayPhrase = phrase.Value.Split(SepPonc);
        string fileName = ConfigurationSettings.AppSettings["fileName"];
        string InfofileName = ConfigurationSettings.AppSettings["InfofileName"];
        int nbsentence = 0, nbWordFound=0, nbWordNF=0;
        for (int j = 0; j < ArraySigmlFile.Length; j++)
            if (ArraySigmlFile[j].Trim() != "") nbsentence++;
        string[] UniqueSentence = new string[nbsentence];
        for (int j = 0, k = 0; j < ArraySigmlFile.Length; j++)
        {

            ArraySigmlFile[j] = ArraySigmlFile[j].Trim();
            if (ArraySigmlFile[j] != "")
            {
                UniqueSentence[k] = ArraySigmlFile[j];
                k++;
            }
        }
        
		strContent+="<sigml> ";
        strresult = "";
        for (int i = 0; i < UniqueSentence.Length; i++)
        {
            //strHTML += "<tr><td>"+(i+1).ToString()+"</td><td>"+UniqueSentence[i].ToString()+"</td><td>";
            strHTML += "<tr><td>" + (i + 1).ToString() + "</td><td>" + ArrayPhrase[i].ToString() + "</td><td>" ;
            string[] UniqueWord;
            UniqueWord = UniqueSentence[i].Split(SepToken);
            
            for (int j = 0; j < UniqueWord.Length; j++)
            {
                UniqueWord[j] = UniqueWord[j].Trim();
                if (UniqueWord[j].StartsWith("(إش -") == true)
                    UniqueWord[j] = UniqueWord[j].Substring(6, UniqueWord[j].Length - 7);
                strHTML += UniqueWord[j].ToString();
                if ((j+1)< UniqueWord.Length) strHTML += " + ";
            }
            strHTML += "</td><td>";

            for (int j = 0; j < UniqueWord.Length; j++)
            {
                if (UniqueWord[j] != "")
                    if (VerifSignDataBase(UniqueWord[j]) == 1)
                    {
                        //strresult += path + UniqueWord[j] + ".sigml\r\n";
                        strresult += path + SignFileName + "+";
                        strHTML += UniqueWord[j].ToString();
                        nbWordFound++;
                        strInfo += UniqueWord[j].ToString() + " ";
						strContent += GetContentSigmlSign(SignFileName);
                    }
                    else
                    {
                        nbWordNF++;
                        strresult += FingerSpell(UniqueWord[j], path);
                        for (int k = 0; k < UniqueWord[j].Length; k++)
                        {
                            strHTML += UniqueWord[j][k].ToString();
                            strInfo += UniqueWord[j][k].ToString();
							strContent += GetContentSigmlSign(UniqueWord[j][k] + ".sigml");
                            if ((k + 1) < UniqueWord[j].Length) { strHTML += " - "; strInfo += "-"; }
                        }
                        strInfo += " ";
                    }
                 if ((j + 1) < UniqueWord.Length) strHTML += " + ";
            }
            strHTML += "</td></tr>";
        }
        strHTML += "</table>";
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString()+ "+" +(nbWordFound+nbWordNF).ToString();
        Label3.Text = strHTML.ToString();
		//if (strresult[strresult.Length-1]=='+') strresult=strresult.Substring(0, strresult.Length - 1);
		strContent += "</sigml>";        
		strContent = strContent.Replace("\"", "\\\"");
		strContent = strContent.Replace("'", "\\'");
		Session["StrSigmlFiles"] = strresult;
		Session["StrInfo"] = strInfo;
		Session["StrContent"] = strContent;
        //WriteToFile(fileName, strresult);

        //WriteToFile(InfofileName, strInfo);
        
    }

    /*int VerifSignDataBase(string SignStr)
    {
        int NbCount, res = 0;
        DataSet dsSign;
        DataRow drSign;
        string sqlSign = "SELECT * from sign where word = '" + SignStr + "'";
        SignFileName = "";
        dsSign = new DataSet();
        dsSign = DataAccess.ExecuteDataSet(CommandType.Text, sqlSign);
        NbCount = dsSign.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            drSign = dsSign.Tables[0].Rows[0];
            SignFileName = drSign["SignFile"].ToString();
            res = 1;
        }
        return res;
    }
	*/

	int VerifSignDataBase(string SignStr)
    {
        int NbCount, res = 0;
		char[] Sep = { ',','،'};
        DataSet dsSign;
        DataRow drSign;
        string sqlSign = "SELECT * from sign_dict where word = '" + SignStr + "'";
        SignFileName = "";
        dsSign = new DataSet();
        dsSign = DataAccess.ExecuteDataSet(CommandType.Text, sqlSign);
        NbCount = dsSign.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            drSign = dsSign.Tables[0].Rows[0];
            SignFileName = drSign["SignFileName"].ToString();
            res = 1;
        }
		else
		{
			sqlSign = "SELECT * from sign_dict where morph_variations like '%" + SignStr + "%'";
			dsSign = DataAccess.ExecuteDataSet(CommandType.Text, sqlSign);
			NbCount = dsSign.Tables[0].Rows.Count;
			if (NbCount > 0)
			{
				for (int i=0; i < NbCount ; i++)
				{
				drSign = dsSign.Tables[0].Rows[i];
				string[] MorphVarWord = drSign["morph_variations"].ToString().Split(Sep);
				for (int j=0; j < MorphVarWord.Length; j++)
				{
					if (MorphVarWord[j].Trim().Equals(SignStr))
					{
						SignFileName = drSign["SignFileName"].ToString();
						res = 1;
						break;
					}
				}
				if (res == 1) break;
				}
			}
			else
			{
				sqlSign = "SELECT * from sign_dict where Homo_signs like '%" + SignStr + "%'";
				dsSign = DataAccess.ExecuteDataSet(CommandType.Text, sqlSign);
				NbCount = dsSign.Tables[0].Rows.Count;
				if (NbCount > 0)
				{
					for (int i=0; i < NbCount ; i++)
					{
						drSign = dsSign.Tables[0].Rows[i];
						string[] HomosignsWord = drSign["Homo_signs"].ToString().Split(Sep);
						for (int j=0; j < HomosignsWord.Length; j++)
							if (HomosignsWord[j].Trim().Equals(SignStr))
							{
								SignFileName = drSign["SignFileName"].ToString();
								res = 1;
								break;
							}
						if (res == 1) break;
					}
					
				}
			}	
		}
        return res;
    }
    string FingerSpell(string wordtospell, string pth)
    {
        char[] str = wordtospell.ToCharArray();
        string result = "";
        for (int j = 0; j < str.Length; j++)
        {
            result += pth + str[j] + ".sigml";
			if (j+1 < str.Length) result += "+";
        }
        return result;
    }

    protected void Button2_Click(object sender, EventArgs e)
    {
        phrase.InnerHtml = "";
        Label3.Text = "";
		
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "inputfile.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "inputfile.txt");
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "not_found.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "not_found.txt");
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "outfile.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "outfile.txt");
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "Arabic_outfile.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "Arabic_outfile.txt");
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "Morphar.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "Morphar.txt");
        if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "A2SL.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "A2SL.txt");
			if (File.Exists(ConfigurationSettings.AppSettings["FilePath"] + "Solutions.txt"))
                File.Delete(ConfigurationSettings.AppSettings["FilePath"] + "Solutions.txt");
			
/*		
		if (File.Exists(Server.MapPath("/temp/")+ "inputfile.txt"))
                File.Delete(Server.MapPath("/temp/")+  "inputfile.txt");
        if (File.Exists(Server.MapPath("/temp/")+ "not_found.txt"))
                File.Delete(Server.MapPath("/temp/")+ "not_found.txt");
        if (File.Exists(Server.MapPath("/temp/")+ "outfile.txt"))
                File.Delete(Server.MapPath("/temp/")+ "outfile.txt");
        if (File.Exists(Server.MapPath("/temp/")+ "Arabic_outfile.txt"))
                File.Delete(Server.MapPath("/temp/")+ "Arabic_outfile.txt");
        if (File.Exists(Server.MapPath("/temp/")+ "Morphar.txt"))
                File.Delete(Server.MapPath("/temp/")+ "Morphar.txt");
			if (File.Exists(Server.MapPath("/temp/")+ "Solutions.txt"))
                File.Delete(Server.MapPath("/temp/")+ "Solutions.txt");
        if (File.Exists(Server.MapPath("/temp/")+ "A2SL.txt"))
                File.Delete(Server.MapPath("/temp/")+ "A2SL.txt");
			*/
    }

	/*
	string GetContentSigmlSign(string FileName)
    {
        string res = "";
		//string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
        string path = Server.MapPath("/Files/")+FileName; //in server side
		string[] lines = System.IO.File.ReadAllLines(path);
        for (int i = 1; i < lines.Length - 1; i++)
            res += lines[i] + " ";       
	    return res;
    }
	*/
	
	string GetContentSigmlSign(string FileName)
    {
        string res = "";
		string path = "";
		string[] FileNameStr = FileName.Split('|');
		string[] FileNameDetail = FileNameStr[0].Split('+');
		//string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
		for (int j=0; j < FileNameDetail.Length; j++)
		{
			path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileNameDetail[j];
			//path = Server.MapPath("/Files/")+FileNameDetail[j]; //in server side
			string[] lines = System.IO.File.ReadAllLines(path);
			for (int i = 1; i < lines.Length - 1; i++)
				res += lines[i] + " ";       
		}
	    return res;
    }
	
	
   /* void ResultClick()
    {
        if (Label3.Visible == true) Label3.Visible = false;
        else
            Label3.Visible = true;
    }*/
}
