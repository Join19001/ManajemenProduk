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
    <title>Penerbitan Artikel</title>
</head>
<body>
    <div class="text-center text-4xl font-bold text-[#512B81] my-10">
        Penerbitan Artikel
    </div>
    <div class="block text-center my-[50px] bg-[#80B3FF] w-[35%] py-10 rounded-xl mx-auto">
        <form action="/PengecekanPlagiasi" method="POST" class="inline-block" enctype="multipart/form-data">
            @csrf
            <div class="relative mb-[15px]">
                <input type="text" id="namaPenulis" name="namaPenulis" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="namaPenulis" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Nama Penulis</label>
                <p class="text-sm text-left text-white font-semibold">Max 6, pisahkan antar nama dengan ";" contoh: Ruri; Nova;...</p>
                {{-- @error('namaPenulis')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>
            
            <div class="relative">
                <input type="text" id="judulArtikel" name="judulArtikel" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="judulArtikel" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Judul Artikel</label>
                {{-- @error('judulArtikel')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="Affiliasi" name="Affiliasi" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="Affiliasi" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Affiliasi</label>
                <p class="text-sm text-left text-white font-semibold">Max 6, pisahkan antar nama dengan ";" contoh: Ruri; Nova;...</p>
                {{-- @error('Affiliasi')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="email" name="email" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="email" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Email Penulis</label>
                <p class="text-sm text-left text-white font-semibold">Max 6, pisahkan antar nama dengan ";" contoh: Ruri; Nova;...</p>
                {{-- @error('email')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <input type="file" name="dokumen" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                    {{-- @error('dokumen')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror --}}
            </div>

            <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#D2DE32] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>