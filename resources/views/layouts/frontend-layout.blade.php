<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__("og.title")}}</title>

    <meta name="title" content="{{__("og.title")}}">
    <meta name="description" content="{{__("og.description")}}">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{__("og.title")}}" />
    <meta property="og:description" content="{{__("og.description")}}" />
    <meta property="og:image" content="{{url("images/og/" . app()->getLocale() . "_og.png")}}" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{url()->current()}}" />
    <meta property="twitter:title" content="{{__("og.title")}}" />
    <meta property="twitter:description" content="{{__("og.description")}}" />
    <meta property="twitter:image" content="{{url("images/og/" . app()->getLocale() . "_og.png")}}" />

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#fff06a">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#fff06a">
    <meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#fff06a">

    @vite("resources/css/app.scss")
</head>
<body class="antialiased">

    <div id="main-content" class="mb-40">
        {{ $slot }}
    </div>

    @vite("resources/js/app.js")
</body>
</html>
