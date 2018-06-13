<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 12:02
 */

namespace AdminWeb\PayerPagSeguro\Tests\Fixtures;


use AdminWeb\Payer\Subscriptionable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','password','email'];
    use Subscriptionable;
}