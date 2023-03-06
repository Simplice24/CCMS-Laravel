<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableLogin;

class Administration extends Model implements AuthenticatableLogin
{
    use HasFactory;
    use HasRoles;
    use Authenticatable,HasApiTokens,Notifiable;
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
        'cell',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cooperatives(){
        return $this->belongsToMany(Cooperative::class,'cooperative_administrations');
    }

    public function getId()
        {
        return $this->id;
        }

    public function members(){
        return $this->belongsToMany(Member::class,'administration_members');
    }

    
}
