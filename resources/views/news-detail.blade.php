<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }} — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент детальной страницы новости -->
    <main class="max-w-4xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <a href="{{ route('news.index') }}" class="hover:text-blue-900 transition">Новости</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium truncate max-w-xs inline-block align-bottom">{{ $newsItem->title }}</span>
        </div>

        <!-- Карточка новости -->
        <article class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 space-y-6">
            
            <!-- Дата публикации -->
            <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium">
                <i class="fa-regular fa-clock text-yellow-500"></i>
                <span>{{ $newsItem->published_at }} ж.</span>
            </div>

            <!-- Заголовок -->
            <h1 class="text-2xl sm:text-3xl font-extrabold text-blue-950 leading-tight">
                {{ $newsItem->title }}
            </h1>

            <!-- Главная картинка новости -->
            @if($newsItem->image_path)
                <div class="rounded-xl overflow-hidden shadow-sm max-h-[450px] bg-gray-100">
                    <img src="{{ $newsItem->image_path }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Текст / Содержание новости -->
            <div class="prose max-w-none text-sm leading-relaxed text-gray-700 space-y-4 pt-2">
                {!! nl2br(e($newsItem->content)) !!}
            </div>

            <!-- Кнопка возврата к списку -->
            <div class="pt-6 border-t border-gray-100">
                <a href="{{ route('news.index') }}" class="inline-flex items-center text-xs font-bold text-blue-900 hover:text-yellow-600 transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Назад к списку новостей
                </a>
            </div>

        </article>

    </main>

    <!-- Футер -->
    @include('partials.footer')

</body>
</html>