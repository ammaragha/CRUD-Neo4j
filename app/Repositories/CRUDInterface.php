<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface CRUDInterface
{
    public function create(Request $request);
    public function read(int $id);
    public function update(Request $request,int $id);
    public function delete(int $id);
}
