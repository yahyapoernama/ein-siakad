<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'icon', 'route', 'is_active', 'permission_name', 'menu_group_id', 'position'];

    public function group()
    {
        return $this->belongsTo(MenuGroup::class);
    }
}
