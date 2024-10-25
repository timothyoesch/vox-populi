<?php
namespace App\Filament\Resources\ConfigurationResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\ConfigurationResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = ConfigurationResource::class;


    public function handler()
    {
        $query = static::getEloquentQuery();
        $query = QueryBuilder::for($query)
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters($this->getAllowedFilters() ?? [])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }

    public static function getModel()
    {
        return \App\Models\Configuration::class;
    }

}
