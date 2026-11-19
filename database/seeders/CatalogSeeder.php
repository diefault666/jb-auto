<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            [
                'product' => [
                    'name' => 'EVO',
                    'slug' => 'vinfast-evo',
                    'tagline' => 'Praktis & efisien',
                    'description' => 'Teman mobilitas harian dengan karakter praktis dan efisiensi perjalanan.',
                    'max_speed' => 80,
                    'range_km' => 150,
                    'power_w' => 5200,
                    'trunk_l' => 12,
                    'display' => 'LED berwarna',
                    'is_active' => true,
                    'sort_order' => 1,
                ],
                'colors' => [
                    ['name' => 'Black Matt', 'hex' => '#202124', 'image' => 'colors/evo-black-matt.webp'],
                    ['name' => 'Olive', 'hex' => '#68734b', 'image' => 'colors/evo-olive.webp'],
                    ['name' => 'Red', 'hex' => '#c92735', 'image' => 'colors/evo-red.webp'],
                    ['name' => 'White', 'hex' => '#f4f4f1', 'image' => 'colors/evo-white.webp'],
                ],
                'specs' => [
                    ['label' => 'Kecepatan maksimum', 'value' => '80 km/jam'],
                    ['label' => 'Jarak tempuh klaim (2 baterai)', 'value' => '150 km'],
                    ['label' => 'Daya maksimum', 'value' => '5.200 W'],
                    ['label' => 'Layar', 'value' => 'LED berwarna'],
                    ['label' => 'Smart Key', 'value' => '—'],
                    ['label' => 'Anti-theft', 'value' => '—'],
                    ['label' => 'Kapasitas bagasi', 'value' => '12 liter'],
                ],
            ],
            [
                'product' => [
                    'name' => 'FELIZ II',
                    'slug' => 'vinfast-feliz-ii',
                    'tagline' => 'Modern untuk perkotaan',
                    'description' => 'Desain modern, performa bertenaga, dan fitur pendukung aktivitas harian.',
                    'max_speed' => 90,
                    'range_km' => 145,
                    'power_w' => 5200,
                    'trunk_l' => 10,
                    'display' => 'LED berwarna',
                    'is_active' => true,
                    'sort_order' => 2,
                ],
                'colors' => [
                    ['name' => 'Black', 'hex' => '#202124', 'image' => 'colors/feliz-ii-black.webp'],
                    ['name' => 'Olive', 'hex' => '#68734b', 'image' => 'colors/feliz-ii-olive.webp'],
                    ['name' => 'Red', 'hex' => '#c92735', 'image' => 'colors/feliz-ii-red.webp'],
                    ['name' => 'White', 'hex' => '#f4f4f1', 'image' => 'colors/feliz-ii-white.webp'],
                ],
                'specs' => [
                    ['label' => 'Kecepatan maksimum', 'value' => '90 km/jam'],
                    ['label' => 'Jarak tempuh klaim (2 baterai)', 'value' => '145 km'],
                    ['label' => 'Daya maksimum', 'value' => '5.200 W'],
                    ['label' => 'Layar', 'value' => 'LED berwarna'],
                    ['label' => 'Smart Key', 'value' => '—'],
                    ['label' => 'Anti-theft', 'value' => '—'],
                    ['label' => 'Kapasitas bagasi', 'value' => '10 liter'],
                ],
            ],
            [
                'product' => [
                    'name' => 'VIPER',
                    'slug' => 'vinfast-viper',
                    'tagline' => 'Sporty & premium',
                    'description' => 'Tampilan sporty dengan fitur tambahan untuk pengalaman berkendara modern.',
                    'max_speed' => 90,
                    'range_km' => 145,
                    'power_w' => 5200,
                    'trunk_l' => 10,
                    'display' => 'TFT Smart',
                    'is_active' => true,
                    'sort_order' => 3,
                ],
                'colors' => [
                    ['name' => 'Beige-Black', 'hex' => '#cbb99b', 'image' => 'colors/viper-beige-black.webp'],
                    ['name' => 'Grey', 'hex' => '#858b91', 'image' => 'colors/viper-grey.webp'],
                    ['name' => 'Matte-Black', 'hex' => '#242629', 'image' => 'colors/viper-matte-black.webp'],
                    ['name' => 'Red-Black', 'hex' => '#c92735', 'image' => 'colors/viper-red-black.webp'],
                    ['name' => 'White', 'hex' => '#f4f4f1', 'image' => 'colors/viper-white.webp'],
                ],
                'specs' => [
                    ['label' => 'Kecepatan maksimum', 'value' => '90 km/jam'],
                    ['label' => 'Jarak tempuh klaim (2 baterai)', 'value' => '145 km'],
                    ['label' => 'Daya maksimum', 'value' => '5.200 W'],
                    ['label' => 'Layar', 'value' => 'TFT Smart'],
                    ['label' => 'Smart Key', 'value' => 'Ya'],
                    ['label' => 'Anti-theft', 'value' => 'Ya'],
                    ['label' => 'Kapasitas bagasi', 'value' => '10 liter'],
                ],
            ],
        ];

        foreach ($catalog as $item) {
            $product = Product::updateOrCreate(['slug' => $item['product']['slug']], $item['product']);

            $product->colors()->delete();
            foreach ($item['colors'] as $index => $color) {
                $product->colors()->create($color + ['sort_order' => $index + 1]);
            }

            $product->specs()->delete();
            foreach ($item['specs'] as $index => $spec) {
                $product->specs()->create($spec + ['sort_order' => $index + 1]);
            }
        }

        $faqs = [
            ['Benarkah motor listrik bisa lebih hemat daripada motor bensin?', 'Dalam simulasi, total biaya energi dan perawatan diperkirakan Rp840.000 per tahun untuk motor listrik, dibanding Rp4.200.000 untuk motor bensin. Selisih Rp3.360.000 per tahun berdasarkan asumsi 40 km per hari. Biaya aktual dapat berbeda.'],
            ['Berapa jarak tempuh motor listrik VinFast?', 'Klaim jarak tempuh dengan dua baterai adalah hingga 150 km untuk EVO dan hingga 145 km untuk FELIZ II serta VIPER dalam kondisi pengujian pabrikan. Jarak aktual dapat berbeda.'],
            ['Berapa harga motor listrik VinFast di Mataram?', 'Harga OTR Mataram dapat dikonfirmasi langsung kepada tim VinFast JB Sriwijaya melalui hotline (0370) 646444.'],
            ['Apakah saya harus membeli baterai?', 'Terdapat pilihan pembelian satu atau dua baterai serta skema sewa baterai. Ketersediaan paket dan biaya final perlu dikonfirmasi kepada dealer.'],
            ['Apakah bisa menukar baterai di Mataram?', 'Ya, Anda bisa menukar baterai langsung pada Dealer VinFast JB Sriwijaya, syarat dan ketentuan berlaku.'],
            ['Apakah tersedia promo?', 'Status, cakupan, dan syarat promo dapat berubah. Konfirmasikan promo yang sedang berlaku kepada tim VinFast JB Sriwijaya.'],
            ['Bagaimana dengan garansi dan layanan purna jual?', 'Tanyakan kepada tim VinFast JB Sriwijaya mengenai garansi resmi Indonesia, jadwal perawatan, ketersediaan suku cadang, dan dukungan purna jual yang berlaku untuk unit.'],
        ];

        foreach ($faqs as $index => [$question, $answer]) {
            Faq::firstOrCreate(
                ['question' => $question],
                ['answer' => $answer, 'is_active' => true, 'sort_order' => $index + 1],
            );
        }
    }
}
