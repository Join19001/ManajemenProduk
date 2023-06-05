<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Tawar</title>
</head>
<body class="bg-[#EDF1D6] lg:mx-auto lg:bg-white">
    <div class="lg:bg-[#EDF1D6] w-full h-[780px]">
        <div class="font-[Poppins]">
            <div class="text-xl ml-10 mt-10 font-bold w-full md:ml-20 md:text-4xl md:mt-0 md:pt-10">
                <a href="/keranjang">< Kembali</a>
            </div>
            <div class="w-[150px] mx-auto mt-20">
                <img src="/img/logo.png" alt="Logo" class="rounded-lg mt-5 lg:hidden">
            </div>
            <div class="block text-center mt-[10%] mx-auto md:bg-[#D9D9D9] md:w-[35%] md:py-10 md:rounded-xl">
                <div class="text-xl my-5 font-bold md:text-2xl">
                    Penawaran Harga
                </div>
                <form action="/tawar" method="POST" class="inline-block">
                    @csrf
                    <input type="text" name='idPesanan' class="hidden" value="{{ $detail->id }}">
                    <input type="text" name="harga" placeholder="{{ $detail->hrgSatuan }}" class="block bg-[#A0C875] mb-[10px] rounded-lg placeholder:text-white placeholder:text-bold pr-40 py-2 px-3">
                    @if (session('reject')) 
                        <div class="text-red-800 text-center">{{ session('reject') }}</div>
                    @endif
                    <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#557532] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Ajukan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>