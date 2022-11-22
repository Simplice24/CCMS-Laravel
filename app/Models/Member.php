<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table='members';
    protected $fillable=[
        'name',
        'idn',
        'cooperative_name',
        'category',
        'gender',
        'number_of_trees',
        'fertilizer',
        'phone',
        'province',
        'district',
        'sector',
        'cell',
        'cooperative_id'
    ];
    public function cooperatives(){
        return $this->belongsTo(Cooperative::class);
    }
    public function diseases(){
        return $this->belongsToMany(Disease::class,'member_diseases');
    }
    public function administrations(){
        return $this->belongsToMany(Administration::class,'administration_members');
    }
}
