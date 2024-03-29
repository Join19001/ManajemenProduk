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
        <form action="/PenerbitanArtikel" method="POST" class="inline-block" enctype="multipart/form-data">
            @csrf
            <div class="relative">
                <select name="jenisArtikel" id="jenisArtikel" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Sinta 1">Sinta 1</option>
                    <option value="Sinta 2">Sinta 2</option>
                    <option value="Sinta 3">Sinta 3</option>
                    <option value="Sinta 4">Sinta 4</option>
                    <option value="Sinta 5">Sinta 5</option>
                    <option value="Sinta 6">Sinta 6</option>
                </select>
                <label for="jenisArtikel" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Jenis Artikel</label>
                {{-- @error('jenisArtikel')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <select name="kategoriArtikel" id="kategoriArtikel" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Agama">Agama</option>
                    <option value="Anak Usia Dini">Anak Usia Dini</option>
                    <option value="Bahasa">Bahasa</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Filsafat">Filsafat</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Karya Fiksi">Karya Fiksi</option>
                    <option value="Kesehatan/Medis">Kesehatan/Medis</option>
                    <option value="Novel">Novel</option>
                    <option value="Pemikiran Islam">Pemikiran Islam</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Politik">Politik</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Studi Islam">Studi Islam</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                </select>
                <label for="kategoriArtikel" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Kategori Artikel</label>
                {{-- @error('namaLapak')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

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

            <div class="relative mb-[15px]">
                <label for="dokumen" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">File Docs</label>
                <input type="file" name="dokumen" class="block w-[400px] pt-5 bg-white px-3 py-1 rounded-lg lg:pr-5">
                    @error('dokumen')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
            </div>

            <div class="relative">
                <label for="pdf" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">File PDF</label>
                <input type="file" name="pdf" class="block w-[400px] pt-5 bg-white px-3 py-1 rounded-lg lg:pr-5">
                    @error('pdf')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
            </div>

            <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#D2DE32] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>