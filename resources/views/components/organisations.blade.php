@php
$organisations = [
    "de" => [
        "gps_de.png" => "Grüne Partei Schweiz",
        "campax.png" => "Campax",
        "gsoa.png" => "Gruppe für eine Schweiz ohne Armee",
    ],
    "fr" => [
        "gps_fr.png" => "Les vertes suisse",
        "campax.png" => "Campax",
        "gsoa.png" => "Groupe pour une Suisse sans armée",
    ],
    "it" => [
        "gps_it.png" => "I Verdi Svizzera",
        "campax.png" => "Campax",
        "gsoa.png" => "Gruppo per una Svizzera senza esercito",
    ]
][app()->getLocale()];
@endphp
<div class="petition__organisations grid grid-cols-2 md:grid-cols-3">
    @foreach ($organisations as $image => $name)
        <div class="petition__organisation">
            <img src="/images/organisations/{{ $image }}" alt="Logo: {{ $name }}" class="object-contain"/>
        </div>
    @endforeach
</div>
