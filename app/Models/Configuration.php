<?php

namespace App\Models;

use App\Models\Supporter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rupadana\ApiService\Contracts\HasAllowedFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Configuration extends Model implements HasAllowedFilters
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

    public static function getAllowedFilters(): array
    {
        return [
            'key',
            'value',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }

}
