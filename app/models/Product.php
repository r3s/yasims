<?php

class Product extends Eloquent {
    
    /*define which attributes are mass assignable (for security)*/
    protected $fillable = array('name', 'stock', 'active');

    
    /*Each product has many categories*/
    public function categories() {
        return $this->belongsToMany('category', 'products_categories', 'product_id', 'category_id');
    }

    /*Validate product*/
    public function validate()
    {
        $val = Validator::make($this->attributes, array(
            'name' => 'required|min:3|max:120|alpha_dash',
            'stock' => 'required|integer',
            'active' => 'required'
        ));

        if ($val->fails())
        {
            throw new ValidationException($val);
        }
    }

    public function validateStock(){
        $val = Validator::make($this->attributes, array(
            'stock' => 'integer',
            'active' => 'required'
        ));

        if ($val->fails())
        {
            throw new ValidationException($val);
        }

    }

}
