<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронная приемная — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    @include('partials.header')

    <main class="max-w-5xl mx-auto px-6 py-8">
        
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Электронная приемная</span>
        </div>

        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Электронная приемная</h1>
        </div>

        <!-- Уведомление об успешной отправке -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl text-xs font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <!-- Блок правил и условий -->
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 space-y-4 text-xs leading-relaxed text-gray-700 mb-12">
            <ol class="list-decimal pl-5 space-y-3">
                <li>Для приема электронных обращений граждан создана электронная приемная, куда каждый гражданин может направить обращение по имеющимся у него вопросам.</li>
                <li>Согласно части 7 статьи 6-1 Закона Кыргызской Республики "О порядке рассмотрения обращений граждан", заявитель в своем электронном обращении в обязательном порядке указывает Ф.И.О., контактный телефон (домашний, мобильный или рабочий), адрес проживания.</li>
                <li>Заявитель в своем электронном обращении должен изложить суть и доводы своего обращения (при необходимости приложить копии имеющихся документов).</li>
                <li>Согласно статьи 7 Закона Кыргызской Республики “О внесении изменений и дополнений в Закон Кыргызской Республики “О порядке рассмотрения обращений граждан” от 15 июля 2013 года №144, <strong>государственный орган в праве не рассматривать электронные обращения в случае:</strong>
                    <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-600">
                        <li>содержания ненормативной лексики и оскорбительных высказываний;</li>
                        <li>призыва к свержению существующего государственного строя и разжиганию межнациональной и межконфессиональной розни;</li>
                        <li>заявителем не указаны контактные данные - Ф.И.О., контактный телефон (домашний, мобильный или рабочий), адрес проживания.</li>
                    </ul>
                </li>
            </ol>
        </div>

        <!-- Форма отправки обращения -->
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <div class="border-l-4 border-blue-900 pl-3 mb-6">
                <h2 class="text-xl font-extrabold text-blue-950">НАПИСАТЬ ОБРАЩЕНИЕ</h2>
            </div>

            <p class="text-xs text-red-600 mb-6 font-medium">
                Внимание! Все поля обязательны для заполнения! Обязательно укажите свой реальный e-mail. Именно на него вы будете получать уведомления о статусе вашего обращения.
            </p>

            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6 text-xs">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                    <label class="font-bold text-gray-700">Ф.И.О.*</label>
                    <div class="md:col-span-2">
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">
                        @error('name') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                    <label class="font-bold text-gray-700">Адрес проживания*</label>
                    <div class="md:col-span-2">
                        <input type="text" name="address" value="{{ old('address') }}" required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">
                        @error('address') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                    <div>
                        <label class="font-bold text-gray-700 block">Контактный телефон*</label>
                        <span class="text-[10px] text-gray-400 italic">Домашний, мобильный или рабочий</span>
                    </div>
                    <div class="md:col-span-2">
                        <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">
                        @error('phone') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                    <div>
                        <label class="font-bold text-gray-700 block">Адрес существующей электронной почты*</label>
                        <span class="text-[10px] text-gray-400 italic">На этот e-mail будут отправлены уведомления</span>
                    </div>
                    <div class="md:col-span-2">
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">
                        @error('email') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                    <label class="font-bold text-gray-700">Вид обращения*</label>
                    <div class="md:col-span-2">
                        <select name="type" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">
                            <option value="заявление">заявление</option>
                            <option value="жалоба">жалоба</option>
                            <option value="предложение">предложение</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 items-start gap-4">
                    <label class="font-bold text-gray-700 pt-2">Поле для ввода обращения*</label>
                    <div class="md:col-span-2">
                        <textarea name="message" rows="6" required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-900">{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 pt-2">
                    <div></div>
                    <div class="md:col-span-2">
                        <button type="submit" class="bg-blue-950 hover:bg-yellow-500 hover:text-blue-950 text-white font-bold uppercase tracking-wider px-8 py-3 rounded-xl transition shadow cursor-pointer">
                            Отправить
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </main>

    @include('partials.footer')

</body>
</html>