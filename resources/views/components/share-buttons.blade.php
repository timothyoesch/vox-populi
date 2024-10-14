@php
    $url = urlencode(route('landing'));
    $text = urlencode(__("pages.success.shareText"));
@endphp
<div class="appeal-sharebuttons grid md:grid-cols-2 gap-4">
    <a href="{{route('supporter.donate')}}" class="appeal-sharebuttons__button col-span-full">{{__("pages.success.nothx")}}</a>
    <a href="https://api.whatsapp.com/send?text={{$text}}%0A{{$url}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareWhatsApp")}}</a>
    <a href="https://twitter.com/intent/tweet?text={{$text}}%0A{{$url}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareTwitter")}}</a>
    <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareFacebook")}}</a>
    <a href="mailto:?subject={{__("pages.success.shareSubject")}}&body={{$text}}%0A{{$url}}" class="appeal-sharebuttons__button appeal-sharebuttons__button--redirect">{{__("pages.success.shareEmail")}}</a>
</div>


<script>
    document.querySelectorAll(".appeal-sharebuttons__button--redirect").forEach(button => {
        button.addEventListener("click", () => {
            setTimeout(() => {
                window.location.href = "{{route('supporter.donate')}}";
            }, 1000);
        });
    });
</script>
