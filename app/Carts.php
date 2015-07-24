<?php namespace diancan;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model {

	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qiyu_cart';
    public $timestamps = false;


    public function orders()
    {
        return $this->belongsTo('diancan\Orders');
    }

    public function food()
    {
        return $this->belongsTo('diancan\Foods','cart_food');
    }


}
