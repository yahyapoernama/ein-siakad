<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
