<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\GoldBar;
use App\Models\ExchangeRate;
use App\Models\Report;
use App\Models\AboutPage;
use App\Models\BoardMember;
use App\Models\Tender;
use App\Models\Branch;
use App\Models\Feedback;
use App\Models\Director;
use App\Models\AuditCommission;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test11@example.com',
        // ]);

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

        News::create([
            'title' => 'ОАО «Кыргызалтын» внедряет передовые стандарты экологической и промышленной безопасности',
            'content' => 'На производственных участках компании завершился первый этап масштабного технического аудита, направленного на модернизацию очистных сооружений и минимизацию воздействия на экосистему региона.',
            'image_path' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80',
            'published_at' => '2026-06-02',
        ]);

        News::create([
            'title' => 'Делегация ОАО «Кыргызалтын» приняла участие в международном горно-металлургическом форуме',
            'content' => 'В ходе панельных дискуссий представители компании презентовали новые инвестиционные проекты и обсудили перспективы внедрения инновационных технологий золотодобычи.',
            'image_path' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80',
            'published_at' => '2026-05-10',
        ]);

        News::create([
            'title' => 'На рудниках ОАО «Кыргызалтын» досрочно выполнен квартальный план по добыче руды',
            'content' => 'Благодаря слаженной работе трудовых коллективов и бесперебойной поставке нового горно-шахтного оборудования, ключевые показатели производственной программы перевыполнены.',
            'image_path' => 'https://images.unsplash.com/photo-1579546929518-9e396f3cc809?auto=format&fit=crop&q=80',
            'published_at' => '2026-04-20',
        ]);

        // 1. Золотые мерные слитки (gold_bars)[cite: 1]
        GoldBar::truncate();
        GoldBar::create([
            'weight' => '1 г.',
            'buy_price' => '7250',
            'sell_price' => '7350',
        ]);
        GoldBar::create([
            'weight' => '31.1035 г. (1 унция)',
            'buy_price' => '225000',
            'sell_price' => '227500',
        ]);
        GoldBar::create([
            'weight' => '100 г.',
            'buy_price' => '720000',
            'sell_price' => '728000',
        ]);

        // 2. Курсы валют и металлов (exchange_rates)[cite: 2]
        ExchangeRate::truncate();
        ExchangeRate::create([
            'currency' => 'USD',
            'rate' => '89.50',
            'date' => '2026-07-30',
        ]);
        ExchangeRate::create([
            'currency' => 'EUR',
            'rate' => '96.20',
            'date' => '2026-07-30',
        ]);
        ExchangeRate::create([
            'currency' => 'XAU (Золото за 1 г)',
            'rate' => '7250.00',
            'date' => '2026-07-30',
        ]);

        // 3. Отчеты (reports)[cite: 3]
        Report::truncate();
        Report::create([
            'title' => 'Годовой отчет ОАО «КыргызАлтын» за прошедший финансовый год',
            'file_path' => 'reports/annual_report.pdf',
            'file_size' => '2.4 МБ',
            'published_at' => '2026-03-15',
        ]);
        Report::create([
            'title' => 'Финансовый отчет по итогам первого квартала',
            'file_path' => 'reports/q1_report.pdf',
            'file_size' => '1.1 МБ',
            'published_at' => '2026-05-10',
        ]);

        // 4. О компании (about_pages)[cite: 4]
        AboutPage::truncate();
        AboutPage::create([
            'title' => 'О нашей компании',
            'content' => 'ОАО «КыргызАлтын» — крупнейшее предприятие Кыргызской Республики, проводящее единую государственную политику в горнорудной отрасли, специализирующееся на добыче, переработке и аффинаже драгоценных металлов.',
        ]);

        // 5. Правление (board_members)[cite: 5]
        BoardMember::truncate();
        BoardMember::create([
            'name' => 'Абдраимов Кубат Бейшенбекович',
            'position' => 'Председатель Правления ОАО «КыргызАлтын»',
            'photo_path' => 'board/chairman.jpg',
            'sort_order' => 1,
        ]);
        BoardMember::create([
            'name' => 'Кадыров Эрнисбек Маратович',
            'position' => 'Заместитель Председателя Правления',
            'photo_path' => 'board/deputy.jpg',
            'sort_order' => 2,
        ]);

        // 6. Тендеры (tenders)[cite: 6]
        Tender::truncate();
        Tender::create([
            'title' => 'Закупка специализированного горно-шахтного оборудования и запасных частей',
            'description' => 'ОАО «КыргызАлтын» объявляет открытый конкурс среди поставщиков на закупку комплектующих для производственных филиалов.',
            'file_path' => 'tenders/tech_specs.pdf',
            'published_at' => '2026-07-20',
        ]);
        Tender::create([
            'title' => 'Услуги по проведению независимого аудита финансовой отчетности',
            'description' => 'Проведение аудиторской проверки в соответствии с международными стандартами.',
            'file_path' => 'tenders/audit_terms.pdf',
            'published_at' => '2026-07-10',
        ]);

        // 7. Филиалы и дочерние компании (branches)[cite: 7]
        Branch::truncate();
        Branch::create([
            'title' => 'Кумтор Голд Компани (КГК)',
            'image_path' => 'branches/kumtor.jpg',
            'content' => 'Крупнейшее предприятие по разработке высокогорного золоторудного месторождения Кумтор.',
            'sort_order' => 1,
        ]);
        Branch::create([
            'title' => 'Макмал Голд Компани',
            'image_path' => 'branches/makmal.jpg',
            'content' => 'Исторический производственный филиал, осуществляющий переработку золотосодержащих руд.',
            'sort_order' => 2,
        ]);

        // 8. Обращения / Отзывы (feedbacks)[cite: 8]
        Feedback::truncate();
        Feedback::create([
            'name' => 'Иванов Иван Иванович',
            'address' => 'г. Бишкек, ул. Абдрахманова 120',
            'phone' => '+996555123456',
            'email' => 'ivanov@example.com',
            'type' => 'заявление',
            'message' => 'Прошу предоставить информацию о графике работы точек реализации мерных золотых слитков.',
        ]);

        // 9. Совет директоров (directors)[cite: 9]
        Director::truncate();
        Director::create([
            'name' => 'Ибраев Медетбек Сапарбекович',
            'position' => 'Председатель Совета директоров',
            'photo_path' => 'directors/head.jpg',
            'sort_order' => 1,
        ]);

        // 10. Ревизионная комиссия (audit_commissions)[cite: 10]
        AuditCommission::truncate();
        AuditCommission::create([
            'name' => 'Абдыкадыров Чынгызбек Тентимишович',
            'position' => 'Председатель Ревизионной комиссии',
            'photo_path' => null,
            'sort_order' => 1,
        ]);
    }
}
