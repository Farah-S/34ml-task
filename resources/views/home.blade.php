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


     @if($courses && $courses->count())
        
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach($courses as $c)
      <div class="course">
          
          <x-home-course :course="$c"/>
          
        </div>
        
        @endforeach
    </div>
    @else
        <p>No courses available.</p>
    @endif
    

  </div>
</div>

    @endsection
</x-layout>