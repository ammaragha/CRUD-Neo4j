<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToCollection
{
    // /**
    // * @param array $row
    // *
    // * @return \Vinelab\NeoEloquent\Eloquent\Model|null
    // */
    // public function model(array $row)
    // {
    //     return DB::table('')([
    //         'name'=> $row[0],
    //         'created_at'=>$row[1],
    //         'updated_at'=>$row[2],
    //         'phone'=>$row[3],
    //         'id'=>$row[4]
    //     ]);

    // }

    public function collection(Collection $collection)
    {
        $data = [];

        foreach ($collection as $row) {
            $data[] = array(
                'name' => $row[0],
                'phone' => $row[1],
            );
        }

        Student::insert($data);
    }
}
