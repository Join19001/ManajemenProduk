<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Pesanan</title>
</head>
<body class="font-[Poppins]">
    <div class="inline-flex items-center top-0 w-full">
        <div class="logo">
            <a href="/beranda"><img src="/img/logo.png" alt="Logo" class="w-[80px] ml-10 mt-5 mb-5 rounded-lg"></a>
        </div>
        <div class="absolute top-8 right-10 flex">
            <span>
                <form action="/keranjang" method="GET">
                    <button type="submit" class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                        <i class="fa-sharp fa-regular fas fa-cart-shopping" style="color: white;"></i>
                        <p class="hidden md:inline">Keranjang</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span>
                <form action="/pesanan-1" method="GET">
                    <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#557532]">
                        <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                        <p class="hidden md:inline">Pesanan</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#8ABE53] hover:bg-[#E42217]">
                <i class="fa-solid fas fa-right-from-bracket"></i>
                <a href="/logout" class="hidden md:inline">logout</a>
            </span>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#8ABE53] border-0 dark:bg-[#8ABE53]">
    <div class="w-[100%]">
        <div class="hidden md:block ml-[10%] mt-10 text-2xl font-bold">
            Pesanan
        </div>
        <div class="ml-10 mt-10 md:ml-[10%] md:mt-5">
            <span><a href="#" class="w-10 underline underline-offset-4 decoration-4 rounded-lg font-bold md:no-underline md:bg-[#929292] md:px-5 md:py-1 md:text-white">Dalam Proses</a></span>
            <span><a href="/pesanan-2" class="w-10 ml-5 rounded-lg font-bold md:border-2 md:border-black md:px-10 md:py-[2px]">Riwayat</a></span>
        </div>
        <table class="my-10 w-[80%] mx-auto md:mt-10">
            <tr class="hidden md:block">
                <th class="border-y-2 border-l-2 border-black w-[200px]">ID Pesanan</th>
                <th class="border-y-2 border-black w-[200px]">Nama Barang</th>
                <th class="border-y-2 border-black w-[200px]">Bank Pembayaran</th>
                <th class="border-y-2 border-black w-[200px]">Tanggal</th>
                <th class="border-y-2 border-black w-[200px]">Total Harga</th>
                <th class="border-y-2 border-black w-[200px]">Status</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>
            @foreach ($detail as $detail)
                <tr class="bg-[#DFDFDF] relative h-[150px] p-2 text-sm hover:bg-[#C8C8C8] md:text-md">
                    <td class="absolute top-3 left-3 text-lg font-bold md:top-8 md:w-40 md:text-center ">
                        {{ $detail->id }}
                    </td>
                    <td class="absolute top-[60px] text-lg left-3 w-[200px] md:top-8 md:left-[17%]">
                        @foreach ($barang as $item)
                            @if ($detail->id == $item->idPesanan)
                                {{ $item->namaBarang }},
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center text-lg absolute bottom-3 left-[100px] md:top-8 md:left-[35%]">
                        BRI
                    </td>
                    <td class="text-center text-lg absolute top-3 right-3 md:top-8 md:right-[46%]">
                        {{ $detail->tanggal }}
                    </td>
                    <td class="text-center absolute bottom-3 left-3 text-[#00E109] font-bold text-lg md:top-8 md:left-auto md:right-[33%]">
                        {{ $detail->totalHarga }}
                    </td>
                    <td class="absolute bottom-3 left-[140px] text-lg md:top-8 md:left-auto md:right-[18%]">
                        @if ($detail->status == '1')
                            Disiapkan
                        @endif
                    </td>
                    <td class="text-center absolute bottom-3 right-3 md:top-8 md:right-[6%]">
                        <a href="/chat/{{ $detail->id }}"><i class="fa-solid fa-comments"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>