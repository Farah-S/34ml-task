<x-layout>
    @section('content')
    <div class="container mx-auto p-7 pad" style="max-width:80%">
        <div class="flex items-center">
            <!-- Image on the left -->
            <div class="w-1/3 course-image">
                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="course Image" class="h-auto" style="width: 75%">
            </div>
            <!-- Info column on the right -->
            <div class="w-2/3">
                <h2 class="text-xl font-bold mb-2">{{$course->title}}</h2>
                <p class="mb-4">This is a description or information about the course. This is a description or information about the course. This is a description or information about the course.</p>
                <div>
                    @if($course->enrolled)
                    <label class="enrolled">Already enrolled</label>
                    @else
                    <form action="{{ route('course.enroll') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value={{$course->id}}>
                        <x-primary-button>
                            {{ __('Enroll') }}
                        </x-primary-button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="container mx-auto p-4 pad">
            
            <h2 class="text-xl font-bold mb-2">Lessons</h2>
            @if($course && $course->lessons->count())
            <?php 
                $course->lessons = $course->lessons->sortBy('order');
            ?>
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($course->lessons as $l)

                    <x-lesson-list-item :lesson="$l" />        
                
                @endforeach
              
            </ul>

            @endif
        </div>
    </div>
    @endsection
</x-layout>