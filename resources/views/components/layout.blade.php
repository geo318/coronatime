<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v=2">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}?v=2">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}?v=2" color="#5bbad5">
    <link rel="stylesheet" href="{{ asset('fonts/font.css') }}">
    <title>Corona stats worldwide</title>
    @vite('resources/css/app.css')
  </head>
  @props(['header'])
  <body class="font-['Inter'] h-full w-full min-h-screen px-4 bg:px-5 xl:px-[6.75rem] mx-auto text-[#010414]">
        @isset($header)
            <x-header/>
        @endisset

        <main {{ $attributes(['class' => 'flex flex-col min-h-screen pt-[2.5rem]']) }}>
          {{ $slot }}
        </main>
        @if(Session::has('success'))
          <x-flash name="success"/>
        @elseif(Session::has('fail'))
          <x-flash name="fail"/>
        @endif
  </body>
</html>
