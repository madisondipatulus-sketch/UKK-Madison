<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->default(null),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('Categories')
                    ->disk('public')
                    ->default(null),

                Toggle::make('is_active')
                    ->label('Is active')
                    ->required(),
            ]);
    }
}