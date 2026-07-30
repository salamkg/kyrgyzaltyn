<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- Верхняя информационная полоса -->
    <div class="bg-blue-950 text-white text-xs py-2.5 px-6 border-b border-blue-900">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-6">
                <span><i class="fa-solid fa-phone text-yellow-400 mr-2"></i>+996 (312) 66-66-70</span>
                <span class="hidden md:inline"><i class="fa-solid fa-envelope text-yellow-400 mr-2"></i>info@kyrgyzaltyn.kg</span>
                <span class="hidden lg:inline text-gray-400"><i class="fa-solid fa-location-dot text-yellow-400 mr-2"></i>г. Бишкек, ул. Абдымомунова №195</span>
            </div>
            <div class="flex items-center space-x-6">
                <span class="text-gray-300 hidden sm:inline">Официальный портал</span>
                <div class="flex space-x-1 font-semibold">
                    <a href="#" class="px-2 py-0.5 bg-yellow-500 text-blue-950 rounded">КЫР</a>
                    <a href="#" class="px-2 py-0.5 hover:bg-blue-900 rounded transition">ENG</a>
                    <a href="#" class="px-2 py-0.5 hover:bg-blue-900 rounded transition">中文</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Основная шапка с логотипом и меню -->
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 shrink-0">
            <img src="{{ asset('logo.png') }}" alt="ОАО «КыргызАлтын»" class="h-10 w-auto object-contain">
        </a>

        <nav class="hidden lg:flex items-center space-x-6 text-xs font-semibold uppercase tracking-wider text-gray-700">
            <a href="{{ url('/') }}" class="py-2 hover:text-blue-900 transition {{ request()->is('/') ? 'text-blue-950 border-b-2 border-yellow-500' : '' }}">Главная</a>
            <a href="{{ route('about.index') }}" class="py-2 hover:text-blue-900 transition {{ request()->is('about*') ? 'text-blue-950 border-b-2 border-yellow-500' : '' }}">О компании</a>
            
            <!-- Выпадающее меню: Управление -->
            <div class="relative group py-2">
                <button class="hover:text-blue-900 transition cursor-pointer focus:outline-none uppercase tracking-wider font-semibold">
                    Управление
                </button>
                
                <!-- Выпадающий блок (появляется при наведении) -->
                <div class="absolute left-0 top-full pt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2 space-y-1 text-gray-700 font-medium">
                        <a href="{{ route('board.index') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Правление</a>
                        <a href="{{ route('directors.index') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Совет директоров</a>
                        <a href="{{ route('audit.index') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Ревизионная комиссия</a>
                    </div>
                </div>
            </div>

            <!-- Выпадающее меню: Предприятия -->
            <div class="relative group py-2">
                <button class="hover:text-blue-900 transition cursor-pointer focus:outline-none uppercase tracking-wider font-semibold">
                    Предприятия
                </button>
                
                <!-- Выпадающий блок (появляется при наведении) -->
                <div class="absolute left-0 top-full pt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2 space-y-1 text-gray-700 font-medium">
                        <a href="{{ route('branches.index') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Дочерние компании</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Совместные предприятия</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Филиалы</a>
                    </div>
                </div>
            </div>
            <a href="#" class="py-2 hover:text-blue-900 transition">Инвестиции</a>
            <!-- Выпадающее меню: LBMA -->
            <div class="relative group py-2">
                <button class="hover:text-blue-900 transition cursor-pointer focus:outline-none uppercase tracking-wider font-semibold">
                    LBMA
                </button>
                
                <!-- Выпадающий блок (появляется при наведении) -->
                <div class="absolute left-0 top-full pt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2 space-y-1 text-gray-700 font-medium">
                        <a href="{{ route('board.index') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Об LBMA</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Политика и руководство</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Сертификаты LBMA</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-900 transition">Отчеты по LBMA</a>
                    </div>
                </div>
            </div>
            <a href="#" class="py-2 hover:text-blue-900 transition">Слитки</a>
            <a href="{{ route('tenders.index') }}" class="py-2 hover:text-blue-900 transition">Тендеры</a>
            <a href="{{ route('contacts.index') }}" class="py-2 hover:text-blue-900 transition {{ request()->is('contacts*') ? 'text-blue-950 border-b-2 border-yellow-500' : '' }}">Контакты</a>
        </nav>

        <div class="flex items-center space-x-3">
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 w-10 h-10 rounded-full flex items-center justify-center transition cursor-pointer">
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </button>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/admin') }}" class="text-xs bg-blue-950 text-white px-4 py-2.5 rounded-lg font-medium hover:bg-yellow-500 hover:text-blue-950 transition">Админка</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs border border-gray-300 text-gray-700 px-4 py-2.5 rounded-lg font-medium hover:border-blue-950 transition">Войти</a>
                @endauth
            @endif
        </div>
    </div>

    <!-- Синее подменю -->
    <div class="bg-blue-900 text-white hidden md:block border-t border-blue-800">
        <div class="max-w-7xl mx-auto px-6 py-2.5 flex space-x-8 text-xs font-medium uppercase tracking-wider">
            <a href="{{ route('news.index') }}" class="hover:text-yellow-400 transition flex items-center {{ request()->is('news*') ? 'text-yellow-400' : '' }}"><i class="fa-solid fa-newspaper mr-1.5 text-yellow-400"></i> Новости</a>
            <a href="{{ route('reports.index') }}" class="hover:text-yellow-400 transition flex items-center {{ request()->is('reports*') ? 'text-yellow-400' : '' }}"><i class="fa-solid fa-chart-pie mr-1.5 text-yellow-400"></i> Отчеты</a>
            <a href="#" class="hover:text-yellow-400 transition flex items-center"><i class="fa-solid fa-scale-balanced mr-1.5 text-yellow-400"></i> Законодательство</a>
            <a href="{{ route('feedback.index') }}" class="hover:text-yellow-400 transition flex items-center {{ request()->is('feedback*') ? 'text-yellow-400' : '' }}"><i class="fa-solid fa-inbox mr-1.5 text-yellow-400"></i> Электронная приемная</a>
        </div>
    </div>
</header>