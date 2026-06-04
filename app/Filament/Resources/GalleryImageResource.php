<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImageResource\Pages;
use App\Models\GalleryImage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;
    protected static ?string $navigationIcon   = 'heroicon-o-photo';
    protected static ?string $navigationLabel  = 'Galería';
    protected static ?string $navigationGroup  = 'Contenido';
    protected static ?int    $navigationSort   = 4;
    protected static ?string $modelLabel       = 'Imagen de galería';
    protected static ?string $pluralModelLabel = 'Galería';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                FileUpload::make('image')->label('Imagen')->image()->required()->directory('gallery')->disk('images')->columnSpanFull(),
                TextInput::make('title')->label('Título (opcional)'),
                Select::make('category')->label('Categoría')->options([
                    'eventos'     => 'Eventos',
                    'actividades' => 'Actividades',
                    'equipo'      => 'Equipo',
                    'donaciones'  => 'Donaciones',
                    'talleres'    => 'Talleres',
                    'general'     => 'General',
                ]),
                TextInput::make('order')->label('Orden')->numeric()->default(0),
                Toggle::make('is_active')->label('Visible')->default(true),
                Textarea::make('caption')->label('Descripción/Pie de foto')->rows(2)->columnSpanFull(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('#')->sortable(),
                ImageColumn::make('image')->label('Imagen')->disk('images')->width(80)->height(55),
                TextColumn::make('title')->label('Título'),
                TextColumn::make('category')->label('Categoría')->badge(),
                IconColumn::make('is_active')->label('Visible')->boolean(),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListGalleryImages::route('/'),
            'create' => Pages\CreateGalleryImage::route('/create'),
            'edit'   => Pages\EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
