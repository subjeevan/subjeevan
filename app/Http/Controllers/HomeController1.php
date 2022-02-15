public function chartjs()  
{  
    $viewer = View::select(DB::raw("SUM(numberofview) as count"))  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("year(created_at)"))  
        ->get()->toArray();  
    $viewer = array_column($viewer, 'count');  
      
    $click = Click::select(DB::raw("SUM(numberofclick) as count"))  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("year(created_at)"))  
        ->get()->toArray();  
    $click = array_column($click, 'count');  
      
    return view('chartjs')  
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))  
            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));  
}  