<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-[#EDF1D6] lg:w-[60%] lg:bg-white">
    @if (session('registered'))
        <div class="bg-[#4BB543] text-center">{{ session('registered') }}</div>
    @endif
    <div class="lg:bg-[#EDF1D6] py-[35%] xl:py-[25%]">
        <div class="w-[125px] absolute top-2 left-[5%] hidden lg:block">
            <img src="/img/logo.png" alt="Logo" class="rounded-lg mt-5">
        </div>
        <div class="font-[Poppins]">
            <div class="text-2xl lg:text-5xl font-bold w-full text-center">Masuk</div>
            <div class="w-[150px] mx-auto">
                <img src="/img/logo.png" alt="Logo" class="rounded-lg mt-5 lg:hidden">
            </div>
            <div class="block text-center mt-10">
                <form action="/masuk" method="POST" class="inline-block">
                    @csrf
                    <input type="email" name="email" placeholder="Email" class="block bg-[#A0C875] my-[25px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('email')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" class="block bg-[#A0C875] my-[25px] px-3 py-1 rounded-lg placeholder:text-white placeholder:text-bold lg:pr-40 lg:py-2">
                    @error('password')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                    @if (session('auth_failed')) 
                        <div class="text-red-800 text-center">{{ session('auth_failed') }}</div>
                    @endif
                    <button type="submit" class="mt-10 mb-3 bg-[#8ABE53] hover:bg-[#557532] px-10 py-1 rounded-lg font-bold text-white lg:px-[60px] lg:py-2">Masuk ></button>
                </form>
                <p>Tidak memiliki akun? <b><a href="/daftar">Daftar Sekarang</a></b></p>
            </div>
        </div>
    </div>
</body>
</html>