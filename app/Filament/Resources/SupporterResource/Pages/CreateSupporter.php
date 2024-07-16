<?php

namespace App\Filament\Resources\SupporterResource\Pages;

use App\Filament\Resources\SupporterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSupporter extends CreateRecord
{
    protected static string $resource = SupporterResource::class;

    /**
     * Get redirect url after successful creation.
     */
    protected function getRedirectUrl(): string
    {
        return SupporterResource::getUrl('view', [
            'record' => $this->record,
        ]);
    }
}
