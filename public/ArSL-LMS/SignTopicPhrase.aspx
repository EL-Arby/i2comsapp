<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="SignTopicPhrase.aspx.cs" Inherits="SignTopicPhrase" Title="Untitled Page" %>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <h1 class ="Title">المستوى الثاني - مفاهيم دينية</h1>
    <hr />
 <div style="width: 415px;" >
        <table align="center" width ="95%">
        <tr>
        <td  colspan ="3" style="height: 34px" align ="center">
                <asp:UpdateProgress ID="UpdateProgress1" runat="server">
                    <ProgressTemplate>
                        <span >انتظر لحظة ...</span>
                        <img alt="" src="UI/Images/Icons/25-1.gif" align="middle" />
                    </ProgressTemplate>
                </asp:UpdateProgress>
                &nbsp;</td>
        </tr>
        <tr>
        <td>
                <asp:label ID="Label9" runat="server" text=" اختر المجال الديني :" CssClass="SubTitle"></asp:label>
        </td>
        <td>
        <div style="overflow:auto">
                <asp:DropDownList ID="DDLTopic" runat="server"  AutoPostBack="true"
                           Height="20px" 
                            Width="100px" onselectedindexchanged="DDLTopic_SelectedIndexChanged">
                        </asp:DropDownList>
       </div>
                   
        </td>
        <td style="text-align:left;">
                <asp:label ID="Label4" runat="server" text=": Select a topic" CssClass="SubTitle"></asp:label>
        </td>        
        </tr>
		</table>
        
                    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
                    <Triggers>                       
						<asp:PostBackTrigger ControlID="DDLTopic" /> 
                    </Triggers>
                    <ContentTemplate>
        <table align="center" width ="95%"        
        <tr>
        <td colspan="2">
                <asp:label ID="Label1" runat="server" text=" اختر الجملة        :" CssClass="SubTitle"></asp:label> 
        </td>
        <td style="text-align:left">
                <asp:label ID="Label5" runat="server" text=": Select a Phrase" CssClass="SubTitle"></asp:label>
        </td>
        </tr>
        <tr>
        <td colspan="3" align="center">
                        <asp:ListBox ID="LBPhrase" runat="server"
                               AutoPostBack="true"   Height="301px" Width="350px"
                               onselectedindexchanged="LBPhrase_SelectedIndexChanged" >
                        </asp:ListBox>
                        
          
        </td>        
        </tr>
		</table>
        
                    </ContentTemplate>
                    </asp:UpdatePanel>
        
        <br />
             
                        
        &nbsp;&nbsp;
        
    <br />
    <br />
       

    <br />
    <br />
          
     <asp:UpdatePanel ID="UpdatePanel2" runat="server" >
	    <Triggers>
             <asp:PostBackTrigger ControlID="LBPhrase"/>
         </Triggers>
        <ContentTemplate>
   <center>
       <asp:Label ID="Label2" runat="server" CssClass="SubTitle"></asp:Label>
    <br />
    <asp:Label ID="Label3" runat="server" CssClass="SubTitle">انقر على عرض المحتوى للحصول على الترجمة 
       الإشارية</asp:Label>
    </center>

                     </ContentTemplate>
                    </asp:UpdatePanel>


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
   </div>
</asp:Content>

