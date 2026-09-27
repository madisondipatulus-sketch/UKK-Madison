<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->contentGrid([
            'xl' => 4,
            'lg' => 3,
            'md' => 3 ,
        ])
            ->columns([
                Grid::make([
                    'default' => 1
                ])->schema([
                    ImageColumn::make('profile_picture')
                    ->label('Profile Picture')
                    ->disk('public')
                    ->imageSIze(200),

                    Stack::make([
                        TextColumn::make('user.name')
                    ->label('Student Name')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->icon('heroicon-o-identification'),
                TextColumn::make('classroom.name')
                    ->label('Class')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-building-office'),
                TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Gender')
                    ->badge(),
                    ])

                ]),
                
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),

                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}