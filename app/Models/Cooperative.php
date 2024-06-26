<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    protected $table='cooperatives';
    protected $fillable=[
        'name',
        'manager_name',
        'category',
        'email',
        'status',
        'starting_date',
        'province',
        'district',
        'sector',
        'cell'
    ];
    use HasFactory;
    public function members(){
        return $this->hasMany(Member::class);
    }
    public function diseases(){
        return $this->belongsToMany(Disease::class,'cooperative_diseases');
    }
    public function administrations(){
        return $this->belongsToMany(Administration::class,'cooperative_administrations');
    }
}
