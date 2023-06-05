<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/88c065724b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Chat</title>
</head>
<body class="font-[Poppins]">
    <div class="relative">
        <div class="text-3xl py-10 pl-5 bg-[#A0C875] md:pl-10">
            <a href="/pesan1-admin">< {{ $user }}</a>
        </div>
        <div>
            @foreach ($chat as $c)
                @if (empty($c->balas))
                    <div class="ml-5 my-5 w-[95%] bg-[#DFDFDF] p-2 rounded-md md:ml-10">
                        {{ $c->chat }}
                    </div>
                @else
                    <div class="ml-5 my-5 w-[95%] text-right bg-[#DFDFDF] p-2 rounded-md md:ml-10">
                        {{ $c->balas }}
                    </div>
                @endif
            @endforeach
            <div class="fixed bottom-2 left-5 md:right-[10%] md:left-10">
                <form action="/chatAdmin/{{ $id }}" method="POST" class="flex">
                    @csrf
                    <input type="text" name="balas" placeholder="Masukkan pesan anda..." class="pr-[90%] py-2 pl-5 bg-[#A0C875] rounded-md placeholder:text-white">
                    <button class="ml-2" type="submit"><i class="fa-solid fas fa-share"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>