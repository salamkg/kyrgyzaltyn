<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент страницы новостей -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Новости</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Новости</h1>
        </div>

        <!-- Сетка новостей из БД -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @foreach($news as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ $item->image_path }}" alt="News image" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-6">
                            <span class="text-xs text-gray-400 font-medium"><i class="fa-regular fa-clock mr-1 text-yellow-500"></i> {{ $item->published_at }} ж.</span>
                            <h3 class="font-bold text-base text-blue-950 mt-2 mb-3 leading-snug hover:text-yellow-600 transition">{{ $item->title }}</h3>
                            <p class="text-gray-600 text-xs leading-relaxed line-clamp-3">{{ $item->content }}</p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-0">
                        <a href="{{ route('news.show', $item->id) }}" class="text-xs font-semibold text-yellow-600 hover:text-yellow-700 flex items-center">Подробнее <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        @if ($news->hasPages())
            <div class="flex justify-center items-center space-x-1 mt-10">
                @if ($news->onFirstPage())
                    <span class="px-3 py-2 text-xs font-medium text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">Назад</span>
                @else
                    <a href="{{ $news->previousPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Назад</a>
                @endif

                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                    @if ($page == $news->currentPage())
                        <span class="px-3.5 py-2 text-xs font-bold text-white bg-blue-900 border border-blue-900 rounded-lg">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3.5 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($news->hasMorePages())
                    <a href="{{ $news->nextPageUrl() }}" class="px-3 py-2 text-xs font-medium text-blue-950 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">Следующая</a>
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