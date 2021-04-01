<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'registro';
	public $timestamps = true;
	
	

    protected $fillable = [
        'typedoc',
        'numdoc',
        'nombresperson',
        'edad',
        'namedepartment',
        'nameprovince',
        'namedistrict',
        'department_id',
        'province_id',
        'district_id',
        'created_at'
        
    ];
}



   