<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body class="font-[Poppins]">
    <div class="inline-flex items-center top-0 w-full">
        <div class="logo">
            <a href="/beranda"><img src="/img/logo.png" alt="Logo" class="w-[80px] ml-10 mt-5 mb-5 rounded-lg"></a>
        </div>
        <div class="absolute top-8 right-10 flex">
            <span>
                <form action="/keranjang" method="GET">
                    <button type="submit" class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                        <i class="fa-sharp fa-regular fas fa-cart-shopping" style="color: white;"></i>
                        <p class="hidden md:inline">Keranjang</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span>
                <form action="/pesanan-1" method="GET">
                    <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                        <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                        <p class="hidden md:inline">Pesanan</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#E42217]">
                <i class="fa-solid fas fa-right-from-bracket"></i>
                <a href="/logout" class="hidden md:inline">logout</a>
            </span>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#8ABE53] border-0 dark:bg-[#8ABE53]">
    @if (session('empty'))
        <div>{{ session('empty') }}</div>
    @endif
    <div class="grid grid-cols-2 gap-2 md:grid-cols-6 md:gap-6">
        @foreach ($barang as $b)
        <div class="relative h-[320px] w-[170px] mx-auto mt-5 rounded-lg bg-[#EDF1D6]">
            <div class="relative h[150px] w-[150px] absolute top-2 left-2 right-2 rounded-md bg-right">
                <div>
                    <img src="/img/{{ $b->foto }}" alt="{{$b->namaBarang}}" class="h-[170px] rounded-sm">
                </div>
                <div class="absolute top-1 right-2">
                    {{$b->hrgTinggi}}/{{ $b->satuan }}
                </div>
                <div class="absolute top-[85%] right-2">
                    Stock : {{ $b->stok }}
                </div>
            </div>
            <div class="absolute bottom-[100px] left-2 font-bold text-md">
                {{ $b->namaBarang }}
            </div>
            <div class="absolute bottom-[70px] left-2">
                <p class="font-light">{{ $b->namaLapak }}</p>
            </div>
            <div class="absolute bottom-5">
                <form action="/beranda/ {{$b->id}}" method="POST">
                    @csrf
                    <button type="submit" class="bg-[#8ABE53] hover:bg-[#557532] px-8 py-1 ml-2 rounded-lg font-bold text-white">+Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>