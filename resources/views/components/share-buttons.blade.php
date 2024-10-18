@php
    $source = (request()->source && request()->source !== "DEFAULT") ? request()->source : false;
    $url = urlencode(route('landing'));
    if ($source) {
        $url .= urlencode("?s=" . $source);
    }
    $text = urlencode(__("pages.success.shareText"));
    // Replace + with %20
    $email = str_replace("+", "%20", $text);
    $tweet = urlencode(__("pages.success.shareTweet") . "\n" . route("landing"));
@endphp
<div class="appeal-sharebuttons grid md:grid-cols-2 gap-4">
    @if(!$end)
    <a href="{{route('supporter.donate')}}" class="appeal-sharebuttons__button col-span-full">{{__("pages.success.nothx")}}</a>
    @endif
    <a href="https://api.whatsapp.com/send?text={{$text}}%0A{{$url}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareWhatsApp")}}</a>
    <a href="https://twitter.com/intent/tweet?text={{$tweet}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareTwitter")}}</a>
    <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareFacebook")}}</a>
    <a href="mailto:?body={{$email}}%0A{{$url}}" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareEmail")}}</a>
</div>


@if(!$end)
<script>
    document.querySelectorAll(".appeal-sharebuttons__button--redirect").forEach(button => {
        button.addEventListener("click", () => {
            setTimeout(() => {
                window.location.href = "{{route('supporter.donate')}}";
            }, 1000);
        });
    });
</script>
@endif
