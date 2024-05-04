<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('홈') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-center">
                <div class="p-6 text-lg text-gray-900 font-semibold">
                    {{ __("주식 시장 동향") }}
                </div>
            </div>
        </div>
    </div>
    @include('components.section-stock')
    <x-Board>
    
     </x-Board>
</x-app-layout>