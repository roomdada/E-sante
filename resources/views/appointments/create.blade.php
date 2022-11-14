<x-app-layout>
  <x-slot name="header">
      <div class="sm:flex sm:items-center sm:justify-between">
          <x-header-section label='Ajouter un rendez-vous' />
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200 mt-10">
                  <livewire:appointments.create-appointment />
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
