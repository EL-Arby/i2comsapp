<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="SignChar.aspx.cs" Inherits="SignChar" Title="Untitled Page"  %>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <h1 class ="Title">المستوى الأول - الحروف الهجائية</h1>
    <hr />
    <div style="width: 415px;" >
<center>
<table  border="2"  bordercolor= "#667C26"  cellspacing="9" dir="rtl">
<!-- HERE : Text box , Equal , Clear -->
<tr align="center" >
<td>
    <asp:UpdatePanel ID="UpdatePanel2" runat="server">
    <ContentTemplate>
        <asp:TextBox ID="InputBox" runat="server" Width="144px" Enabled ="false"></asp:TextBox>
    </ContentTemplate>
    </asp:UpdatePanel>
 </td>
 <td>
 <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="أمسح" />
</td>
</tr>       
<!-- Numbers , Opreations -->
<tr align="center" bordercolor= "#667C26">
<td  colspan="2">
<asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="أ" />&nbsp;
<asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="ب" />&nbsp;
<asp:Button ID="Button4" runat="server" onclick="Button4_Click" Text="ت" />&nbsp;
<asp:Button ID="Button5" runat="server" onclick="Button5_Click" Text="ث" />&nbsp;
<asp:Button ID="Button6" runat="server" onclick="Button6_Click" Text="ج" />&nbsp;
<asp:Button ID="Button7" runat="server" onclick="Button7_Click" Text="ح" />

<br/>
<asp:Button ID="Button8" runat="server" onclick="Button8_Click" Text="خ" />&nbsp;
<asp:Button ID="Button9" runat="server" onclick="Button9_Click" Text="د" />&nbsp;
<asp:Button ID="Button10" runat="server" onclick="Button10_Click" Text="ذ" />&nbsp;
<asp:Button ID="Button11" runat="server" onclick="Button11_Click" Text="ر" />&nbsp;
<asp:Button ID="Button12" runat="server" onclick="Button12_Click" Text="ز" />
<br/>
<asp:Button ID="Button13" runat="server" onclick="Button13_Click" Text="س" />&nbsp;
<asp:Button ID="Button14" runat="server" onclick="Button14_Click" Text="ش" />&nbsp;
<asp:Button ID="Button15" runat="server" onclick="Button15_Click" Text="ص" />&nbsp;
<asp:Button ID="Button16" runat="server" onclick="Button16_Click" Text="ض" />&nbsp;
<asp:Button ID="Button17" runat="server" onclick="Button17_Click" Text="ط" />&nbsp;
<asp:Button ID="Button18" runat="server" onclick="Button18_Click" Text="ظ" />&nbsp;
<br/>
<asp:Button ID="Button19" runat="server" onclick="Button19_Click" Text="ع" />&nbsp;
<asp:Button ID="Button20" runat="server" onclick="Button20_Click" Text="غ" />&nbsp;
<asp:Button ID="Button21" runat="server" onclick="Button21_Click" Text="ف" />&nbsp;
<asp:Button ID="Button22" runat="server" onclick="Button22_Click" Text="ق" />&nbsp;
<asp:Button ID="Button23" runat="server" onclick="Button23_Click" Text="ك" />&nbsp;
<asp:Button ID="Button24" runat="server" onclick="Button24_Click" Text="ل" />
<br/>
<asp:Button ID="Button25" runat="server" onclick="Button25_Click" Text="م" />&nbsp;
<asp:Button ID="Button26" runat="server" onclick="Button26_Click" Text="ن" />&nbsp;
<asp:Button ID="Button27" runat="server" onclick="Button27_Click" Text="ه" />&nbsp;
<asp:Button ID="Button28" runat="server" onclick="Button28_Click" Text="و" />&nbsp;
<asp:Button ID="Button29" runat="server" onclick="Button29_Click" Text="ي" />
<br/>
<asp:Button ID="Button30" runat="server" onclick="Button30_Click" Text="ا ل" />&nbsp;
<asp:Button ID="Button31" runat="server" onclick="Button31_Click" Text="ى" />&nbsp;
<asp:Button ID="Button32" runat="server" onclick="Button32_Click" Text="ؤ" />&nbsp;
<asp:Button ID="Button33" runat="server" onclick="Button33_Click" Text="ء" />&nbsp;
<asp:Button ID="Button34" runat="server" onclick="Button34_Click" Text="ئ" />
</td>
</tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<asp:UpdatePanel ID="UpdatePanel3" runat="server" >
        <ContentTemplate>
   <center>
       <asp:Label ID="Label2" runat="server" CssClass="SubTitle"></asp:Label>
    <br />
    <asp:Label ID="Label3" runat="server" CssClass="SubTitle">انقر على عرض المحتوى للحصول على الترجمة 
       الإشارية</asp:Label>
    </center>

                     </ContentTemplate>
                    </asp:UpdatePanel>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</center>
        </div>
    </asp:Content>


