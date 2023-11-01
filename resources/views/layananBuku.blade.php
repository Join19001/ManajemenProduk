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
    <title>Penerbitan Buku</title>
</head>
<body>
    <div class="text-center text-4xl font-bold text-[#512B81] my-10">
        Penerbitan Buku
    </div>
    <div class="block text-center mt-[50px] bg-[#80B3FF] w-[35%] py-10 rounded-xl mx-auto">
        <form action="/PenerbitanBuku" method="POST" class="inline-block" enctype="multipart/form-data">
            @csrf
            <div class="relative">
                <select name="jenisBuku" id="jenisBuku" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Dongeng">Dongeng</option>
                    <option value="Novel">Novel</option>
                    <option value="Biografi">Biografi</option>
                </select>
                <label for="jenisBuku" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Jenis Buku</label>
                {{-- @error('namaLapak')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <select name="kategoriBuku" id="kategoriBuku" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Fiksi">Fiksi</option>
                    <option value="Ilmiah">Ilmiah</option>
                    <option value="Romansa">Romansa</option>
                </select>
                <label for="kategoriBuku" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Kategori Buku</label>
                {{-- @error('namaLapak')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <input type="text" id="namaPenulis" name="namaPenulis" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="namaPenulis" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Nama Penulis</label>
                {{-- @error('namaPenulis')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>
            
            <div class="relative">
                <input type="text" id="judulBuku" name="judulBuku" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="judulBuku" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Judul Buku</label>
                {{-- @error('judulBuku')
                    <div class="text-red-200 text-left">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="relative">
                <input type="date" id="tahunTerbit" name="tahunTerbit" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="tahunTerbit" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Tahun Terbit</label>
                {{-- @error('tahunTerbit')
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