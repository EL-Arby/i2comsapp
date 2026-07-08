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


public partial class ComposedSignNumber : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
        if (!IsPostBack)
        { 
            Session["StrSigmlFiles"] = "";
            Session["StrInfo"] = "";  
			Session["StrContent"] = "";			
        }
    }

    
    protected void Button1_Click(object sender, EventArgs e)
    {
        InputBox.Text = "";
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        InputBox.Text += "1";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        InputBox.Text += "2";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        InputBox.Text += "3";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        InputBox.Text += "4";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        InputBox.Text += "5";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button7_Click(object sender, EventArgs e)
    {
        InputBox.Text += "6";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button8_Click(object sender, EventArgs e)
    {
        InputBox.Text += "7";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button9_Click(object sender, EventArgs e)
    {
        InputBox.Text += "8";
        GetListSigmlFile(InputBox.Text);
    }
    protected void Button10_Click(object sender, EventArgs e)
    {
        InputBox.Text += "9";
        GetListSigmlFile(InputBox.Text);
    }
    
    protected void Button12_Click(object sender, EventArgs e)
    {
        InputBox.Text += "0";
        GetListSigmlFile(InputBox.Text);
    }

    int getDigitValue(string str)
    {
        int res=0;
        switch (str)
        {
            case "1": res = 1; break;
            case "2": res = 2; break;
            case "3": res = 3; break;
            case "4": res = 4; break;
            case "5": res = 5; break;
            case "6": res = 6; break;
            case "7": res = 7; break;
            case "8": res = 8; break;
            case "9": res = 9; break;
            case "0": res = 0; break;            
        }
        return res;
    }

    int getNumberValue(string str)
    {
        int Coeff, Number = 0,i;
        Coeff = 1;
        for (i = str.Length - 1; i >= 0; i--)
        {
            Number += Coeff * getDigitValue(str.Substring(i, 1));
            Coeff *= 10;
        }
        return Number;
    }

    string getSigmlNumberFiles(int[] ArrDigit, int len, int index)
    {
        int hund = 0, teenth = 0, digit=0;
        string result="";
        if (index+2<len)
            if (ArrDigit[index + 2] != 0)
            {
                ArrDigit[index + 2] *= 100;
                result += ArrDigit[index + 2].ToString() + ".sigml";
                hund = 1;
            }

        if (index < len)
        {

            //if ((hund == 1) || (teenth == 1)) result += "+";
            if ((ArrDigit[index] != 0)||((index==0)&&(len==1)))
            {
                if (hund == 1) result += "+";
                result += ArrDigit[index].ToString() + ".sigml";
                digit = 1;
            }
        }

        if (index+1<len)
            if (ArrDigit[index + 1] != 0)
            {
                //if (hund == 1) result += "+";
                if ((hund == 1)||(digit==1)) result += "+";
                ArrDigit[index + 1] *= 10;
                result += ArrDigit[index + 1].ToString() + ".sigml";
               // teenth = 1;
            }
        
        return result;
    }

    void GetListSigmlFile(string str)
    {
        int i, Number, len, thousd=0, mill=0, bill=0;        
        string result = "";
        len = str.Length;
        int[] digit = new int[len];
        
        Number = getNumberValue(str);

        for (i = 0; i < digit.Length; i++)
        {
            digit[i] = Number % 10;
            Number /= 10;
        }
        if (len > 9)
        {
            result += getSigmlNumberFiles(digit, len, 9);// Billion (unit + tenth + hundred)
            result += "+000000000.sigml";
            bill = 1;
        }
        if (len > 6)
        {
            if (bill == 1) result += "+";
            result += getSigmlNumberFiles(digit, len, 6);// Million (unit + tenth + hundred)
            result += "+000000.sigml";
            mill = 1;
        }
        if (len > 3)
        {
            if ((bill == 1)||(mill==1)) result += "+";
            result += getSigmlNumberFiles(digit, len, 3);// Thounsed (unit + tenth + hundred)
            result += "+000.sigml";
            thousd = 1;
        }
        if ((bill == 1) || (mill == 1)|| (thousd==1)) result += "+";
        result += getSigmlNumberFiles(digit, len, 0);// unit + tenth + hundred
        CheckSignFile(result);
    }

    void CheckSignFile(string SigmlFile)
    {
        char[] Sep = { '+', '(', ')', '\n', '\r' };
        //string path = "C:\\Program Files\\eSIGN\\SiGMLSigning\\Files\\";
        string path = ConfigurationSettings.AppSettings["SignfolderPath"];
        string strresult = "", strInfo = "", strContent="";
        string[] ArraySigmlFile;
        ArraySigmlFile = SigmlFile.Split(Sep);
        //   string fileName = "C:\\Users\\ayadi kamel\\Documents\\Visual Studio 2008\\WebSites\\SignWebSite\\Files\\tempNew.txt";

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
        strresult = path + UniqueWord[0];
        strInfo += UniqueWord[0].ToString().Substring(0,UniqueWord[0].IndexOf('.')) + " ";
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
		strContent+="</sigml>";
		strContent = strContent.Replace("\"", "\\\""); 
		strContent = strContent.Replace("'", "\\'");			
        strInfo += "+" + nbWordFound.ToString() + "+" + nbWordNF.ToString() + "+" + (nbWordFound + nbWordNF).ToString();
        Session["StrSigmlFiles"] = strresult;
        Session["StrInfo"] = strInfo;
		Session["StrContent"] = strContent;
        //WriteToFile(strresult, strInfo);
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

	string GetContentSigmlSign(string FileName)
    {
        string res = "";                
		string path = ConfigurationSettings.AppSettings["SignfolderPath1"]+FileName;
        string[] lines = System.IO.File.ReadAllLines(path);
        for (int i = 1; i < lines.Length - 1; i++)
            res += lines[i] + " ";
        return res;
    }
	
	
}
