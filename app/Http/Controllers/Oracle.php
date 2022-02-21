<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Oracle extends Controller
{
    public function test(){
$users=DB::select('SELECT  * FROM (select  distinct(pama_regdatead),count( pama_patientid)  from hs_pama_patientmain  group by pama_regdatead order by pama_regdatead desc)  WHERE ROWNUM <=70');


var_dump($users);
}
}
