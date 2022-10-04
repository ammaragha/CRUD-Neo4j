<?php

namespace App\Repositories\Student\Cypher;

class IStudent
{
    public function __construct(public int $id, public $name, public $phone)
    {
    }
}
