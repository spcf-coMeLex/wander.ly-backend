<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table    = "users";

    protected $fillable = [
        'principal_id'
    ];

    protected $hidden = [
        'id',
        'principal_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
