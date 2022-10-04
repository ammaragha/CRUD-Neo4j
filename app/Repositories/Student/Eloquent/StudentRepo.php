<?php

namespace App\Repositories\Student\Eloquent;

use App\Models\Student;
use App\Repositories\Student\StudentRepoInterface;
use Illuminate\Http\Request;

class StudentRepo implements StudentRepoInterface
{


    public function create(Request $request)
    {
        $std = Student::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
        return $std;
    }

    public function read(int $id)
    {
        return  Student::find($id);
    }

    public function update(Request $request, int $id)
    {
        $student = $this->read($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->save();
        return $student;
    }

    public function delete(int $id)
    {
        $student = $this->read($id);
        return $student->delete();
    }

    public function readAll()
    {
        return Student::all();
    }
}
