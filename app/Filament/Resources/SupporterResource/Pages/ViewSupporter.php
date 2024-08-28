<?php

namespace App\Filament\Resources\SupporterResource\Pages;

use App\Filament\Resources\SupporterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSupporter extends ViewRecord
{
    protected static string $resource = SupporterResource::class;

    /**
     * Define the header actions.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make("verify_email")
                ->label(__("labels.actions.verify_email"))
                ->requiresConfirmation()
                ->visible(fn ($record) => is_null($record->email_verified_at))
                ->action(fn ($record) => $record->markEmailAsVerified()),
        ];
    }
}
