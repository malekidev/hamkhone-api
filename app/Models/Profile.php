<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ["id","user_id"];
    protected $hidden = ['id','user_id','created_at','updated_at'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
