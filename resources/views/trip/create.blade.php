<!-- 
    pageTitle が設定されていれば、ページタイトルを挿入するテンプレート
 -->
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('pageTitle')
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">{{ __(session('message')) }}</div>
        @endif
        <form method="POST" action="{{ route('trip.store') }}">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">{{ __('Title') }}</label>
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title">
                </div>
            </div>
        

            <div class="w-full flex flex-col">
                <label for="destination" class="font-semibold mt-4">{{ __('Destination') }}</label>
                <textarea type="text" name="destination" class="w-auto py-2 border border-gray-300 rounded-md" id="destination">{{ old('destination')}}</textarea>
            </div>

            <x-primary-button class="mt-4">
            {{ __('Create') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>