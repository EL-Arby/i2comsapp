<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="SignNumber.aspx.cs" Inherits="SignNumber" Title="Untitled Page" %>



<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">

 <h1 class ="Title">المستوى الأول - الوحدات الرقمية</h1>
    <hr />
    

<center>
<div style="width: 415px;" >
<table  border="2"  bordercolor= "#667C26"  cellspacing="9" dir="rtl">
<!-- HERE : Text box , Equal , Clear -->
<tr align="center" >
 <td>
 <asp:TextBox ID="InputBox" runat="server" Width="119px" Enabled ="false"></asp:TextBox>
 </td>
 <td>
 <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="أمسح" />
</td>
</tr>       
<!-- Numbers , Opreations -->
<tr align="center" bordercolor= "#667C26">
<td colspan="2">
<asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="1" />&nbsp;
<asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="2" />&nbsp;
<asp:Button ID="Button4" runat="server" onclick="Button4_Click" Text="3" />
<br />
<asp:Button ID="Button5" runat="server" onclick="Button5_Click" Text="4" />&nbsp;
<asp:Button ID="Button6" runat="server" onclick="Button6_Click" Text="5" />&nbsp;
<asp:Button ID="Button7" runat="server" onclick="Button7_Click" Text="6" />

<br/>
<asp:Button ID="Button8" runat="server" onclick="Button8_Click" Text="7" />&nbsp;
<asp:Button ID="Button9" runat="server" onclick="Button9_Click" Text="8" />&nbsp;
<asp:Button ID="Button10" runat="server" onclick="Button10_Click" Text="9" />
<br/>
<asp:Button ID="Button12" runat="server" onclick="Button12_Click" Text="10" />&nbsp;
<asp:Button ID="Button13" runat="server" onclick="Button13_Click" Text="20" />&nbsp;
<asp:Button ID="Button14" runat="server" onclick="Button14_Click" Text="30" />
<br />
<asp:Button ID="Button15" runat="server" onclick="Button15_Click" Text="40" />&nbsp;
<asp:Button ID="Button16" runat="server" onclick="Button16_Click" Text="50" />&nbsp;
<asp:Button ID="Button17" runat="server" onclick="Button17_Click" Text="60" />
<br />
<asp:Button ID="Button18" runat="server" onclick="Button18_Click" Text="70" />&nbsp;
<asp:Button ID="Button19" runat="server" onclick="Button19_Click" Text="80" />&nbsp;
<asp:Button ID="Button20" runat="server" onclick="Button20_Click" Text="90" />
<br />
<asp:Button ID="Button21" runat="server" onclick="Button21_Click" Text="100" />&nbsp;
<asp:Button ID="Button22" runat="server" onclick="Button22_Click" Text="200" />&nbsp;
<asp:Button ID="Button23" runat="server" onclick="Button23_Click" Text="300" />
<br />
<asp:Button ID="Button24" runat="server" onclick="Button24_Click" Text="400" />&nbsp;
<asp:Button ID="Button25" runat="server" onclick="Button25_Click" Text="500" />&nbsp;
<asp:Button ID="Button26" runat="server" onclick="Button26_Click" Text="600" />
<br />
<asp:Button ID="Button27" runat="server" onclick="Button27_Click" Text="700" />&nbsp;
<asp:Button ID="Button28" runat="server" onclick="Button28_Click" Text="800" />&nbsp;
<asp:Button ID="Button29" runat="server" onclick="Button29_Click" Text="900" />
<br/>
<asp:Button ID="Button30" runat="server" onclick="Button30_Click" Text="1000" />&nbsp;
<asp:Button ID="Button31" runat="server" onclick="Button31_Click" Text="1000000" 
        Width="60px" />&nbsp;
<asp:Button ID="Button32" runat="server" onclick="Button32_Click" Text="1000000000" 
        Width="86px" />
</td>
</tr>
</table>
</center>
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
   

<asp:UpdatePanel ID="UpdatePanel2" runat="server" >  
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
</div>    
</asp:Content>
