<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static ?string $navigationIcon   = 'heroicon-o-envelope';
    protected static ?string $navigationLabel  = 'Mensajes de Contacto';
    protected static ?string $navigationGroup  = 'Formularios';
    protected static ?int    $navigationSort   = 1;
    protected static ?string $modelLabel       = 'Mensaje';
    protected static ?string $pluralModelLabel = 'Mensajes de Contacto';

    public static function getNavigationBadge(): ?string
    {
        return (string) ContactMessage::unread()->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'warning';
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
            TextEntry::make('subject')->label('Asunto'),
            TextEntry::make('message')->label('Mensaje')->columnSpanFull(),
            TextEntry::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_read')->label('Leído')->boolean(),
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('subject')->label('Asunto')->limit(40),
                TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_read')->label('Leídos'),
            ])
            ->actions([
                ViewAction::make()->after(fn ($record) => $record->markAsRead()),
                Action::make('mark_read')->label('Marcar leído')
                    ->icon('heroicon-o-check')
                    ->action(fn ($record) => $record->markAsRead())
                    ->visible(fn ($record) => ! $record->is_read),
            ])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
        ];
    }
}
