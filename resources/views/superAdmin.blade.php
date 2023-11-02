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
    <div class="pb-[100px]">
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
        <div class="ml-[10%] mt-10 text-2xl font-bold">
            User<p class="ml-1 inline rounded-full px-2 text-white bg-[#659268] hover:bg-[#8ABE53]"><a href="/tambahUser">+</a></p>
        </div>
        <table class="mt-10 w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">No</th>
                <th class="border-y-2 border-black w-[200px]">Nama User</th>
                <th class="border-y-2 border-black w-[200px]">Email</th>
                <th class="border-y-2 border-black w-[200px]">role</th>
                <th class="border-y-2 border-r-2 border-black w-[200px]">Action</th>
            </tr>
            @foreach ($user as $item)
            <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                <td class="w-[200px] text-center">
                    {{ $item->idUser }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->nama }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->email }}
                </td>
                <td class="w-[200px] text-center">
                    {{ $item->role }}
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
</body>
</html>