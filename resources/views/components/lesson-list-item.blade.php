
<li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
        <div class="flex items-center justify-center ">
            <div class="flex items-center justify-center w-9 h-9 bg-white border-2 border-gray-800 rounded-full">
                <span>{{$lesson->order}}</span>
            </div>
        </div>
        <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{$lesson->title}}</p>
                <a href="{{ route('enrolledCheck', ['lesson' => $lesson]) }}" class="mt-1 truncate text-xs leading-5 blue-link">start lesson</a>
        </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <p class="text-sm leading-6 text-gray-900">Completed</p>
        
    </div>
</li>