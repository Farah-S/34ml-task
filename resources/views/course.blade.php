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
                    <x-primary-button>
                        {{ __('Enroll') }}
                    </x-primary-button>
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
                <!-- <li class="flex justify-between gap-x-6 py-5">
        
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Completed</p>
                        
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex items-center justify-center ">
                            <div class="flex items-center justify-center w-9 h-9 bg-white border-2 border-gray-800 rounded-full">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Lesson Name</p>
                                <a href="lesson" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Completed</p>
                        
                    </div>
                </li><li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex items-center justify-center ">
                            <div class="flex items-center justify-center w-9 h-9 bg-white border-2 border-gray-800 rounded-full">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Lesson Name</p>
                                <a href="lesson" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Completed</p>
                        
                    </div>
                </li> -->
            </ul>

            @endif
        </div>
    </div>
    @endsection
</x-layout>