@php
    $locale = app()->getLocale();
@endphp
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>{{__("seo.og.title")}}</title>
    <meta name="title" content="{{__("seo.og.title")}}" />
    <meta name="description" content="{{__("seo.og.description")}}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{url("")}}" />
    <meta property="og:title" content="{{__("seo.og.title")}}" />
    <meta property="og:description" content="{{__("seo.og.description")}}" />
    <meta property="og:image" content="{{url("images/og/og_{$locale}.png")}}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{url("")}}" />
    <meta property="twitter:title" content="{{__("seo.og.title")}}" />
    <meta property="twitter:description" content="{{__("seo.og.description")}}" />
    <meta property="twitter:image" content="{{url("images/og/og_{$locale}.png")}}" />

    <!-- Meta Tags Generated with https://metatags.io -->

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png?v=2">
    <link rel="manifest" href="/images/favicon/site.webmanifest?v=2">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg?v=2" color="#ffff00">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico?v=2">
    <meta name="msapplication-TileColor" content="#ff00ff">
    <meta name="msapplication-config" content="/images/favicon/browserconfig.xml?v=2">
    <meta name="theme-color" content="#ffffff">

    @vite("resources/css/app.scss")
</head>
<body>

    <div id="main-content">
        {{ $slot }}
    </div>
</body>
</html>
