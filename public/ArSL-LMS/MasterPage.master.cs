using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Xml.Linq;
//using System.Windows.Forms;

public partial class MasterPage : System.Web.UI.MasterPage
{

    /*
    public String SigmlFilesHiddenValue
    {
        get { return TempTextArea.Value; }
        set { TempTextArea.Value = value; }
    }

    public String InfoSigmlFilesHiddenValue
    {
        get { return InfoTempTextArea.Value; }
        set { InfoTempTextArea.Value = value; }
    }
    */

    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            Session["StrSigmlFiles"] = "";
            Session["StrInfo"] = "";
			Session["StrContent"] = "";			
          //  ScriptManager.RegisterStartupScript(this.Page, Page.GetType(), "Javascript", "javascript:CWASA.init(initCfg); ", true);			
        }
    }

    protected void GoToSignChar(object sender, EventArgs e)
    {
        Response.Redirect("SignChar.aspx");
    }

    protected void GoToSignNumber(object sender, EventArgs e)
    {
        Response.Redirect("SignNumber.aspx");
    }

    protected void GoToComposedSignNumber(object sender, EventArgs e)
    {
        Response.Redirect("ComposedSignNumber.aspx");
    }

    protected void GoToSignReligionWord(object sender, EventArgs e)
    {
        Response.Redirect("SignReligionWord.aspx");
    }

    protected void GoToSignTopicPhrase(object sender, EventArgs e)
    {
        Response.Redirect("SignTopicPhrase.aspx");
    }

    protected void GoToSignTranslation(object sender, EventArgs e)
    {
        Response.Redirect("SignTranslation.aspx");
    }    
}
