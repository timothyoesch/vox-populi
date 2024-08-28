<div class="vpb-people text-sm">
    <p>
        @foreach($people as $person)
            @php
                $template = "<b>{FIRSTNAME} {LASTNAME}</b>";
                if ($person->getCustomField("position")) {
                    $template .= ", {POSITION}";
                }
                if ($person->zip && $person->getCustomField("city")) {
                    $template .= ", {ZIP} {CITY}";
                } elseif ($person->zip) {
                    $template .= ", {ZIP}";
                } elseif ($person->getCustomField("city")) {
                    $template .= ", {CITY}";
                }
                if ($loop->last) {
                    $template .= ".";
                } else {
                    $template .= "; ";
                }
                $template = str_replace(["{FIRSTNAME}", "{LASTNAME}", "{ZIP}", "{CITY}", "{POSITION}"], [$person->firstname, $person->lastname, $person->zip, $person->getCustomField("city"), $person->getCustomField("position")], $template);
            @endphp
            <span id="person-{{\Illuminate\Support\Str::slug($person->firstname)}}-{{\Illuminate\Support\Str::slug($person->lastname)}}" class="vpb-people__person">
                {!! $template !!}
            </span>
        @endforeach
    </p>
</div>
