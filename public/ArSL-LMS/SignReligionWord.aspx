<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="SignReligionWord.aspx.cs" Inherits="SignReligionWord" Title="Untitled Page" %>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">

    <h1 class ="Title">المستوى الأول - قاموس إشاري</h1>
    <hr />
    
    <h2 class ="SubTitle">إختر كلمة من القائمة :
    </h2>
    <p class ="SubTitle">&nbsp;</p>
    <div style="width: 415px;" >
    <center>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
        <ContentTemplate>
        <p class ="SubTitle">
            <asp:Label ID="Label1" runat="server"></asp:Label>
        </p>
                <asp:ListBox ID="LBWord" runat="server" Height="321px" Width="312px"
                onselectedindexchanged="LBWord_SelectedIndexChanged"  AutoPostBack ="true">
                </asp:ListBox>
            </p>
        <br />
        </ContentTemplate>
    </asp:UpdatePanel>
    </center>

    <br />
    <br />
    <br />
    <br />
    <br />
    <asp:UpdatePanel ID="UpdatePanel2" runat="server" >
	<Triggers>
            <asp:PostBackTrigger ControlID="LBWord" />
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
        </div>
</asp:Content>

