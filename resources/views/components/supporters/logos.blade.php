@php
    $logos = collect(scandir(public_path('images/logos/' . app()->getLocale())))->filter(function ($file) {
        return !in_array($file, ['.', '..']) && !str_contains($file, "100.") && !str_contains($file, "200.") && !str_contains($file, "400.") && !str_contains($file, "800.");
    })->map(function ($file) {
        return [
            'name' => explode("__", pathinfo($file, PATHINFO_FILENAME))[1],
            'filetype' => pathinfo($file, PATHINFO_EXTENSION),
            'url' => asset('images/logos/' . app()->getLocale() . "/" . pathinfo($file, PATHINFO_FILENAME)),
        ];
    })->values()->toArray();
@endphp

<div class="koref-logos-grid grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2 mt-6">
    @foreach($logos as $logo)
    <picture>
        <source
          type="image/avif"
          srcset="{{$logo['url']}}-100.avif?width=100 100w, {{$logo['url']}}-200.avif?width=200 200w, {{$logo['url']}}-400.avif?width=400 400w, {{$logo['url']}}-800.avif?width=800 800w" />
        <source
          type="image/webp"
          srcset="{{$logo['url']}}-100.webp?width=100 100w, {{$logo['url']}}-200.webp?width=200 200w, {{$logo['url']}}-400.webp?width=400 400w, {{$logo['url']}}-800.webp?width=800 800w" />
        <img
          src="{{$logo['url']}}.{{$logo['filetype']}}"
          srcset="{{$logo['url']}}-100.png?width=100 100w, {{$logo['url']}}-200.png?width=200 200w, {{$logo['url']}}-400.png?width=400 400w, {{$logo['url']}}-800.png?width=800 800w"
          sizes="(max-width: 800px) 100vw, 50vw"
          style="width: 100%; aspect-ratio: 1"
          loading="lazy"
          decoding="async"
          alt="{{ $logo['name'] }}"
        />
    </picture>
    @endforeach
</div>
