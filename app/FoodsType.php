<?php namespace diancan;

use Illuminate\Database\Eloquent\Model;

class FoodsType extends Model {

	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qiyu_foodtype';
    public $timestamps = false;

    public function foods() {

        return $this->hasMany('diancan\Foods','food_types_id','id');

    }

}
