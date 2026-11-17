<?php

namespace App\Filament\Resources\Promos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('label')->placeholder('Promo Akhir Tahun'),
                Textarea::make('description')->columnSpanFull(),
                FileUpload::make('image')->image()->disk('public')->directory('promos'),
                TextInput::make('link_url')->label('Link / WhatsApp')->url(),
                DatePicker::make('starts_at')->label('Mulai'),
                DatePicker::make('ends_at')->label('Berakhir'),
                Toggle::make('is_active')->label('Tampilkan')->default(true),
            ]);
    }
}
