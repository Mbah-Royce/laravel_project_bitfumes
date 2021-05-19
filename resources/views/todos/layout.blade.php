
    <html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Todos</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c441c0bd75.js" crossorigin="anonymous"></script>
    @livewireStyles

</head>

<body>
<div class="text-center flex justify-center pt-10">
<div class="w-1/3 border rounded p-4">
@yield('content')
</div>
</div>
@livewireScripts
</body>
</html>