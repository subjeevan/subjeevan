<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Datatables;
class Oracle extends Controller
{


   public function data(Request $request)
    {

 /* 
 $users=DB::select('SELECT  * FROM (select  distinct(pama_regdatead),count( pama_patientid)  from hs_pama_patientmain  group by pama_regdatead order by pama_regdatead desc)  WHERE ROWNUM <=70');

*/
 if ($request->ajax()) {
            $list = DB::table("hs_pama_patientmain")
                    ->WHERE('pama_regdatead','=','2010/08/11')
                    ->get();
dd ('here');
            return Datatables::of($list)
                ->make(true);
        }
    }
}