<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected  $fillable = ['title','slug','excerpt','body'];

    public function getRouteKey()
    {
        return 'slug';
    }

    protected $dates = ['deleted_at'];
}
