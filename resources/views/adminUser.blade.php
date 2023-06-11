<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Admin User</title>
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
                <a href="#" class="hidden md:inline">User</a>
            </button>
        </div>
    </div>
    <hr class="h-1 mx-10 bg-[#4E6C50] border-0 dark:bg-[#4E6C50]">
    <div class="w-[100%]">
        <div class="ml-[10%] mt-10 text-2xl font-bold">
            User
        </div>
        <table class="mt-10 w-[80%] mx-auto">
            <tr>
                <th class="border-y-2 border-l-2 border-black w-[200px]">ID Pengguna</th>
                <th class="border-y-2 border-black w-[200px]">Nama Pengguna</th>
                <th class="border-y-2 border-black w-[200px]">Email</th>
                <th class="border-y-2 border-black w-[200px]">Password</th>
                <th class="border-y-2 border-black w-[200px]">No. Telepon</th>
            </tr>
            @foreach ($user as $u)
                <tr class="h-20 bg-[#DFDFDF] border-b-[1px] border-black">
                    <td class="w-[200px] text-center">
                        {{$u->idUser}}
                    </td>
                    <td class="w-[200px] text-center">
                        {{$u->nama}}
                    </td>
                    <td class="w-[200px] text-center">
                        {{$u->email}}
                    </td>
                    <td class="w-[200px] text-center">
                        {{$u->password}}
                    </td>
                    <td class="w-[200px] text-center">
                        {{$u->noTelp}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>