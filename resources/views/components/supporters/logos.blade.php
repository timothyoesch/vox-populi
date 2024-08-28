@php
    $logos = File::files(public_path('images/logos'));
@endphp

<div class="vpb-logos-grid grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-2">
    @foreach($logos as $logo)
        <img src="{{asset('images/logos/' . $logo->getFilename())}}" alt="Logo" class="vpb-logos-grid__logo rounded-md" loading="lazy">
    @endforeach
</div>
