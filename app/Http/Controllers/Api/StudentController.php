<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Models\Student;
use App\Repositories\Student\StudentRepoInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ResponseTrait;

    private StudentRepoInterface $stdRepo;

    public function __construct(StudentRepoInterface $stdRepo)
    {
        $this->stdRepo = $stdRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $created = $this->stdRepo->create($request);
        if ($created)
            return $this->succWithData(new StudentResource($created), 'Student created');
        else
            return $this->errMsg('something wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->stdRepo->read($id);
        if ($student)
            return $this->succWithData(new StudentResource($student));
        else
            return $this->errMsg('wrong student or not exist');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $updated = $this->stdRepo->update($request,$id);
        if($updated)
            return $this->succWithData(new StudentResource($updated),'Student updated!');
        else
            return $this->errMsg('Something wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->stdRepo->read($id);
        if (!$student)
            return $this->errMsg('wrong student or not exist');
        $deleted = $this->stdRepo->delete($id);
        if($deleted)
            return $this->succWithData(new StudentResource($student),'Student deleted!');
        else
        return $this->errMsg('something wrong');

    }
}
