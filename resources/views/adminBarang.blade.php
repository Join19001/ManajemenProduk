<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <div class="inline-flex items-center top-0 w-full">
        <div class="logo">
            <img src="/img/newLogo.png" alt="Logo" class="h-[120px] w-[220px] ml-10 rounded-lg">
        </div>
        <div class="ml-10 text-2xl font-medium">Admin</div>
        <div class="absolute top-10 right-10">
            <button class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                <i class="fa-regular fas fa-box"></i>
                <a href="/barang-admin" class="hidden md:inline">Barang</a>
            </button>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <button class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                <a href="/pesan1-admin" class="hidden md:inline">Pesanan</a>
            </button>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                <i class="fa-solid fas fa-user"></i>
                <a href="/user-admin" class="hidden md:inline">User</a>
            </button>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#8ABE53] border-0 dark:bg-[#8ABE53]">
    <div class="w-[100%]">
        <div class="ml-[10%] mt-10 text-2xl font-bold">
            Barang <p class="ml-1 inline rounded-full px-2 text-white bg-[#659268] hover:bg-[#8ABE53]"><a href="/tambahBarang">+</a></p>
        </div>
        <table class="mt-10 w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">ID Barang</th>
                <th class="border-y-2 border-black w-[200px]">Nama Toko</th>
                <th class="border-y-2 border-black w-[200px]">Nama Barang</th>
                <th class="border-y-2 border-black w-[200px]">Stok</th>
                <th class="border-y-2 border-black w-[200px]">Harga Terendah</th>
                <th class="border-y-2 border-black w-[200px]">Harga Tertinggi</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>
            @foreach ($barang as $b)
            <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                <td class="w-[200px] text-center">
                    {{ $b->id }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $b->namaLapak }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $b->namaBarang }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $b->stok }} {{ $b->satuan }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $b->hrgRendah }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $b->hrgTinggi }}
                </td>
                <td class="w-[200px] text-center">
                    <span>
                        <a href="/edit/{{ $b->id }}">
                            <i class="fa-regular fas fa-pen-to-square" style="color:#2972FF"></i>
                        </a>
                    </span>
                    <span>
                        <a href="/delete/{{ $b->id }}" onclick="return confirm('{{ __('Apakah Anda yakin ingin menghapus?') }}')">
                            <i class="fa-light fas fa-trash-can ml-2" style="color:#FF0000"></i>
                        </a>
                    </span>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>