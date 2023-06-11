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
    <style>
        body {background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23c3a878' fill-opacity='0.17' fill-rule='evenodd'/%3E%3C/svg%3E");};
    </style>
</head>
<body class="font-[Poppins]">
    <div class="inline-flex items-center top-0 w-full">
        <div class="logo">
            <a href="/beranda"><img src="/img/newLogo.png" alt="Logo" class="h-[120px] w-[220px] ml-10 rounded-lg"></a>
        </div>
        <div class="absolute top-10 right-10 flex">
            <span>
                <form action="/keranjang" method="GET">
                    <button type="submit" class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                        <i class="fa-sharp fa-regular fas fa-cart-shopping" style="color: white;"></i>
                        <p class="hidden md:inline">Keranjang</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span>
                <form action="/pesanan-1" method="GET">
                    <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                        <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                        <p class="hidden md:inline">Pesanan</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                <i class="fa-solid fas fa-right-from-bracket"></i>
                <a href="/logout" class="hidden md:inline">logout</a>
            </span>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#4E6C50] border-0 dark:bg-[#4E6C50]">
    @if (session('empty'))
        <div class="text-center bg-[#FFFF8A] mx-10">{{ session('empty') }}</div>
    @endif
    @if (session('Paid'))
        <div class="text-center bg-[#4BB543] mx-10">{{ session('Paid') }}</div>
    @endif
    <div class="grid grid-cols-2 gap-2 md:grid-cols-6 md:gap-0">
        @foreach ($barang as $b)
        <div class="relative h-[320px] w-[200px] mx-auto mt-5 rounded-lg bg-[#AA8B56]">
            <div class="relative h[150px] w-[185px] absolute top-2 left-2 right-2 rounded-md bg-right">
                <div>
                    <img src="/img/{{ $b->foto }}" alt="{{$b->namaBarang}}" class="h-[170px] rounded-md">
                </div>
                <div class="absolute bottom-0 right-0 text-right bg-[#E7DCCB] w-[185px] rounded-md bg-opacity-0 hover:bg-opacity-80">
                    <div class="py-1 mr-2 font-semibold">
                        {{$b->hrgTinggi}}/{{ $b->satuan }}
                    </div>
                    <div class="py-1 mr-2 font-semibold">
                        Stock : {{ $b->stok }}
                    </div>
                </div>
            </div>
            <div class="absolute bottom-[100px] left-2 font-bold text-md text-white">
                {{ $b->namaBarang }}
            </div>
            <div class="absolute bottom-[70px] left-2 text-white">
                <p class="font-light">{{ $b->namaLapak }}</p>
            </div>
            <div class="absolute bottom-5">
                <form action="/beranda/ {{$b->id}}" method="POST">
                    @csrf
                    <button type="submit" class="bg-[#4E6C50] hover:bg-[#8ABE53] px-[45px] py-1 ml-2 rounded-lg font-bold text-white">+Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>