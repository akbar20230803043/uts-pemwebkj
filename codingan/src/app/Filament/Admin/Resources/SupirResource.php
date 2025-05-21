<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SupirResource\Pages;
use App\Filament\Admin\Resources\SupirResource\RelationManagers;
use App\Models\Supir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupirResource extends Resource
{
    protected static ?string $model = Supir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\TextInput::make('nik')->required()->unique(),
            Forms\Components\DatePicker::make('tanggal_lahir'),
            Forms\Components\Select::make('jenis_kelamin')
                ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])
                ->required(),
            Forms\Components\TextInput::make('alamat'),
            Forms\Components\TextInput::make('telepon'),
            Forms\Components\TextInput::make('no_sim'),
            Forms\Components\Select::make('jenis_sim')
                ->options(['A' => 'A', 'B1' => 'B1', 'B2' => 'B2', 'C' => 'C']),
            Forms\Components\DatePicker::make('sim_terbit'),
            Forms\Components\DatePicker::make('sim_expired'),
            Forms\Components\Select::make('status')
                ->options(['Aktif' => 'Aktif', 'Nonaktif' => 'Nonaktif', 'Cuti' => 'Cuti']),
            Forms\Components\DatePicker::make('tanggal_bergabung'),
            Forms\Components\TextInput::make('kendaraan_dikuasai'),
            Forms\Components\TextInput::make('pengalaman')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('nik'),
            Tables\Columns\TextColumn::make('jenis_kelamin'),
            Tables\Columns\TextColumn::make('no_sim'),
            Tables\Columns\TextColumn::make('jenis_sim'),
            Tables\Columns\TextColumn::make('status'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options(['Aktif' => 'Aktif', 'Nonaktif' => 'Nonaktif', 'Cuti' => 'Cuti']),
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
            'index' => Pages\ListSupirs::route('/'),
            'create' => Pages\CreateSupir::route('/create'),
            'edit' => Pages\EditSupir::route('/{record}/edit'),
        ];
    }
}
