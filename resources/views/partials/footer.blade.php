<footer class="bg-blue-950 text-white pt-12 pb-6 border-t border-blue-900 mt-12">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 mb-10 text-xs">
        <div>
            <h4 class="font-extrabold text-sm mb-3 text-yellow-400">ОАО «КыргызАлтын»</h4>
            <p class="text-gray-400 leading-relaxed">Крупнейшее отечественное предприятие Кыргызской Республики, специализирующееся на освоении месторождений золота.</p>
        </div>
        <div>
            <h5 class="font-bold uppercase tracking-wider mb-3 text-gray-300">Компания</h5>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('contacts.index') }}" class="hover:text-white transition">Контакты</a></li>
                <li><a href="{{ route('tenders.index') }}" class="hover:text-white transition">Тендеры</a></li>
                <li><a href="#" class="hover:text-white transition">Вакансии</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold uppercase tracking-wider mb-3 text-gray-300">Пресс-центр</h5>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('news.index') }}" class="hover:text-white transition">Новости</a></li>
                <li><a href="{{ route('reports.index') }}" class="hover:text-white transition">Отчеты</a></li>
                <li><a href="#" class="hover:text-white transition">Видеогалерея</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold uppercase tracking-wider mb-3 text-gray-300">Контакты</h5>
            <p class="text-gray-400 mb-1"><i class="fa-solid fa-phone text-yellow-400 mr-2"></i> +996 (312) 66-66-70</p>
            <p class="text-gray-400 mb-4"><i class="fa-solid fa-envelope text-yellow-400 mr-2"></i> info@kyrgyzaltyn.kg</p>
            
            <!-- Иконки социальных сетей -->
            <div class="flex items-center space-x-3 pt-1">
                <a href="https://www.facebook.com/kyrgyzaltyn.kg/" target="_blank" class="w-9 h-9 rounded-full bg-blue-900 hover:bg-yellow-500 hover:text-blue-950 text-white flex items-center justify-center transition shadow">
                    <i class="fa-brands fa-facebook-f text-sm"></i>
                </a>
                <a href="https://instagram.com/kyrgyzaltyn_kg_official" target="_blank" class="w-9 h-9 rounded-full bg-blue-900 hover:bg-yellow-500 hover:text-blue-950 text-white flex items-center justify-center transition shadow">
                    <i class="fa-brands fa-instagram text-sm"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-6 pt-6 border-t border-blue-900/60 text-center text-[11px] text-gray-500">
        &copy; {{ date('Y') }} ОАО «КыргызАлтын». Все права защищены.
    </div>
</footer>