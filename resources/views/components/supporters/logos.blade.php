@php
    $logos = File::files(storage_path('app/public/images/logos'));
@endphp

<div class="vpb-logos-grid grid grid-cols-3 md:grid-cols-4 gap-2">
    @foreach($logos as $logo)
        <img src="{{url("storage/images/logos/" . $logo->getFilename())}}" alt="Logo" class="vpb-logos-grid__logo rounded-md" loading="lazy">
    @endforeach
</div>
