<?php

class Category extends Eloquent {
    
    /*define which attributes are mass assignable (for security)*/
    protected $fillable = array('name', 'active');

    /*A category has many products*/
    public function products() {
        return $this->belongsToMany('Product', 'products_categories', 'category_id', 'product_id');
    }


    /*Validate Category*/
    public function validate()
    {
        $val = Validator::make($this->attributes, array(
            'name' => 'required|min:3|max:120|alpha_dash',
            'active' => 'required'
        ));

        if ($val->fails())
        {
            throw new ValidationException($val);
        }
    }

}
