using System;
using System.Data;
using System.Configuration;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
//using System.Windows.Forms;

using System.Runtime.InteropServices;
/// <summary>
/// Summary description for MorpharClass
/// </summary>
/// 

/* Entry points in the MorpharClassV1.dll using dumpbin /exports MorpharClassV1.dll in the cmd prompt
 
          1    0 000112DA ??0Morphar@@QAE@XZ
          2    1 000111C2 ??1Morphar@@QAE@XZ
          3    2 0001100A ??4Morphar@@QAEAAV0@ABV0@@Z
          4    3 00011145 ?OnApostV2@Morphar@@QAEXXZ
          5    4 000112EE ?OnArabic@Morphar@@QAEXXZ
          6    5 000111F9 ?OnMORPHARBAMADicV2@Morphar@@QAEXV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          7    6 00011177 ?OnMorphar@Morphar@@QAEXXZ
          8    7 00011136 ?Ponctuation@Morphar@@QAE_NV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          9    8 000111E5 ?extract_solution@Morphar@@QAEXAAV?$basic_ofstream@DU?$char_traits@D@std@@@std@@V?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@3@@Z
         10    9 00011005 ?replace_str@Morphar@@QAEPADPAD00@Z
         11    A 0001126C ?strsch@Morphar@@QAE_NV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@0@Z
         12    B 000112FD ?verif_scheme_broken_plural@Morphar@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
*/

/*
 dumpbin /exports MorpharV2.dll in the cmd prompt
 File Type: DLL

  Section contains the following exports for MorpharV2.dll

           0 characteristics
    519FCE4F time date stamp Fri May 24 23:32:15 2013
        0.00 version
           1 ordinal base
          14 number of functions
          14 number of names

    ordinal hint RVA      name

          1    0 000116C7 ??0Morphar@@QAE@XZ
          2    1 0001140B ??1Morphar@@QAE@XZ
          3    2 0001100A ??4Morphar@@QAEAAV0@ABV0@@Z
          4    3 00011361 ?Check_Part_Group@Morphar@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          5    4 00011690 ?Extract_solutions@Morphar@@QAEXXZ
          6    5 00011307 ?OnApostV2@Morphar@@QAEXXZ
          7    6 000116EA ?OnArabic@Morphar@@QAEXXZ
          8    7 00011492 ?OnMORPHARBAMADicV2@Morphar@@QAEXV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          9    8 0001137F ?OnMorphar@Morphar@@QAEXXZ
         10    9 000112E9 ?Ponctuation@Morphar@@QAE_NV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
         11    A 00011474 ?extract_solution@Morphar@@QAEXAAV?$basic_ofstream@DU?$char_traits@D@std@@@std@@V?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@3@@Z
         12    B 00011005 ?replace_str@Morphar@@QAEPADPAD00@Z
         13    C 00011609 ?strsch@Morphar@@QAE_NV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@0@Z
         14    D 000116F9 ?verif_scheme_broken_plural@Morphar@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
 
 
*/
[StructLayout(LayoutKind.Sequential)]
public unsafe struct __MorpharClass
{
    public IntPtr* _vtable;
    //public string filename;
}


public unsafe class MorpharClass : IDisposable
{
    private __MorpharClass* _cpp;

     // MorpharClass constructor and destructor
	 //System.Web.HttpRuntime.HttpContext.Server.MapPath("~")
	 //try the following directory : ~/bin/MorpharV2.dll
    [DllImport("c:\\inetpub\\wwwroot\\bin\\MorpharV2.dll", EntryPoint = "??1Morphar@@QAE@XZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _MorpharClass_Constructor(__MorpharClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\MorpharV2.dll", EntryPoint = "??4Morphar@@QAEAAV0@ABV0@@Z", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _MorpharClass_Destructor(__MorpharClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\MorpharV2.dll", EntryPoint = "?OnMorphar@Morphar@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnMorphar(__MorpharClass* ths);

/*
    [DllImport("c:\\inetpub\\wwwroot\\Bin\\MorpharV2.dll", EntryPoint = "??1Morphar@@QAE@XZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _MorpharClass_Constructor(__MorpharClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\MorpharV2.dll", EntryPoint = "??4Morphar@@QAEAAV0@ABV0@@Z", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _MorpharClass_Destructor(__MorpharClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\MorpharV2.dll", EntryPoint = "?OnMorphar@Morphar@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnMorphar(__MorpharClass* ths);

*/

	/*
    [DllImport("c:\\inetpub\\wwwroot\\Bin\\Morphar.dll", EntryPoint = "?OnApostV2@Morphar@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnApostV2(__MorpharClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\Morphar.dll", EntryPoint = "?OnArabic@Morphar@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnArabic(__MorpharClass* ths);
    */

    public MorpharClass()
    {
        //Allocate storage for object
        _cpp = (__MorpharClass*)Memory.Alloc(sizeof(__MorpharClass));
        //Call constructor
        _MorpharClass_Constructor(_cpp);
    }

    public void Dispose()
    {
        //call destructor
        _MorpharClass_Destructor(_cpp);
        //release memory
        Memory.Free(_cpp);
        _cpp = null;
    }

    //public void OnMorphar(string filename)
    public void OnMorphar()
    {
        _OnMorphar(_cpp);
    }

}
