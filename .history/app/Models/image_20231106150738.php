<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class image extends Model
{
    use HasFactory;
    protected $fillable=['image','post_id'];


    public function posts():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
