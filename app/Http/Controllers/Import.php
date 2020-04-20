<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Imports\LeadImport;
use Excel;

class Import extends Controller
{
    public function import(Request $request){
        //dd($request->file);
        
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
    
         ]);
      
    // try{
     Excel::import(new LeadImport, request()->file('file'));
    
        return back()->with('success', 'file uploaded successfully');
    // }catch(Exception $e){
        return back()->with('error', 'something went wrong');
    // }
    }


    public function leads(){
        $leads = Lead::orderBy('id', 'desc')->get();
        return view('ui.leads')->with('leads', $leads);
    }

    public function unsub($id){
        $lead = Lead::findorfail($id);
      
           $lead->stop = 'y';
           $lead->update();
           return $lead->full_name . ' you have successfully unsubscribed from receiving mails from us';
      
    }

    public function sub($id){
        $lead = Lead::findorfail($id);
      
        
        $lead->stop = 'n';
        $lead->update();
        return $lead->full_name . ' Thank you for subscribing to receiving mails from us';  
       
    }

    public function check($id){
       $lead = Lead::findorfail($id);
       return view('mail.second')->with('lead', $lead);
    }
}
