<x-layout>
    @section('content')
    <div class="container mx-auto p-4 pad">
        <div class="flex items-center course-container">
            <!-- Image on the left -->
            <div class="w-1/3 course-image">
                <img src="your-image-url.jpg" alt="Image Description" class="w-full h-auto">
            </div>
            <!-- Info column on the right -->
            <div class="w-2/3">
                <h2 class="text-xl font-bold mb-2">Title Here</h2>
                <p class="mb-4">This is a description or any information you want to display in the column next to the image. You can add more text or other HTML elements as needed.</p>
                <div>
                    <x-primary-button>
                        {{ __('Enroll') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
        <div class="container mx-auto p-4 pad">
            
            <h2 class="text-xl font-bold mb-2">Lessons</h2>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex items-center justify-center ">
                            <div class="flex items-center justify-center w-9 h-9 bg-white border-2 border-gray-800 rounded-full">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Lesson Name</p>
                                <a href="" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
                        </div>
                    </div>
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
                                <a href="" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
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
                                <a href="" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
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
                                <a href="" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Completed</p>
                        
                    </div>
                </li>
            </ul>

        </div>
    </div>
    @endsection
</x-layout>