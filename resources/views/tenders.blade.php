<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Объявления и тендеры — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент страницы Тендеры -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Объявления и тендеры</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Объявления и тендеры</h1>
        </div>

        <!-- Сетка карточек тендеров -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($tenders as $tender)
                <div class="bg-white rounded-xl p-6 border border-gray-200/80 shadow-sm relative overflow-hidden flex flex-col justify-between hover:shadow-md transition min-h-[220px]">
                    
                    <!-- Полупрозрачный логотип на фоне карточки как на оригинале -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none select-none">
                        <img src="{{ asset('logo.png') }}" alt="Watermark" class="w-48 object-contain">
                    </div>

                    <div class="relative z-10">
                        <div class="text-center mb-4">
                            <span class="text-xs text-gray-400 font-medium">{{ \Carbon\Carbon::parse($tender->published_at)->format('d/m/Y') }} ж.</span>
                        </div>
                        <h3 class="font-bold text-sm text-blue-950 text-center leading-snug line-clamp-4">
                            {{ $tender->title }}
                        </h3>
                    </div>

                    <div class="relative z-10 pt-4 mt-4 border-t border-gray-100 flex justify-between items-center text-xs">
                        @if($tender->file_path)
                            <a href="{{ asset('storage/' . $tender->file_path) }}" target="_blank" class="text-blue-900 font-semibold hover:text-yellow-600 transition flex items-center">
                                <i class="fa-solid fa-download mr-1.5 text-yellow-500"></i> Скачать файл
                            </a>
                        @else
                            <span></span>
                        @endif
                        <span class="text-gray-400 text-[10px]">ОАО «КыргызАлтын»</span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-400 text-xs">
                    Активные объявления и тендеры пока не добавлены.
                </div>
            @endforelse
        </div>

        <!-- Пагинация -->
        @if ($tenders->hasPages())
            <div class="flex justify-center items-center space-x-1 mt-10">
                @if ($tenders->onFirstPage())
                    <span class="px-3 py-2 text-xs font-medium text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">Назад</span>
                @else
                    <a href="{{ $tenders->previousPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Назад</a>
                @endif

                @foreach ($tenders->getUrlRange(1, $tenders->lastPage()) as $page => $url)
                    @if ($page == $tenders->currentPage())
                        <span class="px-3.5 py-2 text-xs font-bold text-white bg-blue-900 border border-blue-900 rounded-lg">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3.5 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($tenders->hasMorePages())
                    <a href="{{ $tenders->nextPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Следующая</a>
                @else
                    <span class="px-3 py-2 text-xs font-medium text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">Следующая</span>
                @endif
            </div>
        @endif

    </main>

    <!-- Футер -->
    @include('partials.footer')

</body>
</html>