<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="SignTranslation.aspx.cs" Inherits="SignTranslation" Title="Untitled Page" %>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">

<script  type="text/javascript" language="javascript">
<!--
function ResultClick()
{
   var obj = document.getElementById("<%=Label3.ClientID%>");
   if (obj.style.display == "none")
         obj.style.display = "inherit";
     else
         obj.style.display = "none";
}
//-->
</script>

<h1 class ="Title">المستوى الثالث - ترجمة إشارية </h1>
<hr />
    <p> 
                    &nbsp;<asp:UpdateProgress ID="UpdateProgress1" runat="server">
                    <ProgressTemplate>
                        <span >انتظر لحظة ...</span>
                        <img alt="" src="UI/Images/Icons/25-1.gif" align="middle" />
                    </ProgressTemplate>
                </asp:UpdateProgress>

    &nbsp;</p>
    <div style="width: 415px;" >
<table width="95%" align="center">
    <tr>
	    <td align="right"><h3 class="SubTitle"> إدخال نص / كلمة :</h3></td> 
	    <td align="left"><h3 class="SubTitle"> :Enter Text \ Word</h3></td>
	</tr>
    <tr>
	<td colspan="2" align="center" dir="rtl">
	<textarea id="phrase" name="phrase" rows="10" cols="50" runat="server" dir="rtl"></textarea>
	<br />
	</td>
    </tr>
    <tr>
    <td align="right"> 
        <asp:Button ID="Button1" runat="server" Text="معالجة - Processing" 
            onclick="Button1_Click" Width="124px" />
    </td>    
    <td align="left">
        <asp:Button ID="Button2" runat="server" Text="مسح الإطار - Clear" Width="124px" 
            onclick="Button2_Click" />
    </td>
    </tr>
</table>

     <asp:UpdatePanel ID="UpdatePanel2" runat="server">
        <ContentTemplate>
   <br/>
   <hr />
<h3 class="SubTitle" onclick="ResultClick();">  نتيجة المعالجة:</h3>
   <br />
   <center>
    <asp:Label ID="Label3" runat="server" Text="" CssClass="SubTitle" style="display:inherit"></asp:Label>
   </center>
                     </ContentTemplate>
                    </asp:UpdatePanel>
   <br />
   <br /><br /><br /><br /><br />                 
        </div>
</asp:Content>

