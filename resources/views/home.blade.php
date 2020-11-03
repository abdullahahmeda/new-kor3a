<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قرعة شركة يمن باص</title>
    {{-- <meta name="description" value="fdsa"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="bg-gray-200">

    <div class="">

        <div class="bg-white py-6 shadow-sm">
            <h1 class="text-center font-bold text-2xl"><i class="fas fa-trophy text-yellow-500"></i> قرعة هذا الاسبوع <i class="fas fa-trophy text-yellow-500"></i></h1>
        </div>

        <div class="container mt-8 mx-auto">

            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('type', 'default') }} rounded-md p-4 mb-4">
                    {{ Session::get('message') }}
                </div>
            @endif
            @error('phone')
                <div class="alert alert-danger rounded-md p-4 mb-4">
                    {{ $message }}
                </div>
            @enderror

            <div class="bg-green-300 shadow-md p-4 mb-6 rounded-md">
                <p class="mb-4">
                    التذاكر المجانية والمخفضة للرحلات من <strong>السعودية</strong> إلى <strong>اليمن</strong>
                </p>
                <form action="/" method="GET">
                    <div class="form-group flex items-center mb-2">
                        <label for="day" class="block w-24 font-bold">اختر اليوم:</label>
                        <select name="day" id="day" class="bg-gray-300">
                            <option value="" selected>الكل</option>
                            <option value="6" {{ Request::get('day') == '6' ? 'selected' : '' }}>السبت</option>
                            <option value="0" {{ Request::get('day') == '0' ? 'selected' : '' }}>الأحد</option>
                            <option value="1" {{ Request::get('day') == '1' ? 'selected' : '' }}>الاثنين</option>
                            <option value="2" {{ Request::get('day') == '2' ? 'selected' : '' }}>الثلاثاء</option>
                            <option value="3" {{ Request::get('day') == '3' ? 'selected' : '' }}>الأربعاء</option>
                            <option value="4" {{ Request::get('day') == '4' ? 'selected' : '' }}>الخميس</option>
                            <option value="5" {{ Request::get('day') == '5' ? 'selected' : '' }}>الجمعة</option>
                        </select>
                    </div>
                    <div class="form-group flex items-center mb-2">
                        <label class="block w-24 font-bold">نوع القرعة:</label>
                        <div>
                            <input type="radio" value="" checked name="type" id="all"> <label for="all">الكل</label>
                            <input type="radio" {{ Request::get('type') == 'free' ? 'checked' : '' }} class="mr-2" value="free" id="free" name="type"> <label for="free">مجانية</label>
                            <input type="radio" {{ Request::get('type') == 'discount' ? 'checked' : '' }} class="mr-2" value="discount" id="discount" name="type"> <label for="discount">مخفضة</label>
                        </div>
                    </div>
    
                    <button class="rounded-md bg-blue-600 hover:bg-blue-700 transition duration-300 text-white px-4 py-2 shadow-md hover:shadow-lg">بحث</button>
                </form>
            </div>

            <div class="mb-6">
            @forelse ($competitions as $competition)

                <div class="bg-white shadow-md p-4 rounded-md mb-4">
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-lg items-center text-gray-900">
                            <i class="fas fa-clock inline-block ml-1"></i> 
                            الرحلة يوم: <strong>{{ $competition->tripDate() }}</strong>
                        </p>
                        <div class="badge badge-{{ $competition->discount_percentage == 100 ? 'free' : 'discount' }} inline-block rounded-md mr-1 text-xs px-2 py-2 text-white">
                            {{ $competition->discount_percentage == 100 ? 'مجانية' : 'مخفضة' }}
                        </div>
                    </div>

                    @if ($competition->discount_percentage < 100)
                        <p class="text-lg items-center mb-1 text-gray-900"><i class="fas fa-tags inline-block ml-1"></i> نسبة التخفيض: <strong>{{ $competition->discount_percentage }}%</strong></p>
                    @endif

                    <p class="text-lg items-center mb-1 text-gray-900"><i class="fas fa-map-marker-alt inline-block ml-1"></i> الرحلة من <strong>{{ $competition->starting_place }}</strong> إلى <strong>{{ $competition->finishing_place }}</strong></p>
                    <p class="text-lg items-center mb-1 text-gray-900"><i class="fas fa-ticket-alt inline-block ml-1"></i> عدد التذاكر {{ $competition->discount_percentage == 100 ? 'المجانية' : 'المخفضة' }}: <strong>{{ $competition->available_tickets }}</strong></p>
                    <p class="text-lg items-center text-gray-900"><i class="fas fa-ad inline-block ml-1"></i> الشركة المقدمة: <strong>{{ $competition->sponsor }}</strong></p>

                    @if ($competition->banner)
                        <img src="{{ asset('storage/' . $competition->banner) }}" class="max-h-full mx-auto mt-4 banner" alt="{{ $competition->sponsor }}">
                    @endif

                    @if (!$competition->winner_id)
                        <div class="my-6">
                            <p class="text-center text-lg mb-4">سيتم اختيار الفائز خلال</p>
                            <div class="max-w-xs mx-auto flex justify-between countdown" data-start="{{ $competition->finish_at }}">
                                <div class="text-center pr-10">
                                    <p id="seconds_{{ $competition->id }}" class="seconds text-2xl font-bold">50</p>
                                    <p class="text-sm">ثانية</p>
                                </div>
                                <div class="text-center">
                                    <p id="minutes_{{ $competition->id }}" class="minutes text-2xl font-bold">40</p>
                                    <p class="text-sm">دقيقة</p>
                                </div>
                                <div class="text-center pl-10">
                                    <p id="hours_{{ $competition->id }}" class="hours text-2xl font-bold">20</p>
                                    <p class="text-sm">ساعة</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mx-auto text-center mt-6 bg-green-200 p-4 rounded-md shadow-md max-w-lg">
                        @if ($competition->winner_id)
                            <p class="text-lg font-bold">الفائز هو صاحب الرقم {{ $competition->winner->phone }}</p>
                            <p class="text-lg">ألف مبروك!</p>
                        @else
                        <p class="font-bold text-xl mb-2">إشترك الآن!</p>
                        <form action="{{ route('participant_competition.store', $competition) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>رقم الجوال للمسافر:</label>
                                <input type="text" class="border shadow-sm px-1 py-1 rounded-sm border-gray-500 mr-1 w-64" name="phone" placeholder="السعودية (+966) أو اليمن (+967)" required>
                            </div>
                            <button class="bg-green-600 hover:bg-green-700 transition duration-300 px-4 py-2 rounded-md shadow-md hover:shadow-lg mt-2 text-white">إحجز الرحلة</button>
                            <p class="text-xs mt-2">بمشاركتك فأنت توافق على <a href="/terms" target="_blank" class="text-gray-700">الشروط والأحكام</a></p>
                        </form>
                        @endif
                    </div>

                </div>

            @empty
                <p class="text-center text-xl">لا يوجد قرع</p>
            @endforelse
            </div>

        </div>
    </div>
    
    {{-- <div>
        <div class="container mx-auto">
            <h1>هذه القرعة مقدمة إليكم برعاية</h1>
            <img src="https://fakeimg.pl/300/" alt="الراعي">
        </div>
    </div> --}}

    <script>
        function countDown(elm) {
            var diffTime = Math.abs(new Date(elm.getAttribute('data-start')) - new Date());
            var diffHours = Math.ceil(diffTime / (1000 * 60 * 60)); 
            var diffMinutes = Math.ceil(diffTime / (1000 * 60)) % 60; 
            var diffSeconds = Math.ceil(diffTime / (1000)) % 60; 
            elm.querySelector('.seconds').textContent = diffSeconds;
            elm.querySelector('.minutes').textContent = diffMinutes;
            elm.querySelector('.hours').textContent = diffHours;
        }
        document.querySelectorAll('.countdown').forEach(function(elm) {
            countDown(elm);
            setInterval(function() {
                countDown(elm);
            }, 1000)
        })
    </script>
</body>
</html>