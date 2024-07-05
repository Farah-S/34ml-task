<x-layout>
    @section('content')
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div>
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    
    <h2 class="text-xl font-bold mb-2">Available Courses</h2>

    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <x-home-course/>
      <x-home-course/>
      <x-home-course/>
      <x-home-course/>
      <x-home-course/>
      
    </div>
  </div>
</div>

    @endsection
</x-layout>