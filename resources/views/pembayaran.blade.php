<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        body {background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23c3a878' fill-opacity='0.17' fill-rule='evenodd'/%3E%3C/svg%3E");};
    </style>
</head>
<body class="font-[Poppins]">
    <div class="ml-10 my-10">
        <a href="/keranjang" class="text-2xl font-bold">< Kembali</a>
    </div>
    <div class="bg-[#EDF1D6] m-3 py-5 px-2 rounded-lg md:relative md:bg-transparent">
        <div class="mx-2 my-2 md:absolute md:top-0 md:right-0 md:w-[45%] md:h-[100%]">
            <p class="text-lg font-semibold ml-2 md:text-center md:text-2xl py-2">Detail Harga</p>
            <div class="text-md bg-[#8ABE53] p-2 rounded-md my-5 md:px-5 md:h-[80%]">
                @foreach ($detail as $d)
                    <div class="my-1 md:my-3">
                        <span>{{ $d->namaBarang }}</span>
                        <span class="float-right">{{ $d->hrgSatuan * $d->jumlah }}</span>
                    </div>
                @endforeach
                <hr class="my-1 md:my-3">
                <div class="mt-2 font-bold md:my-3">
                    <span>Total Harga:</span>
                    <span class="float-right">{{ $d->totalHarga }}</span>
                </div>
            </div>
        </div>
        <div class="text-md bg-[#8ABE53] p-2 rounded-md my-5 mx-2 md:w-[51%] md:h-[480px] md:relative">
            <form action="/selesaiBayar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div>
                        <p class="text-center font-bold text-lg md:hidden">Virtual Account</p>
                    </div>
                    <div class="p-2 md:text-xl md:my-5">
                        <span class="font-bold">BRI</span>
                        <span><a href=""><i class="fa-solid fas fa-circle-down"></i></a></span>
                        <div>
                            <span>Virtual Account</span>
                            <span><input type="text" value="12341223123" class="w-1/2 float-right px-2 mr-5 rounded-md" readonly></span>
                        </div>
                        <div class="mt-3">
                            <span>Bukti</span>
                            <span>
                                <input type="file" name="bukti" class="bg-white w-1/2 float-right mr-5 rounded-md"></i>
                            </span>
                            @error('bukti')
                                <div class="text-red-900 text-sm">Foto Harus dalam format JPG/PNG dengan ukuran 2MB Maks</div>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 md:text-xl md:my-5">
                        <span class="font-bold">BNI</span>
                        <span><a href=""><i class="fa-solid fas fa-circle-down"></i></a></span>
                    </div>
                    <div class="p-2 md:text-xl md:my-5">
                        <span class="font-bold">Mandiri</span>
                        <span><a href=""><i class="fa-solid fas fa-circle-down"></i></a></span>
                    </div>
                </div>
                <div class="text-center mt-10 mb-5 w-full bg-white rounded-md py-1 md:w-[20%] md:absolute md:bottom-0 md:right-5">
                    <button type="submit">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>