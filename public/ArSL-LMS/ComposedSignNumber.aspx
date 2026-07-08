<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="ComposedSignNumber.aspx.cs" Inherits="ComposedSignNumber" Title="Untitled Page" %>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">

 <h1 class ="Title">المستوى الأول - الأعداد المركبة</h1>
    <hr />
    <div style="width: 415px;" >
    <center>
<table  border="2"  bordercolor= "#667C26"  cellspacing="9" dir="rtl">
<!-- HERE : Text box , Equal , Clear -->
<tr align="center" >
 <td>
 <asp:TextBox ID="InputBox" runat="server" Width="119px" Enabled ="false"></asp:TextBox>
 </td>
 <td>
 <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="أمسح" />
</td>
<!-- Numbers , Opreations -->
<tr  align="center" bordercolor= "#667C26">
<td colspan="2" >
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
<asp:Button ID="Button12" runat="server" onclick="Button12_Click" Text="0" />&nbsp;
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

