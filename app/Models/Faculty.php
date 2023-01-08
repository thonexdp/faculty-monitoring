<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $with = ['Designation','ItemName'];
    protected $table = 'faculty';

    public function Designation()
    {
        return $this->hasOne(Designation::class,'id','designation');
    }
    public function ItemName()
    {
        return $this->hasOne(ItemName::class,'id','itemname');
    }
   

  
}

