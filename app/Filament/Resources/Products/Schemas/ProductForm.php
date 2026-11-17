<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Info produk')->columns(2)->schema([
                    TextInput::make('name')->required()->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    TextInput::make('tagline'),
                    FileUpload::make('image')->image()->disk('public')->directory('products'),
                    Textarea::make('description')->columnSpanFull(),
                    Toggle::make('is_active')->label('Tampilkan')->default(true),
                ]),
                Section::make('Angka utama')->columns(4)->schema([
                    TextInput::make('max_speed')->label('Kecepatan (km/jam)')->numeric(),
                    TextInput::make('range_km')->label('Jarak (km)')->numeric(),
                    TextInput::make('power_w')->label('Daya (W)')->numeric(),
                    TextInput::make('trunk_l')->label('Bagasi (L)')->numeric(),
                    TextInput::make('display')->label('Layar'),
                ]),
                Section::make('Pilihan warna')->schema([
                    Repeater::make('colors')->relationship()->orderColumn('sort_order')
                        ->schema([
                            TextInput::make('name')->required(),
                            TextInput::make('hex')->placeholder('#000000'),
                            FileUpload::make('image')->image()->disk('public')->directory('colors'),
                        ])->columns(3)->addActionLabel('Tambah warna'),
                ]),
                Section::make('Spesifikasi tambahan')->schema([
                    Repeater::make('specs')->relationship()->orderColumn('sort_order')
                        ->schema([
                            TextInput::make('label')->required(),
                            TextInput::make('value')->required(),
                        ])->columns(2)->addActionLabel('Tambah spesifikasi'),
                ]),
            ]);
    }
}
