<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Admin Penerbitan</title>
</head>
<body>
    <div class="pb-10">
        <div class="inline-flex items-center top-0 w-full">
            <div class="logo">
                <a href="/" class="absolute top-5 text-2xl no-underline font-bold ml-20">Manajemen Penerbitan Produk</a>
            </div>
            <div class="absolute top-5 right-10 sm:right-20">
                <a href="/logOut" class="text-lg mx-2 text-red-500 font-bold">Log Out</a>
            </div>
        </div>
        <hr class="h-1 mt-10 mx-10 bg-[#4E6C50] border-0 dark:bg-[#4E6C50]">
    </div>
    <div class="w-[100%]">
        <div class="ml-[10%] text-2xl font-bold">
            Buku<p class="ml-1 inline rounded-full px-2 text-white bg-[#659268] hover:bg-[#8ABE53]"><a href="/layanan/Buku">+</a></p>
        </div>
        <table class="w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">No</th>
                <th class="border-y-2 border-black w-[200px]">Jenis Buku</th>
                <th class="border-y-2 border-black w-[200px]">Kategori Buku</th>
                <th class="border-y-2 border-black w-[200px]">Nama Penulis</th>
                <th class="border-y-2 border-black w-[200px]">Judul Buku</th>
                <th class="border-y-2 border-black w-[200px]">Tahun Terbit</th>
                <th class="border-y-2 border-black w-[200px]">Dokumen</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>
            {{ $nomor = 1; }}
            @foreach ($bukus as $item)
            <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                <td class="w-[200px] text-center">
                    {{ $nomor++ }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->jenisBuku }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->kategoriBuku }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->namaPenulis }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->judulBuku }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->tahunTerbit }}
                </td>
                <td class="w-[200px] text-center">
                    <a href="/downloadBuku/{{$item->dokBuku}}">{{ $item->dokBuku }}</a>
                </td>
                <td class="w-[200px] text-center">
                    <span>
                        <a href="/deleteUser/{{ $item->idUser }}" onclick="return confirm('{{ __('Apakah Anda yakin ingin menghapus?') }}')">
                            <i class="fa-light fas fa-trash-can ml-2" style="color:#FF0000"></i>
                        </a>
                    </span>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="w-[100%]">
        <div class="ml-[10%] mt-20 text-2xl font-bold">
            Artikel<p class="ml-1 inline rounded-full px-2 text-white bg-[#659268] hover:bg-[#8ABE53]"><a href="/layanan/Artikel">+</a></p>
        </div>
        <table class="w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">No</th>
                <th class="border-y-2 border-black w-[200px]">Jenis Artikel</th>
                <th class="border-y-2 border-black w-[200px]">Kategori Artikel</th>
                <th class="border-y-2 border-black w-[200px]">Nama Penulis</th>
                <th class="border-y-2 border-black w-[200px]">Judul Artikel</th>
                <th class="border-y-2 border-black w-[200px]">Affiliasi</th>
                <th class="border-y-2 border-black w-[200px]">Email Penulis</th>
                <th class="border-y-2 border-black w-[200px]">Dokumen</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>

            {{ $nomor = 1; }}
            @foreach ($artikels as $artkl)
            <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                <td class="w-[200px] text-center">
                    {{ $nomor++ }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->jenisArtikel }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->kategoriArtikel }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->namaPenulis }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->judulArtikel }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->affiliasi }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $artkl->email }}
                </td>
                <td class="w-[200px] text-center">
                    <a href="/downloadArtikel/{{$artkl->dokArtikel}}">{{ $artkl->dokArtikel }}</a>
                </td>
                <td class="w-[200px] text-center">
                    <span>
                        <a href="/deleteArtikel/{{ $artkl->idArtikel }}" onclick="return confirm('{{ __('Apakah Anda yakin ingin menghapus?') }}')">
                            <i class="fa-light fas fa-trash-can ml-2" style="color:#FF0000"></i>
                        </a>
                    </span>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="w-[100%] mb-20">
        <div class="ml-[10%] mt-20 text-2xl font-bold">
            Haki<p class="ml-1 inline rounded-full px-2 text-white bg-[#659268] hover:bg-[#8ABE53]"><a href="/layanan/Haki">+</a></p>
        </div>
        <table class="w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">No</th>
                <th class="border-y-2 border-black w-[200px]">Jenis Produk</th>
                <th class="border-y-2 border-black w-[200px]">Jenis Layanan</th>
                <th class="border-y-2 border-black w-[200px]">Judul Produk</th>
                <th class="border-y-2 border-black w-[200px]">Tanggal Pembuatan</th>
                <th class="border-y-2 border-black w-[200px]">KTP</th>
                <th class="border-y-2 border-black w-[200px]">Dokumen</th>
                <th class="border-y-2 border-black w-[200px]">Deksripsi</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>

            {{ $nomor = 1; }}
            @foreach ($hakis as $haki)
            <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                <td class="w-[200px] text-center">
                    {{ $nomor++ }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $haki->jenisProduk }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $haki->layananHaki }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $haki->judulProduk }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $haki->tglPembuatan }}
                </td>
                <td class="w-[200px] text-center">
                    <img src="{{ url('/haki/ktp/'.$haki->ktp) }}" alt="KTP">
                </td>
                <td class="w-[200px] text-center">
                    <a href="/downloadHaki/{{$haki->dokProduk}}">{{ $haki->dokProduk }}</a>
                </td>
                <td class="w-[200px] text-center">
                    {{ $haki->deskripsi }}
                </td>
                <td class="w-[200px] text-center">
                    <span>
                        <a href="/deleteHaki/{{ $haki->idHaki }}" onclick="return confirm('{{ __('Apakah Anda yakin ingin menghapus?') }}')">
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