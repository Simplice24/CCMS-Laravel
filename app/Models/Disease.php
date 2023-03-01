<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table='diseases';
    protected $fillable=[
        'disease_name',
        'category',
        'description',
        
    ];
    public function cooperatives(){
        return $this->belongsToMany(Cooperative::class,'cooperative_diseases');
    }
    public function members(){
        return $this->belongsToMany(Member::class,'member_diseases');
    }
}
