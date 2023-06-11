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
    <title>Chat</title>
</head>
<body class="font-[Poppins]">
    <div class="relative">
        <div class="text-3xl py-10 pl-5 bg-[#4E6C50] md:pl-10">
            <a href="/pesanan-1" class="text-white">< Admin</a>
        </div>
        <div>
            @foreach ($chat as $c)
                @if (empty($c->balas))
                    <div class="flex">
                        <span class="ml-8 my-7">
                            <i class="fa-solid fa-user text-3xl bg-[#DFDFDF] rounded-full py-2 px-3"></i>
                        </span>
                        <span class="my-5 w-[80%] bg-[#DFDFDF] p-2 rounded-md ml-2">
                            {{ $c->chat }}
                        </span>
                    </div>
                @else
                    <div class="flex ml-10 lg:ml-[200px]">
                        <span class="my-5 w-[94%] text-right bg-[#DFDFDF] p-2 rounded-md">
                            {{ $c->balas }}
                        </span>
                        <span class="ml-2 my-7">
                            <i class="fa-solid fa-user-tie text-3xl bg-[#DFDFDF] rounded-full py-2 px-3"></i>
                        </span>
                    </div>
                @endif
            @endforeach
            <div class="fixed bottom-2 left-5 right-[3%] md:left-10">
                <form action="/chat/{{ $id }}" method="POST" class="flex">
                    @csrf
                    <input type="text" name="chat" placeholder="Masukkan pesan anda..." class="w-[1500px] py-2 pl-5 bg-[#4E6C50] rounded-md text-white placeholder:text-white">
                    <button class="ml-2" type="submit"><i class="fa-solid fas fa-share"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>