<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчеты — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент отчетов -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Отчеты</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Отчеты</h1>
        </div>

        <!-- Список отчетов -->
        <div class="space-y-4 mb-12">
            @forelse($reports as $report)
                <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4 transition hover:shadow-md">
                    <div>
                        <h3 class="font-bold text-sm text-blue-950 mb-1.5">{{ $report->title }}</h3>
                        <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="text-xs font-semibold text-blue-900 hover:text-yellow-600 transition flex items-center">
                            <i class="fa-solid fa-download mr-1.5 text-yellow-500"></i> Скачать @if($report->file_size) ({{ $report->file_size }}) @endif
                        </a>
                    </div>
                    <div class="text-xs text-gray-400 shrink-0">
                        {{ \Carbon\Carbon::parse($report->published_at)->format('d.m.Y') }} ж.
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-xs">Отчеты пока не добавлены.</p>
            @endforelse
        </div>

        <!-- Пагинация -->
        @if ($reports->hasPages())
            <div class="flex justify-center items-center space-x-1 mt-10">
                @if ($reports->onFirstPage())
                    <span class="px-3 py-2 text-xs font-medium text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">Назад</span>
                @else
                    <a href="{{ $reports->previousPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Назад</a>
                @endif

                @foreach ($reports->getUrlRange(1, $reports->lastPage()) as $page => $url)
                    @if ($page == $reports->currentPage())
                        <span class="px-3.5 py-2 text-xs font-bold text-white bg-blue-900 border border-blue-900 rounded-lg">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3.5 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($reports->hasMorePages())
                    <a href="{{ $reports->nextPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Следующая</a>
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