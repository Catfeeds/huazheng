<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
class SmsCaptcha extends Model
{
	public $timestamps = false;
    protected $table = 'sms_captcha';

    public function smsSend($phone){
        //验证码发送
        $add_arr = new SmsCaptcha;
        $add_arr->phone = $phone;
        $add_arr->add_time = time();
        
    }
    
}
