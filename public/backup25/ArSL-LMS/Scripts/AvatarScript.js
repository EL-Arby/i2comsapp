function playText(stext)
{
    CWASA.playSiGMLText(stext);
}


function setSiGMLURL(sigmlURL)
{
    var loc = window.location.href;
    var locDir = loc.substring(0, loc.lastIndexOf('/'));
    sigmlURL = locDir + "/Files/" + sigmlURL;
    var obj1 = document.getElementById("Textcontent");
    obj1.innerHTML = sigmlURL;
    document.getElementById("URLText").value = sigmlURL;
    return sigmlURL;
}


function startPlayer(sigmlURL)
{
    sigmlURL = setSiGMLURL(sigmlURL);
    // Equivalent to click on Sign button
    CWASA.playSiGMLURL(sigmlURL);
}

// This is my land ^_^

/****************** The Global Variables ********************/
var path ="C:\\temp";
var pathFile ="C:\\inetpub\\wwwroot\\Files\\";
/************************************************************/
//--------------------------------------------------------------------
function getData()
{ 
    getSessionValueJavascript();
    InfoTheSign();
    ReadFromFile();
}
             
//--------------------------------------------------------------------

function DisplayTheSign()
{
    InfoTheSign();
    ReadFromFile();
}

//--------------------------------------------------------------------

function ReadFromFile(){

    var SplitSign = new Array();
	
    var TheSigns = document.getElementById('TempTextArea').value;
    var obj1 = document.getElementById("Textcontent");
    obj1.innerHTML = TheSigns;   	
    SplitSign = TheSigns.split("+");
    for ( var count = 0 ; count<SplitSign.length ; count++)
    {
        startPlayer(SplitSign[count]);
    }   
}

//------------------------------------------------------------------
function InfoTheSign()
{
    var obj1 = document.getElementById("Textcontent");
    var obj2 = document.getElementById("WordF");
    var obj3 = document.getElementById("WordNF"); 
    var SplitWordSign = new Array();
	   
    var TheContent = document.getElementById('InfoTempTextArea').value;
    SplitWordSign = TheContent.split("+");
    obj1.innerHTML = TheContent+"--"+SplitWordSign [0];
    obj2.innerHTML = SplitWordSign [1]+"\\"+SplitWordSign [3];
    obj3.innerHTML= SplitWordSign [2]+"\\"+SplitWordSign [3];
}

//--------------------------------------------------------------------

function InitSignForm()
{
    var SplitWordSign = new Array();
    var obj1 = document.getElementById("Textcontent");
    var obj2 = document.getElementById("WordF");
    var obj3 = document.getElementById("WordNF"); 
	   
    obj1.innerHTML = "-";
    obj2.innerHTML = "0";
    obj3.innerHTML= "0";
    startPlayer("10.sigml");       
}

// Initial configuration
var initCfg = {
    "avsbsl" : ["luna", "anna", "marc", "francoise"],
    "avSettings" : { "avList": "avsbsl", "initAv": "marc" }
};

function getSessionValueJavascript()
    {
        var session_StrInfo= '<%=Session["StrInfo"] %>';
        var session_StrSigmlFiles='<%=Session["StrSigmlFiles"] %>';
        document.getElementById('InfoTempTextArea').value = session_StrInfo; 
        document.getElementById('TempTextArea').value = session_StrSigmlFiles; 
        alert(session_StrInfo);
        alert(session_StrSigmlFiles);
    }

