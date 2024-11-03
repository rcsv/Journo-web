<!-- 
    pageTitle が設定されていれば、ページタイトルを挿入するテンプレート

    Trip の一覧を表示する
 -->
 @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
 <x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1>
                    {{ $trip->title}}
                </h1>
                <p class="mt-4 whitespace-pre-line">
                    {{ $trip->start_date }} - {{ $trip->return_date }}
                </p>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{ $trip->destination }}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p>{{ $trip->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>