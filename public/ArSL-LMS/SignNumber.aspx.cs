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


public partial class SignNumber : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //string sqlNumber = "";
        if (!IsPostBack)
        {
           // DDLNumber.Enabled = true;
           // sqlNumber = "Select * from sign where Meaning like 'رقم%'";
           // FillDDLNumber(sqlNumber);
            Label2.Visible = false;
            Label3.Visible = false;
			Session["StrSigmlFiles"] = "";
			Session["StrInfo"] = "";
			Session["StrContent"] = "";
         //   ScriptManager.RegisterStartupScript(this.Page, Page.GetType(), "Javascript", "javascript:CWASA.init(initCfg); ", true);
        }
    }

    /*
    void FillDDLNumber(string sqlSNumber)
    {
        int NbCount, index = 0;
        DataSet dsSNumber;
        DataRow drSNumber;
        dsSNumber = new DataSet();
        dsSNumber = DataAccess.ExecuteDataSet(CommandType.Text, sqlSNumber);
        NbCount = dsSNumber.Tables[0].Rows.Count;
        if (NbCount > 0)
        {
            DDLNumber.Items.Clear();
            DDLNumber.Items.Add("اختر الرقم ... ");
            DDLNumber.Items[0].Value = "0";
            while (index < NbCount)
            {
                drSNumber = dsSNumber.Tables[0].Rows[index];
                DDLNumber.Items.Add(drSNumber["Word"].ToString());
                DDLNumber.Items[index + 1].Value = drSNumber["SignFile"].ToString();
                index++;
            }
            DDLNumber.SelectedIndex = 0;
        }
        else
        {
            DDLNumber.Items.Clear();
            DDLNumber.Items.Add("لا توجد أرقام بقاعدة البيانات");
        }
    }
    


    protected void DDLNumber_SelectedIndexChanged(object sender, EventArgs e)
    {
       // Label1.Text = " لقد اخترت الملف = " + DDLNumber.SelectedValue.ToString();
        Label2.Visible = true;
        Label3.Visible = true;
        CheckSignFile(DDLNumber.SelectedValue.ToString());
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
        InputBox.Text = "1";
        CheckSignFile(InputBox.Text);
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        InputBox.Text = "2";
        CheckSignFile(InputBox.Text);
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        InputBox.Text = "3";
        CheckSignFile(InputBox.Text);
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        InputBox.Text = "4";
        CheckSignFile(InputBox.Text);
    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        InputBox.Text = "5";
        CheckSignFile(InputBox.Text);
    }
    protected void Button7_Click(object sender, EventArgs e)
    {
        InputBox.Text = "6";
        CheckSignFile(InputBox.Text);
    }
    protected void Button8_Click(object sender, EventArgs e)
    {
        InputBox.Text = "7";
        CheckSignFile(InputBox.Text);
    }
    protected void Button9_Click(object sender, EventArgs e)
    {
        InputBox.Text = "8";
        CheckSignFile(InputBox.Text);
    }
    protected void Button10_Click(object sender, EventArgs e)
    {
        InputBox.Text = "9";
        CheckSignFile(InputBox.Text);
    }
    
    protected void Button12_Click(object sender, EventArgs e)
    {
        InputBox.Text = "10";
        CheckSignFile(InputBox.Text);
    }
    protected void Button13_Click(object sender, EventArgs e)
    {
        InputBox.Text = "20";
        CheckSignFile(InputBox.Text);
    }
    protected void Button14_Click(object sender, EventArgs e)
    {
        InputBox.Text = "30";
        CheckSignFile(InputBox.Text);
    }
    protected void Button15_Click(object sender, EventArgs e)
    {
        InputBox.Text = "40";
        CheckSignFile(InputBox.Text);
    }
    protected void Button16_Click(object sender, EventArgs e)
    {
        InputBox.Text = "50";
        CheckSignFile(InputBox.Text);
    }
    protected void Button17_Click(object sender, EventArgs e)
    {
        InputBox.Text = "60";
        CheckSignFile(InputBox.Text);
    }
    protected void Button18_Click(object sender, EventArgs e)
    {
        InputBox.Text = "70";
        CheckSignFile(InputBox.Text);
    }
    protected void Button19_Click(object sender, EventArgs e)
    {
        InputBox.Text = "80";
        CheckSignFile(InputBox.Text);
    }
    protected void Button20_Click(object sender, EventArgs e)
    {
        InputBox.Text = "90";
        CheckSignFile(InputBox.Text);
    }
    protected void Button21_Click(object sender, EventArgs e)
    {
        InputBox.Text = "100";
        CheckSignFile(InputBox.Text);
    }
    protected void Button22_Click(object sender, EventArgs e)
    {
        InputBox.Text = "200";
        CheckSignFile(InputBox.Text);
    }
    protected void Button23_Click(object sender, EventArgs e)
    {
        InputBox.Text = "300";
        CheckSignFile(InputBox.Text);
    }
    protected void Button24_Click(object sender, EventArgs e)
    {
        InputBox.Text = "400";
        CheckSignFile(InputBox.Text);
    }
    protected void Button25_Click(object sender, EventArgs e)
    {
        InputBox.Text = "500";
        CheckSignFile(InputBox.Text);
    }
    protected void Button26_Click(object sender, EventArgs e)
    {
        InputBox.Text = "600";
        CheckSignFile(InputBox.Text);
    }
    protected void Button27_Click(object sender, EventArgs e)
    {
        InputBox.Text = "700";
        CheckSignFile(InputBox.Text);
    }
    protected void Button28_Click(object sender, EventArgs e)
    {
        InputBox.Text = "800";
        CheckSignFile(InputBox.Text);
    }
    protected void Button29_Click(object sender, EventArgs e)
    {
        InputBox.Text = "900";
        CheckSignFile(InputBox.Text);
    }
    protected void Button30_Click(object sender, EventArgs e)
    {
        InputBox.Text = "1000";
        CheckSignFile("1+000");
    }
    protected void Button31_Click(object sender, EventArgs e)
    {
        InputBox.Text = "1000000";
        CheckSignFile("1+000000");
    }
    protected void Button32_Click(object sender, EventArgs e)
    {
        InputBox.Text = "1000000000";
        CheckSignFile("1+000000000");
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
        Label2.Text = "لقد اخترت الرقم : " + InputBox.Text;//SigmlFile.ToString(); ;
        Label2.Visible = true;
        Label3.Visible = true;

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
		strContent+="<sigml> ";
        strresult = path + UniqueWord[0] + ".sigml";
        strInfo += UniqueWord[0].ToString() + " ";
        nbWordFound++;
        strContent += GetContentSigmlSign(UniqueWord[0] + ".sigml");		
        for (int i = 1; i < UniqueWord.Length; i++)
        {
            if (UniqueWord[i] != UniqueWord[i - 1])
            {
                strresult += "+" + path + UniqueWord[i] + ".sigml";
				strContent += GetContentSigmlSign(UniqueWord[i] + ".sigml");		
                strInfo += UniqueWord[i].ToString() + " ";
                nbWordFound++;
        
            }
        }
		strContent+="</sigml>";
		strContent = strContent.Replace("\"", "\\\""); 
		strContent = strContent.Replace("'", "\\'");		
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString() + "+" + (nbWordFound + nbWordNF).ToString();
		Session["StrSigmlFiles"] = strresult;
		Session["StrInfo"] = strInfo;
		Session["StrContent"] = strContent;
       // InfoTempTextArea.Value = strInfo;
       // TempTextArea.Value = strresult;
        WriteToFile(strresult, strInfo);
    }

	string GetContentSigmlSign(string FileName)
    {
        string res = "";                
		string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
        string[] lines = System.IO.File.ReadAllLines(path);
        for (int i = 1; i < lines.Length - 1; i++)
            res += lines[i] + " ";
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
        File.WriteAllText(fileName, Str, Encoding.GetEncoding(1256));
        File.WriteAllText(InfofileName, Str2, Encoding.GetEncoding(1256));

    }
}
