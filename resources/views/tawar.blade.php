<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        body {background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23c3a878' fill-opacity='0.17' fill-rule='evenodd'/%3E%3C/svg%3E");};
    </style>
    <title>Tawar</title>
</head>
<body class="lg:mx-auto lg:bg-white">
    <div class="w-full h-[780px]">
        <div class="font-[Poppins]">
            <div class="text-xl ml-10 mt-10 font-bold w-full md:ml-20 md:text-4xl md:mt-0 md:pt-10">
                <a href="/keranjang">< Kembali</a>
            </div>
            <div class="w-[150px] mx-auto mt-20">
                <img src="/img/newLogo.png" alt="Logo" class="rounded-lg mt-5 lg:hidden">
            </div>
            <div class="block text-center mt-[10%] mx-auto md:bg-[#4E6C50] md:w-[35%] md:py-10 md:rounded-xl">
                <div class="text-xl mb-5 font-bold md:text-2xl md:text-white">
                    Penawaran Harga
                </div>
                <form action="/tawar" method="POST" class="inline-block">
                    @csrf
                    <input type="text" name='idPesanan' class="hidden" value="{{ $detail->id }}">
                    <input type="text" name="harga" placeholder="{{ $detail->hrgSatuan }}" class="block mb-[10px] bg-[#4E6C50] rounded-lg placeholder:text-white placeholder:text-bold pr-40 py-2 px-3 md:bg-white md:placeholder:text-black">
                    @if (session('reject')) 
                        <div class="text-red-800 text-center">{{ session('reject') }}</div>
                    @endif
                    <button type="submit" class="mt-10 mb-3 bg-[#659268] hover:bg-[#8ABE53] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Ajukan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>