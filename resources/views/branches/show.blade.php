<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $branch->title }} — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    @include('partials.header')

    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <a href="{{ route('branches.index') }}" class="hover:text-blue-900 transition">Дочерние компании</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">{{ $branch->title }}</span>
        </div>

        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">{{ $branch->title }}</h1>
        </div>

        <!-- Основная информация компании -->
        <article class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 space-y-6 mb-16">
            <div class="rounded-xl overflow-hidden shadow-sm max-h-[450px] bg-gray-100 mb-6">
                <img src="{{ asset('storage/' . $branch->image_path) }}" alt="{{ $branch->title }}" class="w-full h-full object-cover">
            </div>
            
            <div class="prose max-w-none text-sm leading-relaxed text-gray-700 space-y-4">
                {!! $branch->content !!}
            </div>
        </article>

        <!-- Блок: ДРУГИЕ ФИЛИАЛЫ -->
        <section class="mb-12">
            <h2 class="text-2xl font-extrabold text-blue-950 mb-6">Другие филиалы</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($otherBranches as $other)
                    <div class="relative rounded-xl overflow-hidden shadow-sm group h-56 flex flex-col justify-end p-5 border border-gray-100">
                        <div class="absolute inset-0 bg-cover bg-center transition duration-500 group-hover:scale-105" style="background-image: url('{{ asset('storage/' . $other->image_path) }}');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        
                        <div class="relative z-10">
                            <h3 class="font-bold text-base text-white mb-3 leading-snug">{{ $other->title }}</h3>
                            <a href="{{ route('branches.show', $other->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-blue-950 font-bold text-xs uppercase px-4 py-2 rounded-lg transition shadow">
                                Подробнее
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    @include('partials.footer')

</body>
</html>