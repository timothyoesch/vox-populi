<?php

namespace App\Filament\Exports;

use App\Models\Supporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SupporterExporter extends Exporter
{
    protected static ?string $model = Supporter::class;

    public static function getColumns(): array
    {
        $customFields = [];
        $i = 0;
        foreach (Supporter::getCustomFields() as $field) {
            // Access custom fields dynamically
            $customFields[] = ExportColumn::make("customFields.$i")
                ->state(function (Supporter $record) use ($field) {
                    return $record->getCustomField($field->name);
                })
                ->label($field->label[app()->getLocale()] ?? $field->name);
            $i++;
        }
        $columns = [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('firstname')
                ->label(__('labels.export.supporter.firstname')),
            ExportColumn::make('lastname')
                ->label(__('labels.export.supporter.lastname')),
            ExportColumn::make('email')
                ->label(__('labels.export.supporter.email')),
            ExportColumn::make('phone')
                ->label(__('labels.export.supporter.phone')),
            ExportColumn::make('zip')
                ->label(__('labels.export.supporter.zip')),
            ExportColumn::make('configuration.key')
                ->label(__('labels.export.supporter.configuration_id')),
            ExportColumn::make('optin')
                ->label(__('labels.export.supporter.optin')),
            ExportColumn::make('public')
                ->label(__('labels.export.supporter.public')),
            ExportColumn::make('created_at')
                ->label(__('labels.export.created_at')),
            ExportColumn::make('updated_at')
                ->label(__('labels.export.updated_at')),
            ExportColumn::make('deleted_at')
                ->label(__('labels.export.deleted_at')),
            ExportColumn::make('locale')
                ->label(__('labels.export.supporter.locale')),
        ];
        return array_merge($columns, $customFields);
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your supporter export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
