<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient_image_upload;
class ScanController extends Controller
{
    function index()
    {
    return Patient_image_upload::all();
    }
    
    function claimed()
    {
    return Patient_image_upload::where('is_uploaded',1)->count('claim_code');
    }

    function pending_claim()
    {
    return Patient_image_upload::where('is_uploaded',0)->count('claim_code');
    }

    function claim_notfound()
    {

       $claim_notfound=Patient_image_upload::where('is_uploaded',2)->count('claim_code');

    return view('dashboard', ['claim_notfound'=>$claim_notfound]);
    }

}
