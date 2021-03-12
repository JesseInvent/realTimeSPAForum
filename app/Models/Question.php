<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected static function boot () 
    {
        parent::boot();

        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });
    }

    // protected $guarded = [];

    protected $fillable = ['title', 'slug', 'body', 'user_id', 'category_id'];

    protected $with = ['replies'];

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    public function getPathAttribute ()
    {
        return "/question/{$this->slug}";
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function replies ()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
