<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    use HasRelationships;
    protected $fillable = ['title', 'description', 'priority', 'status', 'due_date','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

