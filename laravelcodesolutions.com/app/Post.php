<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','meta_description', 'body', 'image',
        'category_id', 'slug' , 'active' ,'disclaimer'];


    /**
     * @param $inputs
     * @param null $id
     * @return mixed
     */
    public function store($inputs, $id = null)
    {
        if($id)
        {
            $posts = $this->findOrFail($id);
            return $posts->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }



    public function scopeActive($query)
    {
        return $query->where('posts.active', 'Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['category_name' => 'Not Available']);
    }

}
