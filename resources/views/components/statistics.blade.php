@props(['label', 'value', 'icon'])
<div class="flex items-start rounded-xl bg-white p-4 shadow-sm">
  <div
      class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
      <x-icon name="{{ $icon }}" class="h-8 w-8 text-blue-500"/>
  </div>

  <div class="ml-4">
      <h2 class="font-semibold">{{ $value }} {{ $label }}</h2>
      <p class="mt-2 text-sm text-gray-500">Total des  {{ $label }}</p>
  </div>
</div>
