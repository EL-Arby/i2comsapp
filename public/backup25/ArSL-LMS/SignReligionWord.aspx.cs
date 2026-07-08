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
using System.IO;
using System.Text;
using Website.Data;

using MySql.Data;
using MySql.Data.MySqlClient;

public partial class SignReligionWord : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string sqlWord = "";
        if (!IsPostBack)
        {
            LBWord.Enabled = true;
            //sqlWord = "Select * from sign where isReligion = 1";
			sqlWord = "Select * from sign_dict where isReligian = 1";
            FillLBWord(sqlWord);
			Session["StrSigmlFiles"] = "";
			Session["StrInfo"] = "";
            Session["StrContent"] = "";            
        }
    }

    void FillLBWord(string sqlSWord)
    {
        int wdCount, index = 0;
        DataSet dsSWord;
        DataRow drSWord;
        dsSWord = new DataSet();
        dsSWord = DataAccess.ExecuteDataSet(CommandType.Text, sqlSWord);
        wdCount = dsSWord.Tables[0].Rows.Count;
        if (wdCount > 0)
        {
            LBWord.Items.Clear();
            while (index < wdCount)
            {
                drSWord = dsSWord.Tables[0].Rows[index];               
                LBWord.Items.Add((index+1).ToString() + " - " + drSWord["Word"].ToString());
                //LBWord.Items[index].Value = drSWord["SignFile"].ToString();
				LBWord.Items[index].Value = drSWord["SignFileName"].ToString();
                index++;
            }
            LBWord.SelectedIndex = 0;
        }
        else
        {
            LBWord.Items.Clear();
            LBWord.Items.Add("لا توجد كلمات بقاعدة البيانات");
        }
    }



    protected void LBWord_SelectedIndexChanged(object sender, EventArgs e)
    {
        //Label1.Text = " لقد اخترت الملف = " + LBWord.SelectedValue.ToString();
        CheckSignFile(LBWord.SelectedValue.ToString());
    }


    void CheckSignFile(string SigmlFile)
    {
        char[] Sep = { ',','،','+'};
        string path = ConfigurationSettings.AppSettings["SignfolderPath"];// "C:\\Program Files\\eSIGN\\SiGMLSigning\\Files\\";
        string strresult = "", strInfo = "", strContent="";
        string[] ArraySigmlFile;
		string[] FirstSigmlFile;
		FirstSigmlFile = SigmlFile.Split('|');
        ArraySigmlFile = FirstSigmlFile[0].Split(Sep);
        //Label2.Text = "لقد اخترت الكلمة : " + LBWord.SelectedItem.ToString(); 
        string fileName = ConfigurationSettings.AppSettings["fileName"];// "C:\\Users\\ayadi kamel\\Documents\\Visual Studio 2008\\WebSites\\SignWebSite\\Files\\tempNew.txt";
        string InfofileName = ConfigurationSettings.AppSettings["InfofileName"];
        //Label2.Text = "لقد اخترت الجملة : " + LBWord.SelectedItem.ToString(); ;
        int nbWord = 0, nbWordFound = 0, nbWordNF = 0;
        for (int j = 0; j < ArraySigmlFile.Length; j++)
            if (ArraySigmlFile[j].Trim() != "") nbWord++;

        string[] UniqueWord = new string[nbWord];
        for (int j = 0, k = 0; j < ArraySigmlFile.Length; j++)
        {
            ArraySigmlFile[j] = ArraySigmlFile[j].Trim();
            if (ArraySigmlFile[j] != "")
            {
                UniqueWord[k] = ArraySigmlFile[j];
                k++;
            }
        }
		strContent = "<sigml> ";
        strresult = path + UniqueWord[0];
        strInfo += UniqueWord[0].ToString().Substring(0, UniqueWord[0].IndexOf('.')) + " ";
        nbWordFound++;
        strContent += GetContentSigmlSign(UniqueWord[0]);
        for (int i = 1; i < UniqueWord.Length; i++)
        {
            if (UniqueWord[i] != UniqueWord[i - 1])
            {
                strresult += "+" + path + UniqueWord[i];
				strContent += GetContentSigmlSign(UniqueWord[i]);
                strInfo += UniqueWord[i].ToString().Substring(0, UniqueWord[i].IndexOf('.')) + " ";
                nbWordFound++;
            }
        }
		strContent += "</sigml>";
		strContent = strContent.Replace("\"", "\\\"");        
		strContent = strContent.Replace("'", "\\'");
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString() + "+" + (nbWordFound + nbWordNF).ToString();
        Session["StrSigmlFiles"] = strresult;
		Session["StrInfo"] = strInfo;
		Session["StrContent"] = strContent;
        /*try
        {
            if (File.Exists(fileName))
                File.Delete(fileName);
            if (File.Exists(InfofileName))
                File.Delete(InfofileName);
        
        }
        catch (Exception Ex)
        {
        }

        File.WriteAllText(fileName, strresult, Encoding.GetEncoding(1256));
        File.WriteAllText(InfofileName, strInfo, Encoding.GetEncoding(1256));
		*/
    }
	
	/*
	string GetContentSigmlSign(string FileName)
    {
        string res = "";                
		string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
        //string path = Server.MapPath("/Files/")+FileName; //in server side
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
		//path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
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


}


