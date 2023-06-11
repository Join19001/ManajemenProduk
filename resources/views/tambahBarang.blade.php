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
    <title>Tambah</title>
</head>
<body class="lg:mx-auto lg:bg-white">
    <div class="pb-[50px] pt-[3%]">
        <div class="font-[Poppins]">
            <div class="text-4xl font-bold ml-20">
                <a href="/barang-admin">< Kembali</a>
            </div>
            <div class="w-[150px] mx-auto">
                <img src="/img/logo.png" alt="Logo" class="rounded-lg mt-5 lg:hidden">
            </div>
            <div class="block text-center mt-[50px] bg-[#4E6C50] w-[35%] py-10 rounded-xl mx-auto">
                <form action="/tambahBarang" method="POST" class="inline-block" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="namaLapak" placeholder="Nama Lapak" class="block mb-[15px] rounded-lg placeholder:text-black placeholder:text-bold pr-40 py-2 px-3">
                    @error('namaLapak')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="text" name="namaBarang" placeholder="Nama Barang" class="block mb-[15px] px-3 py-1 rounded-lg placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('namaBarang')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="stok" placeholder="Stok" class="block mb-[15px] px-3 py-1 rounded-lg placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('stok')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="satuan" placeholder="Satuan" class="block mb-[15px] px-3 py-1 rounded-lg placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('satuan')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="hrgTinggi" placeholder="Harga Tertinggi" class="block mb-[15px] px-3 py-1 rounded-lg placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('hrgTinggi')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="text" name="hrgRendah" placeholder="Harga Terendah" class="block mb-[15px] px-3 py-1 rounded-lg placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('hrgRendah')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="file" name="foto" class="block my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                    <p class="text-left text-sm text-gray-200">! Ukuran foto tidak lebih besar dari 2MB</p>
                    @error('foto')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit" class="mt-10 mb-3 bg-[#659268] hover:bg-[#8ABE53] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>