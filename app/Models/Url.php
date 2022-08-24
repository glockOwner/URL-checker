<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'urls';

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'url_users');
    }
}
