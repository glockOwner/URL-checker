<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $table = 'checks';
    protected $guarded = [];

    public function url()
    {
        return $this->belongsTo(Url::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
