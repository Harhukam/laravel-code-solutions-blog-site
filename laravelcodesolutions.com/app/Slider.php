<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [ 'title','title2','description','btn_name','url', 'active','image' ];

    /**
     * @param $inputs
     * @param null $id
     * @return mixed
     */
    public function store($inputs, $id = null)
    {
        if($id)
        {
            $sliders = $this->findOrFail($id);
            return $sliders->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }
}
