<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Patient_image_upload;
use App\Hs_pama_patientmain;
use App\vw_patientdetails;


use Auth;
use DB;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

	public function logout()
    {
	Auth::logout();     
   return redirect('/login');
    }
   
public function claimdatas(){

DB::enableQueryLog();
  
        $view=\DB::table('image_upload')
        ->select('Date',DB::raw('count(claim_code) AS claim_code'))
        ->wherein('uploaded', [1,2])
        ->groupby ('date')
        ->orderby('date')
        ->get()
        ->toArray();


$date=array_column($view, 'Date');
$claim_code=array_column($view, 'claim_code');


return view('admin.dashboard')       
          ->with('date',json_encode($date,JSON_NUMERIC_CHECK))  
            ->with('claim_code',json_encode($claim_code,JSON_NUMERIC_CHECK));   

}


   public function claimdata()
    
    { 

/* 
From Sql Query
DB::enableQueryLog();
  
        $view=\DB::table('image_upload')
        ->select('Date',DB::raw('count(claim_code) AS claim_code'))
        ->wherein('uploaded', [1,2])
        ->groupby ('date')
        ->orderby('date')
        ->get()
        ->toArray();


    $date=array_column($view, 'Date');
    $claim_code=array_column($view, 'claim_code');


    $tclaim= Patient_image_upload::count('claim_code');
    
    
    $claimed= Patient_image_upload::where('is_uploaded',1)->count('claim_code');
    

    $pending_claim= Patient_image_upload::where('is_uploaded',0)->count('claim_code');

    $dstatus= Patient_image_upload::distinct('is_uploaded');
    

    $claim_notfound=Patient_image_upload::where('is_uploaded',2)->count('claim_code');

    $groups = DB::table('Patient_image_upload')
                  ->select('is_uploaded', DB::raw('count(*) as total'))
                  ->groupBy('is_uploaded')
                  ->pluck('total', 'is_uploaded')->all();

               
    // Generate random colours for the groups
    for ($i=0; $i<=count($groups); $i++) {
                $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            }
    // Prepare the data for returning with the view
    $chart = new Patient_image_upload;
                        $chart->labels = (array_keys($groups));
                        $chart->dataset = (array_values($groups));
                        $chart->colours = $colours;

    
return view('admin.dashboard')
            ->with('chart',$chart) 
            ->with('tclaim',$tclaim) 
            ->with('dstatus',$dstatus) 
            ->with('claimed',$claimed) 
            ->with('pending_claim',$pending_claim) 
            ->with('claim_notfound',$claim_notfound)       
            ->with('date',$date)
            ->with('claim_code',json_encode($claim_code,JSON_NUMERIC_CHECK));   


//    return view('admin.dashboard', compact(['chart','tclaim','dstatus','claimed','pending_claim','claim_notfound']));



*/

 $view=DB::select('SELECT  * FROM (select  distinct(pama_regdatead),count( pama_patientid) as count  from hs_pama_patientmain  group by pama_regdatead order by pama_regdatead desc)  WHERE ROWNUM <=18');



 $elequent=vw_patientdetails::select()

        ->get();


 $patientsdetail=Hs_pama_patientmain::select()
 ->take(11)
        ->get();


 $query=DB::table("vw_patientdetails")
        ->select()
        ->take(13)
        ->get()         //here it sends data as object
        ->toArray();   //it sends data in array

    $date=array_column($query, 'pama_regdatead');
    $general=array_column($query, 'general');
    $insurance=array_column($query, 'insurance');

return view('admin.dashboard',compact('patientsdetail','elequent','date','insurance','general')); 

    }

public function registeredpatients(Request $request)
    {
        if ($request->ajax()) {
            $data = Hs_pama_patientmain::select('pama_regdatead','pama_patientid','pama_patientname','pama_age','pama_schemeid')->take(50100)->get();
            return Datatables::of($data)
            ->make(true);
       }
}
function js()
    
                { 

                $tclaim= Patient_image_upload::count('claim_code');
                
                
                $claimed= Patient_image_upload::where('is_uploaded',1)->count('claim_code');
    

    $pending_claim= Patient_image_upload::where('is_uploaded',0)->count('claim_code');

    $dstatus= Patient_image_upload::select ('is_uploaded')->distinct()->get();
    

    $claim_notfound=Patient_image_upload::where('is_uploaded',2)->count('claim_code');

$chart = new Chart;
                    $chart->labels = (array_keys($groups));
                    $chart->dataset = (array_values($groups));
                    $chart->colours = $colours;


    return view('test', compact(['chart','tclaim','dstatus','claimed','pending_claim','claim_notfound']));
    }

function chart()
    
    { 

$groups = DB::table('Patient_image_upload')
                      ->select('is_uploaded', DB::raw('count(*) as total'))
                      ->groupBy('is_uploaded')
                      ->pluck('total', 'is_uploaded')->all();
    // Generate random colours for the groups
    for ($i=0; $i<=count($groups); $i++) {
                $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            }
    // Prepare the data for returning with the view
    $chart = new Patient_image_upload;
                        $chart->labels = (array_keys($groups));
                        $chart->dataset = (array_values($groups));
                        $chart->colours = $colours;
            return view('charts.index', compact('chart'));
    return view('admin.dashboard', compact(['chart','tclaim','dstatus','claimed','pending_claim','claim_notfound']));

    }
    


}
