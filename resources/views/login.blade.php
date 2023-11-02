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
    <title>Login</title>
</head>
<body class="lg:w-[60%]">
    @if (session('registered'))
        <div class="bg-[#4BB543] text-center">{{ session('registered') }}</div>
    @endif
    <div class="lg:bg-[#4E6C50] py-[10%] xl:py-[20%] h-[800px]">
        <div class="font-[Poppins]">
            <div class="text-3xl font-black w-full text-center mt-10 text-[#4E6C50] md:text-white lg:text-6xl">Masuk</div>
            <div class="w-[250px] mx-auto">
                <img src="/img/newLogo.png" alt="Logo" class="rounded-lg h-[150px] lg:hidden">
            </div>
            <div class="block text-center mt-5 bg-[#4E6C50] py-10 mx-10 rounded-lg sm:mx-20 lg:bg-transparent">
                <form action="/masuk" method="POST" class="inline-block">
                    @csrf
                    <input type="email" name="email" placeholder="Email" class="block mb-[20px] px-3 py-1 rounded-lg w-[250px] placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2 md:w-[400px]">
                    @error('email')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" class="block px-3 py-1 rounded-lg w-[250px] placeholder:text-black placeholder:text-bold lg:pr-40 lg:py-2 md:w-[400px]">
                    @error('password')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                    @if (session('auth_failed')) 
                        <div class="text-red-800 text-center">{{ session('auth_failed') }}</div>
                    @endif
                    <button type="submit" class="mt-10 mb-3 bg-[#659268] hover:bg-[#8ABE53] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Masuk ></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>