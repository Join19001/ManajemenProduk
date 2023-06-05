<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Tambah</title>
</head>
<body class="bg-[#EDF1D6] lg:mx-auto lg:bg-white">
    <div class="lg:bg-[#EDF1D6] pb-[100px] pt-[5%]">
        <div class="font-[Poppins]">
            <div class="text-4xl font-bold w-full ml-20">
                <a href="/barang-admin">< Kembali</a>
            </div>
            <div class="w-[150px] mx-auto">
                <img src="/img/logo.png" alt="Logo" class="rounded-lg mt-5 lg:hidden">
            </div>
            <div class="block text-center mt-[150px]">
                <form action="/tambahBarang" method="POST" class="inline-block" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="namaLapak" placeholder="Nama Lapak" class="block bg-[#A0C875] mb-[10px] rounded-lg placeholder:text-white placeholder:text-bold pr-40 py-2 px-3">
                    @error('namaLapak')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="text" name="namaBarang" placeholder="Nama Barang" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('namaBarang')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="stok" placeholder="Stok" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('stok')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="satuan" placeholder="Satuan" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('satuan')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <input type="text" name="hrgTinggi" placeholder="Harga Tertinggi" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('hrgTinggi')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="text" name="hrgRendah" placeholder="Harga Terendah" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('hrgRendah')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror

                    <input type="file" name="foto" class="block bg-[#A0C875] my-[10px] px-3 py-1 rounded-lg md:text-white lg:pr-5 lg:py-2">
                    @error('foto')
                        <div class="text-red-200 text-left">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#557532] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>