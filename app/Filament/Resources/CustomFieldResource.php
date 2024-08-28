<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomFieldResource\Pages;
use App\Filament\Resources\CustomFieldResource\RelationManagers;
use App\Models\CustomField;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomFieldResource extends Resource
{
    protected static ?string $model = CustomField::class;

    public static function getNavigationGroup(): ?string
    {
        return __("labels.navigation.settings");
    }
    /**
     * Translate navigation label
     */
    public static function getNavigationLabel(): string
    {
        return __('labels.navigation.customfields');
    }

    /**
     * Translate navigation singular label
     */
    public static function getModelLabel(): string
    {
        return __('labels.navigation.customfield');
    }

    /**
     * Translate navigation plural label
     */
    public static function getPluralModelLabel(): string
    {
        return __('labels.navigation.customfields');
    }

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make("labels")
                    ->label("customfield.label.labels")
                    ->columnSpanFull()
                    ->tabs(static::getLocaleTabs()),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options([
                        'text' => __('customfield.type.text'),
                        'textarea' => __('customfield.type.textarea'),
                        'select' => __('customfield.type.select'),
                        'multiselect' => __('customfield.type.multiselect'),
                        'checkbox' => __('customfield.type.checkbox'),
                        'radio' => __('customfield.type.radio'),
                    ]),
            ]);
    }

    protected static function getLocaleTabs(): array
    {
        $localeTabs = [];
        foreach (config('app.available_locales') as $locale) {
            $localeTabs[] = Forms\Components\Tabs\Tab::make($locale)
                ->schema([
                    Forms\Components\TextInput::make("label.{$locale}")
                        ->label("customfield.label.labels.{$locale}")
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomFields::route('/'),
            'create' => Pages\CreateCustomField::route('/create'),
            'edit' => Pages\EditCustomField::route('/{record}/edit'),
        ];
    }
}
