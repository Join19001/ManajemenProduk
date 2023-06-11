<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        body {background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23c3a878' fill-opacity='0.17' fill-rule='evenodd'/%3E%3C/svg%3E");};
    </style>
    <title>Keranjang</title>
</head>
<body class="font-[Poppins]">
    <div class="inline-flex items-center top-0 w-full">
        <div class="logo">
            <a href="/beranda"><img src="/img/newLogo.png" alt="Logo" class="h-[120px] w-[220px] ml-10 rounded-lg"></a>
        </div>
        <div class="absolute top-10 right-10 flex">
            <span>
                <form action="/keranjang" method="GET">
                    <button type="submit" class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                        <i class="fa-sharp fa-regular fas fa-cart-shopping" style="color: white;"></i>
                        <p class="hidden md:inline">Keranjang</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span>
                <form action="/pesanan-1" method="GET">
                    <button class="text-lg font-semibold px-7 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                        <i class="fa-regular fas fa-book" style="color: #ffffff;"></i>
                        <p class="hidden md:inline">Pesanan</p>
                    </button>
                </form>
            </span>
            <span class="text-2xl text-[#8ABE53]">|</span>
            <span class="text-lg font-semibold px-5 py-1 rounded-md text-white bg-[#4E6C50] hover:bg-[#8ABE53]">
                <i class="fa-solid fas fa-right-from-bracket"></i>
                <a href="/logout" class="hidden md:inline">logout</a>
            </span>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#4E6C50] border-0 dark:bg-[#4E6C50]">
    @if (session('accept'))
        <div class="bg-[#4BB543] text-center text-white text-bold mx-10">{{ session('accept') }}</div>
    @endif
    <div class="w-[100%] relative">
        <table class="grid mt-10 md:mx-[20%] md:mt-20">
            <tr class="hidden md:block">
                <th class="border-y-2 border-l-2 border-black w-40">Gambar</th>
                <th class="border-y-2 border-black w-40">Nama Barang</th>
                <th class="border-y-2 border-black w-40">Jumlah</th>
                <th class="border-y-2 border-black w-40">Satuan</th>
                <th class="border-y-2 border-black w-40">Harga Satuan</th>
                <th class="border-y-2 border-black w-40">Sub Total</th>
                <th class="border-y-2 border-r-2 border-black w-40">Action</th>
            </tr>
            @foreach ($pesanan as $item)
            <tr class="relative bg-[#DFDFDF]">
                <td class="py-10 w-[100%] md:border-y-2 md:border-black">
                    <img src="img/{{ $item->foto }}" alt="{{ $item->namaBarang }}" class="w-[120px] rounded-lg ml-5">
                </td>
                <td class="absolute left-[35%] top-[20%] sm:left-[22%] md:left-[19%] md:top-[35%]">
                    <div class="font-bold">{{  $item->namaBarang  }}</div>
                    <div>{{  $item->namaLapak  }}</div>
                </td>
                <td class="text-center absolute bottom-[50%] right-10 md:right-[59%]">
                    <form action="/jumlah/{{$item->id}}" method="POST">
                        @csrf
                        <input value="{{ $item->jumlah }}" name="jumlah" type=number min=1 max={{ $item->stok }} class="text-center rounded-md border border-gray-400">
                        <button type="submit">></button>
                    </form>
                </td>
                <td class="text-center absolute bottom-[50%] right-2 md:right-[49%]">{{  $item->satuan  }}</td>
                <td class="text-center absolute hidden md:right-[33%] md:bottom-[50%] md:block">{{ $item->hrgSatuan }}</td>
                <td class="text-center absolute bottom-2 right-2 md:right-[20%] md:bottom-[50%]">{{ $item->subTotal }}</td>
                <td class="text-center align-top md:border-y-2 pr-2 pt-2 md:border-black md:align-middle md:pt-0 md:pb-6 md:pr-[50px]">
                    <div class="flex">
                        <span class="mr-2">
                            <a href="/tawar/ {{$item->id}}">
                                <i class="fa-regular fas fa-pen-to-square"></i>
                            </a>
                        </span>
                        <span>
                            <a href="/delete-barang/{{ $item->id }}" onclick="return confirm('{{ __('Apakah Anda yakin ingin menghapus?') }}')">
                                <i class="fa-light fas fa-trash-can ml-2" style="color:#FF0000"></i>
                            </a>
                        </span>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="sticky bottom-0 mt-[70%] bg-[#7EC8F1] py-10 md:relative md:mt-0 md:bg-[#DFDFDF] md:w-[60%] md:mx-auto md:rounded-b-lg md:py-[100px]">
            <div>
                <span class="ml-5 md:hidden">Total Harga</span>
                <span class="float-right mr-5 md:absolute md:bottom-40 md:right-[170px]"> 
                    <p class="hidden md:inline-block mr-5">Total Harga</p> 
                    @if (sizeof($pesanan) != 0)
                        {{  $item->totalHarga  }} 
                    @endif
                </span>
            </div>
            <div class="float-right mr-5 md:pt-10 md:absolute md:right-1 md:bottom-10">
                <a href="/pembayaran">Lanjutkan Pembayaran ></a>
            </div>
        </div>
    </div>
</body>
</html>