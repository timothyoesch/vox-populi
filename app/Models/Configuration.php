<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dataprotectiondisclaimer' => 'array',
    ];

    public function supporters(): HasMany
    {
        return $this->hasMany(Supporter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Change default query to only user's configurations unless super_admin
     */
    public function newQuery()
    {
        $query = parent::newQuery();
        if (!auth()->user()) {
            return $query;
        }
        if (!auth()->user()->hasRole('super_admin')) {
            // Query only user's configurations
            $query->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        return $query;
    }

}
