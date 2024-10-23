<?php
namespace App\Filament\Resources\SupporterResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\SupporterResource;
use Illuminate\Routing\Router;


class SupporterApiService extends ApiService
{
    protected static string | null $resource = SupporterResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
