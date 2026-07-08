using System;
using System.Data;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;

/// <summary>
/// Summary description for SessionVar
/// </summary>
/// 

namespace Website.SessionData
{
    public class SessionVar
    {
        private const string _index = "index";
        private const string _exampleIdx = "exampleIdx";
        private const string _oldexampleIdx = "oldexampleIdx";
        private const string _currentPage = "currentPage";
        private const string _bookname = "bookname";
        private const string _author = "author";

        public SessionVar()
        {
            //
            // TODO: Add constructor logic here
            //
        }

        static public string index
        {
            get { return (string)(HttpContext.Current.Session[_index]); }
            set { HttpContext.Current.Session[_index] = value; }
        }
        static public string exampleIdx
        {
            get { return (string)(HttpContext.Current.Session[_exampleIdx]); }
            set { HttpContext.Current.Session[_exampleIdx] = value; }
        }
        static public string oldexampleIdx
        {
            get { return (string)(HttpContext.Current.Session[_oldexampleIdx]); }
            set { HttpContext.Current.Session[_oldexampleIdx] = value; }
        }
        static public string currentPage
        {
            get { return (string)(HttpContext.Current.Session[_currentPage]); }
            set { HttpContext.Current.Session[_currentPage] = value; }
        }
        static public string bookname
        {
            get { return (string)(HttpContext.Current.Session[_bookname]); }
            set { HttpContext.Current.Session[_bookname] = value; }
        }
        static public string author
        {
            get { return (string)(HttpContext.Current.Session[_author]); }
            set { HttpContext.Current.Session[_author] = value; }
        }
    }
}