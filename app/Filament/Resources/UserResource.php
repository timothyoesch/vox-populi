<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Actions;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function getNavigationLabel(): string
    {
        return __('user.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return __('user.resource.label');
    }

    public static function getLabel(): string
    {
        return __('user.resource.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-users.group');
    }

    public function getTitle(): string
    {
        return __('user.resource.title.resource');
    }

    public static function form(Form $form): Form
    {
        $rows = [
            TextInput::make('name')
                ->required()
                ->label(__('user.resource.name')),
            TextInput::make('email')
                ->email()
                ->required()
                ->label(__('user.resource.email')),
            TextInput::make('password')
                ->label(__('user.resource.password'))
                ->password()
                ->maxLength(255)
                ->dehydrateStateUsing(static function ($state) use ($form) {
                    return !empty($state)
                            ? Hash::make($state)
                            : $form->getRecord()?->password;
                }),
            DateTimePicker::make('user_verified_at')
                ->label(__('labels.form.user.verified'))
                ->format('Y-m-d H:i:s')
                ->default(now()->format('Y-m-d H:i:s'))
        ];


        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            $rows[] = Forms\Components\Select::make('roles')
                ->multiple()
                ->preload()
                ->relationship('roles', 'name')
                ->label(__('user.resource.roles'));
        }

        $form->schema($rows);

        return $form;
    }

    public static function table(Table $table): Table
    {
        $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label(__('user.resource.id')),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label(__('user.resource.name')),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label(__('user.resource.email')),
                IconColumn::make('email_verified_at')
                    ->boolean()
                    ->sortable()
                    ->searchable()
                    ->label(__('user.resource.email_verified_at')),
                IconColumn::make('user_verified_at')
                    ->boolean()
                    ->sortable()
                    ->searchable()
                    ->label(__('labels.table.user.verified')),
                TextColumn::make('created_at')
                    ->label(__('user.resource.created_at'))
                    ->dateTime('M j, Y')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('user.resource.updated_at'))
                    ->dateTime('M j, Y')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->label(__('user.resource.email_verified'))
                    ->query(fn(Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->label(__('user.resource.email_unverified'))
                    ->query(fn(Builder $query): Builder => $query->whereNull('email_verified_at')),
            ])
            ->actions([
                Actions\Action::make("verify")
                    ->label(__('labels.table.actions.user.verify'))
                    ->visible(fn(User $user) => !$user->user_verified_at)
                    ->action(fn(User $user) => $user->update(['user_verified_at' => now()])),
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                ]),
            ]);
        return $table;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
