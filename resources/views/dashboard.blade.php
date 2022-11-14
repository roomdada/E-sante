<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                      @if(auth()->user()->hasRole(\App\Models\Role::SUPER_ADMIN))
                          <livewire:dashboards.admin />
                        @else 
                          <livewire:dashboards.patient />
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
