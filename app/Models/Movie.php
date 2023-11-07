<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'movies';


    public function category()
    {
        return $this->belongsTo(
            Category::class,'category_id','id'
        );
    }

    public function genre()
    {
        return $this->belongsTo(
            Genre::class,'genre_id','id'
        );
    }

    public function link()
    {
        return $this->belongsTo(
            Link::class,'link_id','id'
        );
    }

    public function galleries()
    {
        return $this->hasMany(
            Gallery::class, 'movie_id','id'
        );
    }

}
