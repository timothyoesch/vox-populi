<?php
namespace App\Filament\Resources\ConfigurationResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ConfigurationResource;
use Illuminate\Routing\Router;


class ConfigurationApiService extends ApiService
{
    protected static string | null $resource = ConfigurationResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class,
            Handlers\SupportersHandler::class,
        ];

    }
}
