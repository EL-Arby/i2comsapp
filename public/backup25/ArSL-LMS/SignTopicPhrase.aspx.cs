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

public partial class SignTopicPhrase : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string sqlTopic = "";
        if (!IsPostBack)
        {
            DDLTopic.Enabled = true;
            LBPhrase.Visible = false;
            Label1.Visible = false;
            Label5.Visible = false;
            Label3.Visible = false;
            sqlTopic = "Select * from Topic";
            FillDDLTopic(sqlTopic);
			Session["StrSigmlFiles"] = "";
			Session["StrInfo"] = "";
            Session["StrContent"] = "";
            /*ListView1.Columns.Add("index", 50, HorizontalAlignment.Left);
            ListView1.Columns.Add("Arabic phrase", 150, HorizontalAlignment.Left);
            ListView1.Columns.Add("Signed phrase", 150, HorizontalAlignment.Left);*/
        }        
    }

    void FillDDLTopic(string sqlSTopic)
    {
        int NbCount, index = 0;
        DataSet dsSTopic;
        DataRow drSTopic;
        dsSTopic = new DataSet();
        dsSTopic = DataAccess.ExecuteDataSet(CommandType.Text, sqlSTopic);
        NbCount = dsSTopic.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            DDLTopic.Items.Clear();
            DDLTopic.Items.Add("اختر المجال ... ");
            DDLTopic.Items[0].Value = "0";
            while (index < NbCount)
            {
                drSTopic = dsSTopic.Tables[0].Rows[index];
                DDLTopic.Items.Add(drSTopic["Topic_Name"].ToString());
                DDLTopic.Items[index + 1].Value = drSTopic["Topic_ID"].ToString();
                index++;
            }
            DDLTopic.SelectedIndex = 0;
        }
        else
        {
            DDLTopic.Items.Clear();
            DDLTopic.Items.Add("لا توجد مجالات بقاعدة البيانات");
        }
    }
    protected void DDLTopic_SelectedIndexChanged(object sender, EventArgs e)
    {
        string sqlPhrase = "";
        sqlPhrase = "SELECT * FROM sentence WHERE Topic_ID=" + DDLTopic.SelectedValue.ToString() + " AND File_Id =1 AND Sentence_ID <51; ";
        LBPhrase.Visible = true;
        LBPhrase.Enabled = true;
        Label5.Visible = true;
        Label1.Visible = true;
        FillLBPhrase(sqlPhrase);       
    }

    void FillLBPhrase(string sqlSPhrase)
    {
        int NbCount, index = 0;
        DataSet dsSPhrase;
        DataRow drSPhrase;
		//LBPhrase.Visible = false;
        LBPhrase.Items.Clear();
		Session["StrSigmlFiles"] = "";
		Session["StrInfo"] = "";
        Session["StrContent"] = "";          
        dsSPhrase = new DataSet();
        dsSPhrase = DataAccess.ExecuteDataSet(CommandType.Text, sqlSPhrase);
        NbCount = dsSPhrase.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            //LBPhrase.Items.Clear();
            while (index < NbCount)
            {
                drSPhrase = dsSPhrase.Tables[0].Rows[index];
                LBPhrase.Items.Add((index+1).ToString() + " - "+ drSPhrase["Arabic_sentence"].ToString());
                //LBPhrase.Items.Add(drSPhrase["Arabic_sentence"].ToString());
                //LBPhrase.Items.Add(item);
                LBPhrase.Items[index].Value = drSPhrase["Signed_sentence"].ToString();
                /*ListViewItem item = new ListViewItem();
                item.Text = (index+1).ToString();
                item.SubItems.Add(drSPhrase["Arabic_sentence"].ToString());
                item.SubItems.Add(drSPhrase["Signed_sentence"].ToString());
                ListView1.Items.Add(item);
                ListView1.Items[index].Value = drSPhrase["Signed_sentence"].ToString();*/
                index++;
            }
            LBPhrase.SelectedIndex = 0;
			LBPhrase_IndexChanged();
        }
        else
        {
        //    LBPhrase.Visible = false;
        //    LBPhrase.Items.Clear();
            LBPhrase.Items.Add("لا توجد جمل بقاعدة البيانات");
        }
         
 
    }

    protected void LBPhrase_SelectedIndexChanged(object sender, EventArgs e)
    {
		if (LBPhrase.Items.Count >1)
		LBPhrase_IndexChanged();
	}
	
    protected void LBPhrase_IndexChanged()
    {
        char[] Sep = {'+','(',')','\n','\r' };
        string path = ConfigurationSettings.AppSettings["SignfolderPath"];// "C:\\Program Files\\eSIGN\\SiGMLSigning\\Files\\";
        string SigmlFile = "", strresult="", Signnamefile="", strInfo="", strContent="";
        string[] ArraySigmlFile;
        string[] ArraySignnamefile;
        //Label2.Text = "لقد اخترت الجملة : " + LBPhrase.SelectedItem.ToString();
        Label3.Visible = true;
        SigmlFile = LBPhrase.SelectedValue.ToString();
        ArraySigmlFile = SigmlFile.Split(Sep);
        //string fileName = "C:\\Users\\ayadi kamel\\Documents\\Visual Studio 2008\\WebSites\\SignWebSite\\Files\\tempNew.txt";
        string fileName = ConfigurationSettings.AppSettings["fileName"];
        string InfofileName = ConfigurationSettings.AppSettings["InfofileName"];
        int nbWord = 0, nbWordFound=0, nbWordNF=0;
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
        Signnamefile = GetSignDataBase(UniqueWord[0]);
        if (Signnamefile != "")
        {
            strInfo += UniqueWord[0].ToString() + " ";
            nbWordFound++;
            ArraySignnamefile = Signnamefile.Split(',');
            for (int s = 0; s < ArraySignnamefile.Length; s++)
            {
                strresult += path + ArraySignnamefile[s] + ((s + 1) < ArraySignnamefile.Length ? "+" : "");
                strContent += GetContentSigmlSign(ArraySignnamefile[s]);
            }
        }
        else
        {
            nbWordNF++;
            strresult += FingerSpell(UniqueWord[0], path);
            for (int z = 0; z < UniqueWord[0].Length; z++)
            {
                strInfo += UniqueWord[0][z].ToString() + "-";
                strContent += GetContentSigmlSign(UniqueWord[0][z].ToString() + ".sigml");
            }
            strInfo += " ";
        }
        for (int i = 1; i < UniqueWord.Length; i++)
        {
            if (UniqueWord[i] != UniqueWord[i - 1])
            {
                Signnamefile = GetSignDataBase(UniqueWord[i]);
                if (Signnamefile != "")
                {
                    nbWordFound++;
                    strInfo += UniqueWord[i].ToString();
                    ArraySignnamefile = Signnamefile.Split(',');
                    for (int s = 0; s < ArraySignnamefile.Length; s++)
                    {
                        strresult += "+" + path + ArraySignnamefile[s];// + ((s+1) < ArraySignnamefile.Length ? "+":"");
                        strContent += GetContentSigmlSign(ArraySignnamefile[s]);
                    }
                }
                else
                {
                    nbWordNF++;
                    strresult += "+" + FingerSpell(UniqueWord[i], path);
                    for (int z = 0; z < UniqueWord[i].Length; z++)
                    {
                        strInfo += UniqueWord[i][z].ToString() + "-";
						if (UniqueWord[i][z].ToString().Trim() != "")
                        strContent += GetContentSigmlSign(UniqueWord[i][z].ToString()+".sigml");
                    }
                }
                strInfo += " ";
            }
        }
        strContent += "</sigml>";
		strContent = strContent.Replace("\"", "\\\"");
		strContent = strContent.Replace("'", "\\'");
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString() + "+" + (nbWordFound + nbWordNF).ToString();
        Session["StrSigmlFiles"] = strresult;
		Session["StrInfo"] = strInfo;
        Session["StrContent"] = strContent;
        /* try
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
  string GetSignDataBase(string SignStr)
    {
        int NbCount;
        string res = "";
        DataSet dsSign;
        DataRow drSign;
        
        //string sqlSign = "SELECT * from sign where word = '"+SignStr+"'";
		string sqlSign = "SELECT * from sign where word = '"+SignStr+"'";
        dsSign = new DataSet();
        dsSign = DataAccess.ExecuteDataSet(CommandType.Text, sqlSign);
        NbCount = dsSign.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            drSign = dsSign.Tables[0].Rows[0];
            res = drSign["SignFile"].ToString();
        }
        return res;
    }
*/

	string GetSignDataBase(string SignStr)
    {
        int NbCount, res = 0;
		char[] Sep = { ',','،'};
        DataSet dsSign;
        DataRow drSign;
        string sqlSign = "SELECT * from sign_dict where word = '" + SignStr + "'";
        string SignFileName = "";
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
        return SignFileName;
    }
/*	
	string GetContentSigmlSign(string FileName)
    {
        string res = "";                
		if (FileName.Trim() != "")
		{
			string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
			//string path = Server.MapPath("/Files/")+FileName;
			string[] lines = System.IO.File.ReadAllLines(path);
			for (int i = 1; i < lines.Length - 1; i++)
				res += lines[i] + " ";
        }
		//StreamReader reader = File.OpenText(path);
        //res = reader.ReadToEnd();
        //res=res.Substring(8, res.Length - 16);
		//res += " ";
        return res;
    }
*/
	string GetContentSigmlSign(string FileName)
    {
        string res = "";
		string path = "";
		string[] FileNameStr = FileName.Split('|');
		string[] FileNameDetail = FileNameStr[0].Split('+');
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

	
    string FingerSpell(string wordtospell, string pth)
    {
        char[] str = wordtospell.ToCharArray();
        string result="";
	    for (int j=0;j<str.Length ;j++)
		{
		     result +=pth+str[j]+".sigml";
			 if (j+1 < str.Length) result += "+";
		}
        return result;
    }

}
