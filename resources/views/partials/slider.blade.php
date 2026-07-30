<section class="relative text-white py-20 overflow-hidden min-h-[460px] flex items-center">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-blue-950/75 z-10"></div>
        <div class="slide-bg absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000" style="background-image: url('https://images.unsplash.com/photo-1610375461246-83df859d849d?auto=format&fit=crop&q=80');"></div>
        <div class="slide-bg absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000" style="background-image: url('https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&q=80');"></div>
        <div class="slide-bg absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000" style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80');"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-20 w-full grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-3xl sm:text-5xl font-extrabold leading-tight tracking-tight">
                Освоение месторождений золота и развитие горнорудной отрасли КР
            </h2>
            <div class="flex space-x-2 pt-4">
                <button onclick="currentSlide(0)" class="slider-dot w-8 h-2 rounded-full bg-yellow-500 transition-all cursor-pointer"></button>
                <button onclick="currentSlide(1)" class="slider-dot w-3 h-2 rounded-full bg-white/50 transition-all cursor-pointer"></button>
                <button onclick="currentSlide(2)" class="slider-dot w-3 h-2 rounded-full bg-white/50 transition-all cursor-pointer"></button>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/20 shadow-xl space-y-6 text-xs">
            <div>
                <div class="flex justify-between items-center mb-3 border-b border-white/10 pb-2">
                    <span class="font-bold text-yellow-400 text-sm flex items-center"><i class="fa-solid fa-coins mr-2"></i> Золотые слитки</span>
                    <span class="text-[10px] text-gray-300">Выкуп / Продажа</span>
                </div>
                <div class="space-y-1.5">
                    <div class="flex justify-between py-1 border-b border-white/5"><span>1 г.</span> <span class="font-semibold text-yellow-300">12 615 с. / 13 069 с.</span></div>
                    <div class="flex justify-between py-1 border-b border-white/5"><span>5 г.</span> <span class="font-semibold text-yellow-300">58 318 с. / 60 410 с.</span></div>
                    <div class="flex justify-between py-1 border-b border-white/5"><span>10 г.</span> <span class="font-semibold text-yellow-300">115 403 с. / 122 301 с.</span></div>
                    <div class="flex justify-between py-1 border-b border-white/5"><span>31.1035 г. (Тр. унция)</span> <span class="font-semibold text-yellow-300">356 882 с. / 379 783 с.</span></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-2 border-b border-white/10 pb-1.5 font-bold text-yellow-400">
                    <span>Курсы НБРК (из БД)</span>
                    <span>{{ date('d.m.Y') }}</span>
                </div>
                <div class="grid grid-cols-4 gap-1 text-center font-medium bg-black/20 p-2 rounded-lg">
                    <div>USD: <span class="text-yellow-300 block">{{ $rates['USD']->rate ?? '—' }}</span></div>
                    <div>EUR: <span class="text-yellow-300 block">{{ $rates['EUR']->rate ?? '—' }}</span></div>
                    <div>RUB: <span class="text-yellow-300 block">{{ $rates['RUB']->rate ?? '—' }}</span></div>
                    <div>KZT: <span class="text-yellow-300 block">{{ $rates['KZT']->rate ?? '—' }}</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide-bg');
    const dots = document.querySelectorAll('.slider-dot');
    function showSlide(index) {
        if(slides.length === 0) return;
        slides.forEach((slide, i) => { slide.style.opacity = i === index ? '1' : '0'; });
        dots.forEach((dot, i) => {
            dot.classList.toggle('w-8', i === index);
            dot.classList.toggle('w-3', i !== index);
            dot.classList.toggle('bg-yellow-500', i === index);
            dot.classList.toggle('bg-white/50', i !== index);
        });
    }
    function nextSlide() { currentIndex = (currentIndex + 1) % slides.length; showSlide(currentIndex); }
    function currentSlide(index) { currentIndex = index; showSlide(currentIndex); }
    if(slides.length > 0) { setInterval(nextSlide, 5000); }
</script>