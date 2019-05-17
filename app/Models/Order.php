<?php

namespace App\Models;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    use Hashidable;
    /**
     * @var string
     */
    protected $connection = 'sales';

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo('App\User', 'issued_by');
    }

    /**
     * @return BelongsToMany
     */
    public function products() : BelongsToMany
    {
        return $this->belongsToMany('App\Models\Product', 'order_products', 'order_id', 'product_id')->withPivot('articles');
    }
}
