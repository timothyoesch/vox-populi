<x-frontend-layout class="bg-accent text-white min-h-screen">
    <div class="appeal-container">
        <div class="min-h-screen flex flex-col justify-center">
            <div class="py-4 md:py-8">
                <h1 class="text-4xl mb-8 font-black uppercase">{{__("pages.success.title", ["name" => request()->name])}}</h1>
                <p>Kannst du dir vorstellen, diese Seite noch mit deinem Umfeld zu teilen, damit wir möglichst viele Menschen erreichen?</p>
                <div class="mt-8">
                    <x-share-buttons />
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
