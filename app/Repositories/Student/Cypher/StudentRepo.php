<?php

namespace App\Repositories\Student\Cypher;

use App\Models\Student;
use App\Repositories\Student\StudentRepoInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Everyman\Neo4j\Query\ResultSet;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Databags\Statement;

class StudentRepo implements StudentRepoInterface
{


    public function connectionNeo4j()
    {
        $client = ClientBuilder::create()
            ->withDriver('bolt', 'bolt://'.env('DB_USERNAME').':'.env('DB_PASSWORD').'@localhost:'.env('DB_PORT').'?database=neo4j') // creates a bolt driver
            ->withFormatter(\Laudis\Neo4j\Formatter\SummarizedResultFormatter::create())
            ->withDefaultDriver('bolt')
            ->build();

        return $client;
    }



    private $table = "Student";

    public function create(Request $request)
    {
        $query = "CREATE (std:$this->table {name:'$request->name',phone:'$request->phone'})
                RETURN id(std) as id, std.name as name, std.phone as phone";
        $result = $this->connectionNeo4j()->run($query, [], 'bolt')->first();
        $student = new IStudent($result->get('id'), $result->get('name'), $result->get('phone'));
        return $student;
    }

    public function read(int $id)
    {
        $query = "MATCH (std:$this->table) WHERE id(std)=$id RETURN std.name as name,std.phone as phone,id(std) as id";
        $result = $this->connectionNeo4j()->run($query, ['id' => $id], 'bolt')->first();
        $student = new IStudent($result->get('id'), $result->get('name'), $result->get('phone'));
        return $student;
    }

    public function update(Request $request, int $id)
    {
        $name = $request->name;
        $phone = $request->phone;
        $query = "MATCH (std:$this->table) WHERE id(std)=$id
                SET std.name ='$name',std.phone='$phone'
                RETURN std.name as name,std.phone as phone,id(std) as id";

        $result = $this->connectionNeo4j()
            ->run($query, ['name' => $request->name, 'phone' => $request->phone], 'bolt')->first();
        $student = new IStudent($result->get('id'), $result->get('name'), $result->get('phone'));
        return $student;
    }

    public function delete(int $id)
    {
        $query = "MATCH (n) WHERE id(n)=$id DELETE n";
        $result = $this->connectionNeo4j()->run($query, ['id' => $id], 'bolt');
        return $result ? true : false;
    }
}
