<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Supporter;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\SupporterExporter;
use App\Filament\Resources\SupporterResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SupporterResource\RelationManagers;

class SupporterResource extends Resource
{
    protected static ?string $model = Supporter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ToggleButtons::make("locale")
                    ->options([
                        'de' => __("labels.form.supporter.locale.de"),
                        'fr' => __("labels.form.supporter.locale.fr"),
                        'it' => __("labels.form.supporter.locale.it"),
                    ])
                    ->default('de')
                    ->inline()
                    ->columnSpanFull()
                    ->label(__('lables.form.supporter.locale')),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->label(__('labels.form.supporter.firstname'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->label(__('labels.form.supporter.lastname'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label(__('labels.form.supporter.email'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->label(__('labels.form.supporter.phone'))
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('zip')
                    ->maxLength(255)
                    ->label(__('labels.form.supporter.zip'))
                    ->default(null),
                Forms\Components\Select::make('configuration_id')
                    ->relationship('configuration', 'key')
                    ->label(__('labels.form.supporter.configuration'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname')
                    ->label(__('labels.table.supporter.firstname'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->label(__('labels.table.supporter.lastname'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('labels.table.supporter.email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('labels.table.supporter.phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip')
                    ->label(__('labels.table.supporter.zip'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('configuration.id')
                    ->label(__('labels.table.supporter.configuration'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('labels.table.supporter.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('labels.table.supporter.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('labels.table.supporter.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(SupporterExporter::class),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('activities')
                    ->label(__('lables.actions.activities'))
                    ->url(fn($record) => SupporterResource::getUrl('activities', ['record' => $record])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupporters::route('/'),
            'create' => Pages\CreateSupporter::route('/create'),
            'edit' => Pages\EditSupporter::route('/{record}/edit'),
            'view' => Pages\ViewSupporter::route('/{record}'),
            'activities' => Pages\ActivityLogPage::route('/{record}/activities'),
        ];
    }
    /**
     * Translate navigation label
     */
    public static function getNavigationLabel(): string
    {
        return __('labels.navigation.supporters');
    }

    /**
     * Translate navigation singular label
     */
    public static function getModelLabel(): string
    {
        return __('labels.navigation.supporter');
    }

    /**
     * Translate navigation plural label
     */
    public static function getPluralModelLabel(): string
    {
        return __('labels.navigation.supporters');
    }
}
