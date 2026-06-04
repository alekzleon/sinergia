<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon   = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel  = 'Programas / Servicios';
    protected static ?string $navigationGroup  = 'Contenido';
    protected static ?int    $navigationSort   = 2;
    protected static ?string $modelLabel       = 'Programa';
    protected static ?string $pluralModelLabel = 'Programas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Información del Programa')->schema([
                TextInput::make('title')->label('Título')->required(),
                TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true),
                TextInput::make('icon')->label('Ícono (heroicon, ej: heroicon-o-heart)'),
                Select::make('color')->label('Color')->options([
                    'primary'   => 'Azul (principal)',
                    'secondary' => 'Verde (esperanza)',
                    'accent'    => 'Naranja (humano)',
                    'lilac'     => 'Lila (inclusión)',
                ]),
                TextInput::make('order')->label('Orden')->numeric()->default(0),
                Toggle::make('is_active')->label('Activo')->default(true),
            ])->columns(2),

            Section::make('Descripción')->schema([
                \Filament\Forms\Components\Textarea::make('short_description')
                    ->label('Descripción corta (para tarjetas)')->required()->rows(3),
                RichEditor::make('description')->label('Descripción completa')->columnSpanFull(),
                FileUpload::make('image')->label('Imagen')->image()->directory('programs')->disk('images'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('#')->sortable(),
                ImageColumn::make('image')->label('Imagen')->disk('images')->width(50)->height(35),
                TextColumn::make('title')->label('Título')->searchable(),
                TextColumn::make('color')->label('Color')->badge(),
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
            'index'  => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit'   => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
