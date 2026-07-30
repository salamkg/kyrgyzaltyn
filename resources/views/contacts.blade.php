<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Шапка -->
    @include('partials.header')

    <!-- Основной контент страницы Контакты -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Хлебные крошки -->
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Контакты</span>
        </div>

        <!-- Заголовок с желтой линией -->
        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Контакты</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            
            <!-- Левая колонка: Контактные данные -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="font-bold text-base text-blue-950 border-b border-gray-100 pb-3">Свяжитесь с нами</h3>
                    
                    <!-- Адрес -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-900 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Адрес</p>
                            <p class="text-xs font-semibold text-gray-800 mt-0.5 leading-relaxed">Кыргызская Республика, г. Бишкек, улица Абдымомунова №195</p>
                        </div>
                    </div>

                    <!-- Телефон -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-900 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Телефон</p>
                            <a href="tel:+996312666670" class="text-xs font-semibold text-blue-900 hover:text-yellow-600 transition mt-0.5 block">+996 (312) 66-66-70</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-900 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Электронная почта</p>
                            <a href="mailto:info@kyrgyzaltyn.kg" class="text-xs font-semibold text-blue-900 hover:text-yellow-600 transition mt-0.5 block">info@kyrgyzaltyn.kg</a>
                        </div>
                    </div>

                    <!-- Социальные сети -->
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-3">Мы в социальных сетях</p>
                        <div class="flex items-center space-x-3">
                            <a href="https://www.facebook.com/kyrgyzaltyn.kg/" target="_blank" class="w-10 h-10 rounded-xl bg-blue-900 hover:bg-yellow-500 hover:text-blue-950 text-white flex items-center justify-center transition shadow-sm">
                                <i class="fa-brands fa-facebook-f text-sm"></i>
                            </a>
                            <a href="https://instagram.com/kyrgyzaltyn_kg_official" target="_blank" class="w-10 h-10 rounded-xl bg-blue-900 hover:bg-yellow-500 hover:text-blue-950 text-white flex items-center justify-center transition shadow-sm">
                                <i class="fa-brands fa-instagram text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Правая колонка: Карта / Офис -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 h-full flex flex-col">
                    <h3 class="font-bold text-base text-blue-950 mb-4">Наш офис на карте</h3>
                    <div class="relative flex-1 min-h-[350px] bg-gray-100 rounded-xl overflow-hidden border border-gray-200 flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80');">
                        <div class="absolute inset-0 bg-blue-950/40 backdrop-blur-[2px]"></div>
                        <div class="relative z-10 text-center text-white p-6 max-w-sm">
                            <div class="w-12 h-12 rounded-full bg-yellow-500 text-blue-950 flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <i class="fa-solid fa-location-dot text-lg"></i>
                            </div>
                            <p class="font-bold text-sm mb-1">ОАО «КыргызАлтын»</p>
                            <p class="text-xs text-gray-200">г. Бишкек, улица Абдымомунова №195</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- Футер -->
    @include('partials.footer')

</body>
</html>