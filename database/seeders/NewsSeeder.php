<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Очищаем старые записи, чтобы не было дублей
        News::truncate();

        News::create([
            'title' => 'Заместитель Главы Кабмина Эрлист Акунбеков принял участие в открытии оздоровительного центра «Кыргызалтын Резорт» в Иссык-Кульской области',
            'content' => 'Официальное открытие модернизированного оздоровительного центра состоялось на побережье Иссык-Куля.',
            'image_path' => 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?auto=format&fit=crop&q=80',
            'published_at' => '2026-07-15',
        ]);

        News::create([
            'title' => 'ОАО «Кыргызалтын» укрепляет позиции надежного партнера на мировом рынке',
            'content' => 'Компания продолжает расширять международное сотрудничество и укреплять свои позиции в сфере реализации драгоценных металлов.',
            'image_path' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&q=80',
            'published_at' => '2026-06-16',
        ]);

        News::create([
            'title' => 'Глава Кабинета Министров Адылбек Касымалиев принял участие в церемонии открытия международного логистического центра «Алтын Логистик» в городе Балыкчы',
            'content' => 'Запуск нового логистического центра направлен на улучшение транспортно-логистической инфраструктуры и производственных цепочек.',
            'image_path' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80',
            'published_at' => '2026-05-28',
        ]);

        News::create([
            'title' => 'Председатель Правления ОАО «Кыргызалтын» Кубат Абдраимов ознакомился с ходом производства филиала «Макмал Голд Компани»',
            'content' => 'Рабочая поездка руководства компании на производственные объекты южного региона страны для оценки текущих показателей.',
            'image_path' => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80',
            'published_at' => '2026-05-19',
        ]);
    }
}
