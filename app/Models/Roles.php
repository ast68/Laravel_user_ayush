<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $primaryKey = 'id';

     public $incrementing = false;
    protected $fillable = [
        'id',
        'role_name',
        'role_slug',
    ];
}