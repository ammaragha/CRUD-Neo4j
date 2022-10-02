<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Student extends NeoEloquent
{
    use HasFactory, SoftDeletes;

    protected $table = "Student";
    protected $fillable = ["name", "phone"];
    protected $date = ["deleted_at"];
    public $timestamps = false;
}
