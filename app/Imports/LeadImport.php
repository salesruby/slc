<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        if(count($row) > 0){
            //dd($row);
            return new Lead([
                'full_name' => $row[0],
                'email' => $row[1],
                'phone' => $row[2],
                'organisation' => $row[3],
            ]);
           
        }else{
            return back()->with('error', 'one of your excel sheet is empty');
        }
       
    }
}
