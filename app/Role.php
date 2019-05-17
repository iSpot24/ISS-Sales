<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Role
 * @package App
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $connection = 'sales';

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
