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

using System.Runtime.InteropServices;
/// <summary>
/// Summary description for LITClass
/// </summary>
/// 

/* Entry points in the A2SLV1.dll using dumpbin /exports A2SLV1.dll in the cmd prompt
 
 
          1    0 0001102D ??0LIT@@QAE@XZ
          2    1 00011037 ??1LIT@@QAE@XZ
          3    2 000110E1 ??4LIT@@QAEAAV0@ABV0@@Z
          4    3 000111D6 ?Check_Part_Group@LIT@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          5    4 00011113 ?Check_Stop_Word@LIT@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          6    5 00011244 ?OnLIT@LIT@@QAEXXZ
          7    6 00011136 ?Translate@LIT@@QAE?AV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@V23@0@Z

*/

/*
 dumpbin /exports LITV2.dll in the cmd prompt
 File Type: DLL

  Section contains the following exports for LITV2.dll

           0 characteristics
    519FCA3C time date stamp Fri May 24 23:14:52 2013
        0.00 version
           1 ordinal base
           7 number of functions
           7 number of names

    ordinal hint RVA      name

          1    0 000110A5 ??0LIT@@QAE@XZ
          2    1 000110CD ??1LIT@@QAE@XZ
          3    2 0001123F ??4LIT@@QAEAAV0@ABV0@@Z
          4    3 000114A6 ?Check_Part_Group@LIT@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          5    4 000112B2 ?Check_Stop_Word@LIT@@QAEHV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@@Z
          6    5 000115EB ?OnLIT@LIT@@QAEXXZ
          7    6 00011302 ?Translate@LIT@@QAE?AV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@V23@0@Z


 */

[StructLayout(LayoutKind.Sequential)]
public unsafe struct __LITClass
{
    public IntPtr* _vtable;
    //public string filename;
}


public unsafe class LITClass : IDisposable
{
    private __LITClass* _cpp;

 // LITClass constructor and destructor
    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "??1LIT@@QAE@XZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _LITClass_Constructor(__LITClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "??4LIT@@QAEAAV0@ABV0@@Z", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _LITClass_Destructor(__LITClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "?OnLIT@LIT@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnLIT(__LITClass* ths);
/*
   // LITClass constructor and destructor
    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "??1LIT@@QAE@XZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _LITClass_Constructor(__LITClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "??4LIT@@QAEAAV0@ABV0@@Z", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _LITClass_Destructor(__LITClass* ths);

    [DllImport("c:\\inetpub\\wwwroot\\Bin\\LITV2.dll", EntryPoint = "?OnLIT@LIT@@QAEXXZ", CallingConvention = CallingConvention.ThisCall)]
    private static extern int _OnLIT(__LITClass* ths);

*/
    public LITClass()
    {
        //Allocate storage for object
        _cpp = (__LITClass*)Memory.Alloc(sizeof(__LITClass));
        //Call constructor
        _LITClass_Constructor(_cpp);
    }

    public void Dispose()
    {
        //call destructor
        _LITClass_Destructor(_cpp);
        //release memory
        Memory.Free(_cpp);
        _cpp = null;
    }

   // public void OnLIT(string filename)
    public void OnLIT()
    {
        _OnLIT(_cpp);
    }

}
