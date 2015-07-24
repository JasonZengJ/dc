<?php namespace diancan;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model {

	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qiyu_food';
    public $timestamps = false;

    public function foodsType()
    {
        return $this->belongsTo('diancan\FoodsType','food_types_id');
    }


    public function carts()
    {
        return $this->hasMany('diancan\Carts','cart_food','id');
    }


}
