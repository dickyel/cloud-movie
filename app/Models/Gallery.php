<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'galleries';

    public function movie()
    {
        return $this->belongsTo(
            Movie::class,'movie_id','id'
        );
    }
}
