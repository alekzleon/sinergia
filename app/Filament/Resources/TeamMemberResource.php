<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;
    protected static ?string $navigationIcon   = 'heroicon-o-user-group';
    protected static ?string $navigationLabel  = 'Equipo';
    protected static ?string $navigationGroup  = 'Contenido';
    protected static ?int    $navigationSort   = 3;
    protected static ?string $modelLabel       = 'Miembro del equipo';
    protected static ?string $pluralModelLabel = 'Equipo';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Información Personal')->schema([
                TextInput::make('name')->label('Nombre completo')->required(),
                TextInput::make('role')->label('Cargo / Rol')->required(),
                Textarea::make('bio')->label('Biografía breve')->rows(4),
                FileUpload::make('photo')->label('Fotografía')->image()->directory('team')->disk('public'),
                TextInput::make('order')->label('Orden')->numeric()->default(0),
                Toggle::make('is_active')->label('Activo')->default(true),
            ])->columns(2),

            Section::make('Redes Sociales (opcional)')->schema([
                TextInput::make('email')->label('Email')->email(),
                TextInput::make('linkedin')->label('LinkedIn')->url(),
                TextInput::make('facebook')->label('Facebook')->url(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('#')->sortable(),
                ImageColumn::make('photo')->label('Foto')->disk('public')->circular()->width(40)->height(40),
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('role')->label('Cargo'),
                IconColumn::make('is_active')->label('Activo')->boolean(),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit'   => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
