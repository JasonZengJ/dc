<?php namespace diancan;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qiyu_order';
    public $timestamps = false;


    public function carts() {
        return $this->hasMany('diancan\Carts','cart_order','order_id2');
    }

    public function foods() {

    }

    public static function getOrderStatus($orderStatus)
    {
        switch($orderStatus) {

        }
    }
}
