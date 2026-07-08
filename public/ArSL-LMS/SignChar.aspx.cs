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

public partial class SignChar : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
       // string sqlChar = "";
        if (!IsPostBack)
        {
      /*    DDLChar.Enabled = true;
            sqlChar = "Select * from sign where Meaning = 'حرف'";
            FillDDLChar(sqlChar);*/
            Label2.Visible = false;
            Label3.Visible = false;
			Session["StrSigmlFiles"] = "";
			Session["StrInfo"] = "";
			Session["StrContent"] = "";
          //  if (!Directory.Exists(@"c:\temp"))
            //    Directory.CreateDirectory(@"c:\temp");
        }
    }
/*   
    void FillDDLChar(string sqlSChar)
    {
        int ChCount, index = 0;
        DataSet dsSChar;
        DataRow drSChar;
        dsSChar = new DataSet();
        dsSChar = DataAccess.ExecuteDataSet(CommandType.Text, sqlSChar);
        ChCount = dsSChar.Tables[0].Rows.Count;
        if (ChCount > 0)
        {
            DDLChar.Items.Clear();
            DDLChar.Items.Add("اختر الحرف ... ");
            DDLChar.Items[0].Value = "0";
            while (index < ChCount)
            {
                drSChar = dsSChar.Tables[0].Rows[index];
                DDLChar.Items.Add(drSChar["Word"].ToString());
                DDLChar.Items[index + 1].Value = drSChar["SignFile"].ToString();
                index++;
            }
            DDLChar.SelectedIndex = 0;
        }
        else
        {
            DDLChar.Items.Clear();
            DDLChar.Items.Add("لا توجد حروف بقاعدة البيانات");
        }
    }



    protected void DDLChar_SelectedIndexChanged(object sender, EventArgs e)
    {
        //Label1.Text = " لقد اخترت الملف = " + DDLChar.SelectedValue.ToString();
        Label2.Visible = true;
        Label3.Visible = true;
        CheckSignFile(DDLChar.SelectedValue.ToString());
    }
  */  
    protected void Button1_Click(object sender, EventArgs e)
    {
        //ScriptManager.RegisterStartupScript(this, typeof(string), "OPEN_WINDOW", "var Mleft = (screen.width/2)-(760/2);var Mtop = (screen.height/2)-(700/2);window.open( 'initialise.html', null, 'height=400,width=600,status=yes,toolbar=no,scrollbars=yes,menubar=no,location=no,top=\'+Mtop+\', left=\'+Mleft+\'' );", true);
        InputBox.Text = "";
        Label2.Visible = false;
        Label3.Visible = false;
    }
    protected void Button2_Click(object sender, EventArgs e)
    {        
        InputBox.Text = "أ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ب";
        CheckSignFile(InputBox.Text);
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ت";
        CheckSignFile(InputBox.Text);
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ث";
        CheckSignFile(InputBox.Text);
    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ج";
        CheckSignFile(InputBox.Text);
    }
    protected void Button7_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ح";
        CheckSignFile(InputBox.Text);
    }
    protected void Button8_Click(object sender, EventArgs e)
    {
        InputBox.Text = "خ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button9_Click(object sender, EventArgs e)
    {
        InputBox.Text = "د";
        CheckSignFile(InputBox.Text);
    }
    protected void Button10_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ذ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button11_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ر";
        CheckSignFile(InputBox.Text);
    }
    protected void Button12_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ز";
        CheckSignFile(InputBox.Text);
    }
    protected void Button13_Click(object sender, EventArgs e)
    {
        InputBox.Text = "س";
        CheckSignFile(InputBox.Text);
    }
    protected void Button14_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ش";
        CheckSignFile(InputBox.Text);
    }
    protected void Button15_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ص";
        CheckSignFile(InputBox.Text);
    }
    protected void Button16_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ض";
        CheckSignFile(InputBox.Text);
    }
    protected void Button17_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ط";
        CheckSignFile(InputBox.Text);
    }
    protected void Button18_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ظ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button19_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ع";
        CheckSignFile(InputBox.Text);
    }
    protected void Button20_Click(object sender, EventArgs e)
    {
        InputBox.Text = "غ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button21_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ف";
        CheckSignFile(InputBox.Text);
    }
    protected void Button22_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ق";
        CheckSignFile(InputBox.Text);
    }
    protected void Button23_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ك";
        CheckSignFile(InputBox.Text);
    }
    protected void Button24_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ل";
        CheckSignFile(InputBox.Text);
    }
    protected void Button25_Click(object sender, EventArgs e)
    {
        InputBox.Text = "م";
        CheckSignFile(InputBox.Text);
    }
    protected void Button26_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ن";
        CheckSignFile(InputBox.Text);
    }
    protected void Button27_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ه";
        CheckSignFile(InputBox.Text);
    }
    protected void Button28_Click(object sender, EventArgs e)
    {
        InputBox.Text = "و";
        CheckSignFile(InputBox.Text);
    }
    protected void Button29_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ي";
        CheckSignFile(InputBox.Text);
    }
    protected void Button30_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ال";
        CheckSignFile(InputBox.Text);
    }
    protected void Button31_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ى";
        CheckSignFile(InputBox.Text);
    }
    protected void Button32_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ؤ";
        CheckSignFile(InputBox.Text);
    }
    protected void Button33_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ء";
        CheckSignFile(InputBox.Text);
    }
    protected void Button34_Click(object sender, EventArgs e)
    {
        InputBox.Text = "ئ";
        CheckSignFile(InputBox.Text);
    }

    void CheckSignFile(string SigmlFile)
    {
        char[] Sep = { '+', '(', ')', '\n', '\r' };
        //string path = "C:\\Program Files\\eSIGN\\SiGMLSigning\\Files\\";
        string path = ConfigurationSettings.AppSettings["SignfolderPath"];
        string strresult = "", strInfo="", strContent="";
        string[] ArraySigmlFile;
        ArraySigmlFile = SigmlFile.Split(Sep);
     //   string fileName = "C:\\Users\\ayadi kamel\\Documents\\Visual Studio 2008\\WebSites\\SignWebSite\\Files\\tempNew.txt";
        Label2.Text = "لقد اخترت الحرف : " + SigmlFile.ToString();
        Label2.Visible = true;
        Label3.Visible = true;
        int nbWord = 0, nbWordFound = 0,nbWordNF = 0 ;
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
		strContent+="<sigml> ";
        strresult = path + UniqueWord[0] + ".sigml";
        strInfo += UniqueWord[0].ToString()+ " ";
        nbWordFound++;
		strContent += GetContentSigmlSign(UniqueWord[0] + ".sigml");		
        for (int i = 1; i < UniqueWord.Length; i++)
        {
            if (UniqueWord[i] != UniqueWord[i - 1])
			{
                strresult += "+" + path + UniqueWord[i] + ".sigml";
				strContent += GetContentSigmlSign(UniqueWord[i] + ".sigml");
			}
                strInfo += UniqueWord[i].ToString() + " ";
                nbWordFound++;
        }
		strContent+="</sigml>";
		//strContent = strContent.Replace("\r\n", " ");
		strContent = strContent.Replace("\"", "\\\"");
		strContent = strContent.Replace("'", "\\'");
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString() + "+" + (nbWordFound + nbWordNF).ToString();
		Session["StrSigmlFiles"] = strresult;
		Session["StrInfo"] = strInfo;
		Session["StrContent"] = strContent;
        /*
        MasterPage master = (MasterPage)Page.Master;
        master.SigmlFilesHiddenValue = strresult;
        master.InfoSigmlFilesHiddenValue = strInfo;
        */
        //WriteToFile(strresult, strInfo);
    }

	
	
	string GetContentSigmlSign(string FileName)
    {
        string res = "";                
		//Could not find file 'C:\Windows\SysWOW64\inetsrv\ب.sigml'. in the Arvixe server
		string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
        string[] lines = System.IO.File.ReadAllLines(path);
        for (int i = 1; i < lines.Length - 1; i++)
            res += lines[i] + " ";
        
		//StreamReader reader = File.OpenText(path);
        //res = reader.ReadToEnd();
        //res=res.Substring(8, res.Length - 16);
		//res += " ";
        return res;
    }
	
    void WriteToFile(string Str, string Str2)
    {
        string fileName = ConfigurationSettings.AppSettings["fileName"];
        string InfofileName = ConfigurationSettings.AppSettings["InfofileName"];
        try
        {
            if (File.Exists(fileName))
                File.Delete(fileName);
            if (File.Exists(InfofileName))
                File.Delete(InfofileName);
          
        }
        catch (Exception Ex)
        {
        }
      /*  using (StreamWriter writer = new StreamWriter(fileName, true, Encoding.UTF8,512))
        {
            writer.Write(Str);
        }*/
        //File.WriteAllText(fileName,Str,Encoding.GetEncoding(1256));
        //File.WriteAllText(InfofileName, Str2, Encoding.GetEncoding(1256));
        File.WriteAllText(fileName, Str, Encoding.UTF8);
        File.WriteAllText(InfofileName, Str2, Encoding.UTF8);
    }

}
