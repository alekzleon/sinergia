<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerApplicationResource\Pages;
use App\Models\VolunteerApplication;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class VolunteerApplicationResource extends Resource
{
    protected static ?string $model = VolunteerApplication::class;
    protected static ?string $navigationIcon   = 'heroicon-o-hand-raised';
    protected static ?string $navigationLabel  = 'Solicitudes de Voluntariado';
    protected static ?string $navigationGroup  = 'Formularios';
    protected static ?int    $navigationSort   = 2;
    protected static ?string $modelLabel       = 'Solicitud';
    protected static ?string $pluralModelLabel = 'Voluntarios';

    public static function getNavigationBadge(): ?string
    {
        return (string) VolunteerApplication::pending()->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name')->label('Nombre'),
            TextEntry::make('email')->label('Email'),
            TextEntry::make('phone')->label('Teléfono'),
            TextEntry::make('age')->label('Edad'),
            TextEntry::make('city')->label('Ciudad'),
            TextEntry::make('occupation')->label('Ocupación'),
            TextEntry::make('status')->label('Estado')->badge()->color(fn ($state) => match($state) {
                'pending'   => 'warning',
                'reviewing' => 'info',
                'accepted'  => 'success',
                'rejected'  => 'danger',
            }),
            TextEntry::make('motivation')->label('Motivación')->columnSpanFull(),
            TextEntry::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i'),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('city')->label('Ciudad'),
                SelectColumn::make('status')->label('Estado')->options([
                    'pending'   => 'Pendiente',
                    'reviewing' => 'En revisión',
                    'accepted'  => 'Aceptado',
                    'rejected'  => 'Rechazado',
                ]),
                TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->label('Estado')->options([
                    'pending'   => 'Pendiente',
                    'reviewing' => 'En revisión',
                    'accepted'  => 'Aceptado',
                    'rejected'  => 'Rechazado',
                ]),
            ])
            ->actions([ViewAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVolunteerApplications::route('/'),
        ];
    }
}
