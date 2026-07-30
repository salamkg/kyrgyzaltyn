<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нашей компании — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент страницы «О компании» -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">{{ $about->title ?? 'О нашей компании' }}</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">{{ $about->title ?? 'О нашей компании' }}</h1>
        </div>

        <!-- Текстовое содержимое из базы данных / админки -->
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 prose max-w-none text-sm leading-relaxed text-gray-700 space-y-4">
            @if($about && $about->content)
                {!! $about->content !!}
            @else
                <p class="text-gray-500">Информация о компании пока не добавлена через панель администратора.</p>
            @endif
        </div>

    </main>

    <!-- Футер -->
    @include('partials.footer')

</body>
</html>