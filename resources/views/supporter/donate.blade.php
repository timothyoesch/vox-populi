<x-frontend-layout>
    <div class="appeal-container py-4 md:py-8">
        <h1 class="text-4xl mb-8">{{__("pages.donate.title")}}</h1>
        {!!
            \Illuminate\Mail\Markdown::parse(
                file_get_contents(resource_path('content/donate.' . app()->getLocale() . '.md'))
            )
        !!}
        <script language="javascript" src="https://widget.raisenow.com/widgets/lema/gsoas-948f/js/dds-init-widget-de.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.rnwWidget = window.rnwWidget || {};
            window.rnwWidget.configureWidget = function(options) {
                options.defaults['stored_campaign_name'] = 'gsoa_dringenderaufruf';
            };
        </script>
        <div class="p-4 bg-foreground w-fit mt-8">
            <div class="dds-widget-container" data-widget="lema"></div>
        </div>
    </div>
</x-frontend-layout>
