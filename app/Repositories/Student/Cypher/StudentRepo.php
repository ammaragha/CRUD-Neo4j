<?php

namespace App\Repositories\Student\Cypher;

use App\Models\Student;
use App\Repositories\Student\StudentInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinelab\NeoEloquent\Connection;
use Vinelab\NeoEloquent\Events\QueryExecuted;

class StudentRepo implements StudentInterface
{
    

    private $table = "Student";

    public function create(Request $request)
    {
        $student = DB::select("CREATE (std:$this->table {name:'$request->name',phone:'$request->phone'}) RETURN std");
        return $student;
    }

    public function read(int $id)
    {
        // $client = DB::connection('neo4j');

        $query = "MATCH (std:$this->table) WHERE id(std)={id} RETURN std";
        // $q = new QueryExecuted($query, ['id' => $id], 1000, $client);
        // dd($q);
        $test = DB::query($query);
        dd($test);
    }

    public function update(Request $request, int $id)
    {
    }

    public function delete(int $id)
    {
    }
}
