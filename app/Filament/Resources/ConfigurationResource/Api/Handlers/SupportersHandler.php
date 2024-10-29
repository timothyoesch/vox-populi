<?php
namespace App\Filament\Resources\ConfigurationResource\Api\Handlers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\AllowedFilter;
use App\Filament\Resources\ConfigurationResource;

class SupportersHandler extends Handlers {
    public static string | null $uri = '/{key}/supporters';
    public static string | null $resource = ConfigurationResource::class;

    public function handler(Request $request)
    {
        $query = static::getEloquentQuery();
        $key = $request->route('key');
        $query = $query->where('key', $key);
        if (!$query->exists()) return static::sendNotFoundResponse();

        $query = $query->first()->supporters();

        $query = QueryBuilder::for($query)
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters([
                'configuration_id',
                'email',
                'firstname',
                'lastname',
                AllowedFilter::scope('created_after'),
                'locale'
            ])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
