<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name','parent_id','active','slug','image'
    ];


    /**
     * @return string[]
     */
    public function categoryOptions()
    {
        $data = [ null => '--Select  Category--'];
        $result = $this->pluck('category_name', 'id');
        if($result->count() > 0) {
            $data = $data + $result->toArray();
        }

        return $data;
    }

    /**
     * @param $inputs
     * @param null $id
     * @return mixed
     *
     */
    public function store($inputs, $id = null)
    {
        if($id)
        {
            $categories= $this->findOrFail($id);
            return $categories->update($inputs);
        }

        return $this->create($inputs)->id;
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
