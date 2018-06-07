<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
class VipOrder extends Model
{
    protected $table = 'vip_order';
    protected $primaryKey = 'order_id';
    public function UserTo(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
