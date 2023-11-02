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
    <title>Pendaftaran Seminar Pemakalah</title>
</head>
<body>
    <div class="text-center text-4xl font-bold text-[#512B81] my-10">
        Pendaftaran Seminar Pemakalah
    </div>
    <div class="block text-center my-[50px] bg-[#80B3FF] w-[35%] py-10 rounded-xl mx-auto">
        <form action="/PendaftaranSeminarPemakalah" method="POST" class="inline-block" enctype="multipart/form-data">
            @csrf
            <div class="relative">
                <select name="jenisSeminar" id="jenisSeminar" class="block mb-[15px] rounded-lg w-[400px] placeholder:text-black placeholder:text-b pt-5 pb-1 px-3">
                    <option value="Proposal">Proposal</option>
                    <option value="Hasil">Hasil</option>
                </select>
                <label for="jenisSeminar" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Jenis Seminar</label>
                @error('jenisSeminar')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="namaSeminar" name="namaSeminar" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="namaSeminar" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Nama Seminar</label>
                @error('namaSeminar')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="namaPendaftar" name="namaPendaftar" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="namaPendaftar" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Nama Pendaftar</label>
                @error('namaPendaftar')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="relative">
                <input type="text" id="nomor" name="nomor" class="block mb-[15px] px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="nomor" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Nomor HP</label>
                @error('nomor')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-[15px]">
                <input type="text" id="email" name="email" class="block px-3 pt-5 pb-1 rounded-lg w-[400px] placeholder:text-black placeholder:text-bold">
                <label for="email" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Email</label>
                @error('email')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative">
                <input type="file" name="buktiBayar" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="buktiBayar" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Bukti Pembayaran</label>
                @error('buktiBayar')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative">
                <input type="file" name="abstrak" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="abstrak" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Abstrak</label>
                @error('abstrak')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative">
                <input type="file" name="dokumenWord" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="dokumenWord" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Dokumen Word</label>
                @error('dokumenWord')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative">
                <input type="file" name="dokumenPDF" class="block w-[400px] my-[10px] bg-white px-3 py-1 rounded-lg lg:pr-5 lg:py-2">
                <label for="dokumenPDF" class="absolute text-sm text-gray-500 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5">Dokumen PDF</label>
                @error('dokumenPDF')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#D2DE32] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>