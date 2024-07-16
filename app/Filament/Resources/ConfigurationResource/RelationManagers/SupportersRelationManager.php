<?php

namespace App\Filament\Resources\ConfigurationResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\SupporterExporter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SupportersRelationManager extends RelationManager
{
    protected static string $relationship = 'supporters';

    public function form(Form $form): Form
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
                    ->label(__('labels.form.supporter.locale')),
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
                    ->label(__('labels.form.supporter.configuration')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('key')
            ->columns([
                Tables\Columns\TextColumn::make('firstname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('zip')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('locale')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(SupporterExporter::class),
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
