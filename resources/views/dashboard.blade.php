<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

@canImpersonate
    <a href="{{ route('impersonate', 1) }}">Impersonate user Test 1</a>
@endCanImpersonate

@impersonating
    <a href="{{ route('impersonate.leave') }}">Stop Impersonating</a>
@endImpersonating

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
