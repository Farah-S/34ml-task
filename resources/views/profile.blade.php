<x-layout>
    @section('content')
    <div class="pad">
        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Courses</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 p-4 md:p-2 xl:p-5">
                    <x-course-card/>
                    <x-course-card/>
                    <x-course-card/>
                    <x-course-card/>
                    <x-course-card/>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Achievements</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 p-4 md:p-2 xl:p-5">
                    <x-badge-card/>
                    <x-badge-card/>
                    <x-badge-card/>
                    <x-badge-card/>
                   
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Badges</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 p-4 md:p-2 xl:p-5">
                    <x-badge-card/>
                    <x-badge-card/>
                    <x-badge-card/>
                    <x-badge-card/>
                   
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-layout>
