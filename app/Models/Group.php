<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
