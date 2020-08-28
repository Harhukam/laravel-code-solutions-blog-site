<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [ 'email', 'faq','term_and_conditions','privacy_policy' ];

    /**
     * @param $inputs
     * @param null $id
     * @return mixed
     */
    public function store($inputs, $id = null)
    {
        if($id)
        {
            $sites = $this->findOrFail($id);
            return $sites->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}
