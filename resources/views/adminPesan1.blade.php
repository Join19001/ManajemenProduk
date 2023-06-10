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
            <img src="/img/logo.png" alt="Logo" class="w-[80px] ml-10 mt-5 mb-5 rounded-lg">
        </div>
        <div class="ml-10 text-2xl font-medium">Admin</div>
        <div class="absolute top-8 right-10">
            <button class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                <i class="fa-regular fas fa-box"></i>
                <a href="/barang-admin" class="hidden md:inline">Barang</a>
            </button>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <button class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                <a href="/pesan1-admin" class="hidden md:inline">Pesanan</a>
            </button>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                <i class="fa-solid fas fa-user"></i>
                <a href="/user-admin" class="hidden md:inline">User</a>
            </button>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#8ABE53] border-0 dark:bg-[#8ABE53]">
    <div class="w-[100%]">
        <div class="ml-[10%] mt-10 text-2xl font-bold">
            Pesanan
        </div>
        <div class="ml-10 mt-10 md:ml-[10%] md:mt-5">
            <span><a href="#" class="w-10 underline underline-offset-4 decoration-4 rounded-lg font-bold md:no-underline md:bg-[#929292] md:px-5 md:py-1 md:text-white">Dalam Proses</a></span>
            <span><a href="/pesan2-admin" class="w-10 ml-5 rounded-lg font-bold md:border-2 md:border-black md:px-10 md:py-[2px]">Riwayat</a></span>
        </div>
        <table class="mt-10 w-[80%] mx-auto">
            <tr class="hidden md:block">
                <th class="border-y-2 border-l-2 border-black w-[200px]">ID Pesanan</th>
                <th class="border-y-2 border-black w-[200px]">ID Pengguna</th>
                <th class="border-y-2 border-black w-[200px]">Nama Barang</th>
                <th class="border-y-2 border-black w-[200px]">Bank Pembayaran</th>
                <th class="border-y-2 border-black w-[200px]">Tanggal</th>
                <th class="border-y-2 border-black w-[200px]">Total Harga</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>
            @foreach ($detail as $detail)
                <tr class="bg-[#DFDFDF] relative h-[150px] p-2 text-sm hover:bg-[#C8C8C8] md:h-[100px] md:text-md">
                    <td class="absolute top-3 left-3 text-lg font-bold md:top-8 md:w-40 md:text-center ">
                        {{ $detail->id }}
                    </td>
                    <td class="absolute top-3 left-[15%] text-lg font-bold md:top-8 md:w-40 md:text-center ">
                        {{ $detail->idUser }}
                    </td>
                    <td class="absolute top-[60px] text-lg left-3 md:top-8 md:left-[31%]">
                        @foreach ($barang as $item)
                            @if ($detail->id == $item->idPesanan)
                                {{ $item->namaBarang }},
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center text-lg absolute bottom-3 left-[100px] md:top-8 md:left-[48%]">
                        BRI
                    </td>
                    <td class="text-center text-lg absolute top-3 right-3 md:top-8 md:right-[32%]">
                        {{ $detail->tanggal }}
                    </td>
                    <td class="text-center absolute bottom-3 left-3 text-[#00E109] font-bold text-lg md:top-8 md:left-auto md:right-[19%]">
                        {{ $detail->totalHarga }}
                    </td>
                    <td class="text-center absolute bottom-3 right-3 md:top-8 md:right-[6%]">
                        <span><a href="/chatAdmin/{{ $detail->id }}"><i class="fa-solid fa-comments"></i></a></span>
                        <span><a href="/success/{{$detail->id}}"><i class="fa-solid fa-check ml-2 bg-[#00ff04] p-1 rounded-full" style="color: white;"></i></a></span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>