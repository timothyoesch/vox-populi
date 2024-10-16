<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigurationResource\Pages;
use App\Filament\Resources\ConfigurationResource\RelationManagers;
use App\Models\Configuration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfigurationResource extends Resource
{
    protected static ?string $model = Configuration::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function getNavigationGroup(): ?string
    {
        return __("labels.navigation.settings");
    }

    /**
     * Translate navigation label
     */
    public static function getNavigationLabel(): string
    {
        return __('labels.navigation.configurations');
    }

    /**
     * Translate navigation singular label
     */
    public static function getModelLabel(): string
    {
        return __('labels.navigation.configuration');
    }

    /**
     * Translate navigation plural label
     */
    public static function getPluralModelLabel(): string
    {
        return __('labels.navigation.configurations');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label(__("labels.form.configuration.key"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Tabs::make("dataprotectiondisclaimer")
                    ->columnSpanFull()
                    ->tabs(static::getLocaleTabs()),
            ]);
    }

    protected static function getLocaleTabs(): array
    {
        $localeTabs = [];
        foreach (config('app.available_locales') as $locale) {
            $localeTabs[] = Forms\Components\Tabs\Tab::make($locale)
                ->schema([
                    Forms\Components\RichEditor::make("dataprotectiondisclaimer.{$locale}")
                        ->label("dataprotectiondisclaimer.label.labels.{$locale}")
                        ->required()
                        ->maxLength(255),
                ])
                ->label("languages.{$locale}");
        }
        return $localeTabs;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label(__("labels.table.configuration.key"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("labels.table.configuration.created_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("labels.table.configuration.updated_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__("labels.table.configuration.deleted_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            RelationManagers\SupportersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigurations::route('/'),
            'create' => Pages\CreateConfiguration::route('/create'),
            'edit' => Pages\EditConfiguration::route('/{record}/edit'),
            'view' => Pages\ViewConfiguration::route('/{record}'),
        ];
    }
}
