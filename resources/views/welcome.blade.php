<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ОАО «КыргызАлтын» — Официальный сайт</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Подключаем шапку -->
    @include('partials.header')

    <!-- Подключаем слайдер (только для главной) -->
    @include('partials.slider')

    <!-- Основной уникальный контент главной страницы -->
    <main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        
        <!-- Подключаем сайдбар -->
        <div class="lg:col-span-1">
            @include('partials.sidebar')
        </div>

        <!-- Уникальный контент главной (Новости + Карта) -->
        <div class="lg:col-span-3 space-y-12">
            <div>
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-extrabold text-blue-950">Новости компании</h3>
                        <p class="text-gray-500 text-xs mt-0.5">Последние события, пресс-релизы и фотоотчеты</p>
                    </div>
                    <a href="{{ route('news.index') }}" class="text-blue-900 font-bold text-xs uppercase tracking-wider hover:text-yellow-600 transition flex items-center">Все новости <i class="fa-solid fa-arrow-right ml-1.5"></i></a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($news as $item)
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-gray-100 flex flex-col justify-between">
                            <div>
                                <div class="h-40 w-full overflow-hidden bg-gray-100">
                                    <img src="{{ $item->image_path }}" alt="News" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                </div>
                                <div class="p-5">
                                    <span class="text-[10px] text-blue-900 font-bold bg-blue-50 px-2 py-0.5 rounded">{{ $item->published_at }}</span>
                                    <h4 class="font-bold text-sm text-blue-950 mt-2 mb-2 leading-snug hover:text-yellow-600 transition">{{ $item->title }}</h4>
                                    <p class="text-gray-600 text-xs leading-relaxed line-clamp-2">{{ $item->content }}</p>
                                </div>
                            </div>
                            <div class="p-5 pt-0">
                                <a href="{{ route('news.show', $item->id) }}" class="text-xs font-bold text-yellow-600 hover:text-yellow-700 flex items-center">Подробнее <i class="fa-solid fa-chevron-right ml-1 text-[10px]"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-extrabold text-lg text-blue-950">География предприятий и проектов</h3>
                </div>
                <div class="relative h-64 bg-gray-100 rounded-xl overflow-hidden border border-gray-200 flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80');">
                    <div class="absolute inset-0 bg-blue-950/40 backdrop-blur-[2px]"></div>
                    <div class="relative z-10 text-center text-white p-4">
                        <i class="fa-solid fa-map-location-dot text-4xl text-yellow-400 mb-2"></i>
                        <p class="font-bold text-sm">Интерактивная карта филиалов ОАО «КыргызАлтын»</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Подключаем футер -->
    @include('partials.footer')

</body>
</html>