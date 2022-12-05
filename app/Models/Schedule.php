<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $with = ['faculty'];
    protected $table = 'schedule';

    public function faculty()
    {
        return $this->hasOne(Faculty::class,'id','fId');
    }
}
