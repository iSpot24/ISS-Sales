<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * @var string
     */
    protected $connection = 'sales';

    /**
     * @var string
     */
    protected $table = 'order_products';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $guarded = [];

}
