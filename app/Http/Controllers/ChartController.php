<?php

namespace App\Http\Controllers;

use App\Patient_image_upload;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ChartController extends Controller
{



public function Chartjs(){

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


return view('index')       
          ->with('date',json_encode($date,JSON_NUMERIC_CHECK))  
            ->with('claim_code',json_encode($claim_code,JSON_NUMERIC_CHECK));   

}

public function data(){

DB::enableQueryLog();
    $all=$data['claim']=patient_image_upload::select(DB::raw("CONVERT(VARCHAR(10), UPDATED_AT, 111) AS updated_at"),
        DB::raw('count(claim_code) AS claim_code'))
        ->distinct('updated_at')
        ->groupBy('updated_at')
        ->orderby('updated_at','desc')
        ->get();

        $view=\DB::table('image_upload')
        ->select('Date',DB::raw('count(claim_code) AS claim_code'))
        ->wherein('uploaded', [1,2])
        ->groupby ('date')
        ->orderby('date')
        ->get()
        ->toArray();

        dd($view);


return view('upload',compact('data','all','view'));

}



public function Chartjss(){

$students=['test1','test2','test3','test4','test5','test6',];
$data1=['t1','t2','t3','t4','t5','t6',];


return view('test',compact('students', 'data1'));


$data=DB::table('patient_image_upload')
    ->select(DB::raw('count(is_uploaded) AS Total'),'is_uploaded')
    ->groupBy('is_uploaded')
    ->orderby('is_uploaded','desc')
    ->pluck('Total','is_uploaded');

  
return view('test',compact($data));

}




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get users grouped by age
$groups = DB::table('patient_image_upload')
    ->select('is_uploaded',DB::raw('count(is_uploaded)'))
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
return view('index', compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient_image_upload  $patient_image_upload
     * @return \Illuminate\Http\Response
     */
    public function show(Patient_image_upload $patient_image_upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient_image_upload  $patient_image_upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient_image_upload $patient_image_upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient_image_upload  $patient_image_upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient_image_upload $patient_image_upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient_image_upload  $patient_image_upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient_image_upload $patient_image_upload)
    {
        //
    }


}
