<?php

namespace App\Traits;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquant;

trait IDTrait
{
   public function getIDEloquant(NeoEloquant $model)
   {
    # code...
   }


   public function getIDCypher(string $lable)
   {
    # code...
   }
}