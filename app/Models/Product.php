<?php

namespace App\Models;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model implements Searchable
{
    use Hashidable, Sortable;
    /**
     * @var string
     */
    protected $connection = 'sales';

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var int
     */
    protected $perPage = 5;

    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'stock'];

    /**
     * @var array
     */
    public $sortable = ['name', 'price', 'stock'];

    /**
     * @return BelongsToMany
     */
    public function orders() : BelongsToMany
    {
        return $this->belongsToMany('App\Models\Order', 'order_products', 'product_id', 'order_id')->withPivot('articles');
    }

    /**
     * @param $value
     */
    public function setStock($value)
    {
        $this->attributes['stock'] = $this->attributes['stock'] - $value;
    }

    /**
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('searchProduct', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
