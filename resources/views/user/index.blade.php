<x-app-layout>
  <x-slot name="header">
    <x-header-section label='Liste des patients' />
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class='flex float-right px-6 mb-10 mt-4'>
              <a class='btn bg-blue-900 px-4 py-2 text-white rounded-2xl uppercase hover:bg-blue-500' href='{{ route('patients.create') }}'>Ajouter</a>
            </div>
              <div class="p-6 bg-white border-b border-gray-200 mt-10">
                 <livewire:users.list-user />
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
