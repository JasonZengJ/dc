<?php namespace diancan;

use Illuminate\Database\Eloquent\Model;

class FoodTypes extends Model {

	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qiyu_foodtype';

    public function foods() {

        return $this->hasMany('diancan\Foods','food_types_id','id');

    }

}
