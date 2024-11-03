<!-- 
    pageTitle が設定されていれば、ページタイトルを挿入するテンプレート

    Trip の一覧を表示する
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
        <table>
            <tr><th>{{ __('ID') }}</th><th>{{ __('Title') }}</th><th>Start</th><th>Return</th><th>{{ __('Destination') }}</th><th>{{ __('Created by') }}</th></tr>
            @foreach($trips as $trip)
            <tr>
            <td>{{ $trip->id }}</td>
            <td>{{ __($trip->title) }}</td>
            <td>{{ \Carbon\Carbon::parse($trip->start_date)->format('Y/m/d') }}</td>
            <td>{{ \Carbon\Carbon::parse($trip->end_date)->format('Y/m/d') }}</td>
            <td>{{ __($trip->destination) }}</td>
            <td>{{ $trip->user->name }}
            </tr>
            

            @endforeach
        </table>
        <!-- pagination link -->
        {{ $trips->links() }}
    </div>
</x-app-layout>