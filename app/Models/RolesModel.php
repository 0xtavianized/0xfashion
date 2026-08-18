<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

#[Table('roles')]
#[Fillable(['name', 'slug'])]
class RolesModel extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'role_id',
            'user_id'
        );
    }
}
