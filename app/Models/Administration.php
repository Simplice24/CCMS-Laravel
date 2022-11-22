<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Administration extends Model
{
    use HasFactory;
    use HasRoles;
    protected $table='administrations';
    protected $fillable=[
        'name',
        'gender',
        'role',
        'username',
        'password',
        'email',
        'phone',
        'province',
        'district',
        'sector',
        'cell'
    ];
    public function cooperatives(){
        return $this->belongsToMany(Cooperative::class,'cooperative_administrations');
    }
    public function members(){
        return $this->belongsToMany(Member::class,'administration_members');
    }
}
