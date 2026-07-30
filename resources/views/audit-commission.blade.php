<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ревизионная комиссия — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент страницы Ревизионная комиссия -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Ревизионная комиссия</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Ревизионная комиссия</h1>
        </div>

        <!-- Сетка карточек -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($members as $member)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between transition hover:shadow-md space-y-4">
                    
                    @if($member->photo_path)
                        <div class="h-64 w-full rounded-xl overflow-hidden bg-gray-100 mb-2">
                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-full h-full object-cover object-top">
                        </div>
                    @endif

                    <div>
                        <h3 class="font-extrabold text-lg text-blue-950 mb-3 leading-snug">{{ $member->name }}</h3>
                        <div class="border-l-4 border-yellow-500 pl-3">
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">{{ $member->position }}</p>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-400 text-xs">
                    Список членов ревизионной комиссии пока не заполнен в панели администратора.
                </div>
            @endforelse
        </div>

    </main>

    <!-- Футер -->
    @include('partials.footer')

</body>
</html>