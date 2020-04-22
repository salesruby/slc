<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class LeadImport implements ToModel, WithValidation
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (count($row) > 0) {
            $exist = Lead::where('email', $row[1])->first();
            if ($row[1] !== '' && $exist === null && $row[1] !== null) {
                return new Lead([
                    'full_name' => $row[0],
                    'email' => @$row[1],
                    'phone' => @$row[2],
                    'organisation' => @$row[3],
                ]);
            }

        } else {
            return back()->with('error', 'one of your excel sheet is empty');
        }

    }

    public function rules(): array
    {
        return [
            '0' => function ($attribute, $value, $onFailure) {
                if ($value == '') {
                    $onFailure('Full Name is required');
                }
            },

        ];
    }
}
