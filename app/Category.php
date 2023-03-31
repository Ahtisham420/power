<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
   // use Sluggable;
    protected $table = "categories";
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'image',
        'slug',
        'interest_img',
        'icon_img',
        'feature_img',
        'classification_id',
        'sub_classification_id',
    ];

    protected $hidden = array('pivot');

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories');
    }

    public function child_category()
    {
        return $this->hasMany(Category::class)->with('categories_1');
    }

    public function categories_1()
    {
        return $this->hasMany(Category::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query){
        return $query->where('status','=',1);
    }
    public function scopeTopListOrder($query){
        return $query->orderBy('top_list', 'desc');
    }
}
