<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\ExchangeRate;
use Carbon\Carbon;

class FetchNbkrRates extends Command
{
    protected $signature = 'rates:fetch-nbkr';
    protected $description = 'Стягивает актуальные курсы валют с сайта НБ КР и сохраняет в БД';

    public function handle()
    {
        $url = 'https://www.nbkr.kg/XML/daily.xml';
        
        // Отключаем варнинги и загружаем XML через file_get_contents + simplexml_load_string для стабильности
        $xmlContent = @file_get_contents($url);
        
        if (!$xmlContent) {
            $this->error('Не удалось подключиться к сайту НБ КР.');
            return;
        }

        $xml = @simplexml_load_string($xmlContent);

        if ($xml === false) {
            $this->error('Ошибка парсинга XML-данных.');
            return;
        }

        // Получаем дату из атрибута the Date корневого тега <ValCurs>
        $dateAttr = (string) ($xml->attributes()->Date ?? date('d.m.Y'));
        
        try {
            $formattedDate = Carbon::createFromFormat('d.m.Y', $dateAttr)->toDateString();
        } catch (\Exception $e) {
            $formattedDate = Carbon::today()->toDateString();
        }

        $count = 0;

        // Проходим по всем элементам <Currency> (в НБ КР теги называются <Currency Rating="..."> с атрибутом ИСО)
        foreach ($xml->Currency as $currency) {
            $charCode = (string) $currency->attributes()->ISOCode; // USD, EUR, RUB, KZT
            // Значение курса внутри тега <Value>, убираем пробелы и меняем запятую на точку
            $rateValue = str_replace(',', '.', trim((string) $currency->Value));

            if ($charCode && $rateValue) {
                ExchangeRate::updateOrCreate(
                    [
                        'currency' => $charCode,
                        'date' => $formattedDate
                    ],
                    [
                        'rate' => $rateValue
                    ]
                );
                $count++;
            }
        }

        $this->info("Успешно загружено и обновлено курсов: {$count} за дату: {$formattedDate}");
    }
}
