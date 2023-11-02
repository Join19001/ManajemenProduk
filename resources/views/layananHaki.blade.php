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
    <title>Penerbitan HaKi</title>
</head>
<body>
    <div class="text-center text-4xl font-bold text-[#512B81] my-10">
        Penerbitan HaKi
    </div>
    <div class="block text-center my-[50px] bg-[#80B3FF] w-[35%] py-10 rounded-xl mx-auto">
        <form action="/PenerbitanHaki" method="POST" class="inline-block" enctype="multipart/form-data">
            @csrf
            <div class="relative">
                <select name="jenisKarya" id="jenisKarya" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Dongeng">Dongeng</option>
                    <option value="Novel">Novel</option>
                    <option value="Biografi">Biografi</option>
                </select>
                <label for="jenisKarya" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Jenis Produk/Karya</label>
                {{-- @error('jenisKarya')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <select name="jenisHaki" id="jenisHaki" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Paten">Paten</option>
                    <option value="Merek">Merek</option>
                    <option value="Desain Industri">Desain Industri</option>
                    <option value="Desain tata letak sirkuit terpadu">Desain tata letak sirkuit terpadu</option>
                    <option value="Rahasia dagang">Rahasia dagang</option>
                    <option value="Varietas tanaman">Varietas tanaman</option>
                </select>
                <label for="jenisHaki" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Jenis Layanan HaKi</label>
                {{-- @error('namaLapak')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>
            
            <div class="relative">
                <input type="text" id="judulHaki" name="judulHaki" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="judulHaki" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Judul Produk/Karya</label>
                {{-- @error('judulHaki')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative mb-[15px]">
                <input type="date" id="tanggalPembuatan" name="tanggalPembuatan" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="tanggalPembuatan" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Tanggal Pembuatan Produk</label>
                {{-- @error('tanggalPembuatan')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <input type="file" name="KTP" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="KTP" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">KTP</label>
                    {{-- @error('KTP')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror --}}
            </div>

            <div class="relative">
                <input type="file" name="dokumen" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="dokumen" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">File Dokumen</label>
                    {{-- @error('dokumen')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror --}}
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="deskripsi" name="deskripsi" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="deskripsi" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Deskripsi Produk</label>
                {{-- @error('deskripsi')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#D2DE32] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>