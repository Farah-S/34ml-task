<x-layout>
    @section('content')
    <div class="pad">
        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Courses</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 p-4 md:p-2 xl:p-5">
                    @foreach($profile['courses'] as $c)
                    <div class="relative bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform transition duration-500 hover:scale-105"  style="width:14rem;">
                        <div class="p-2 flex justify-center">
                            <a href="{{ route('course', $c) }}">
                                <img class="rounded-md"
                                src="https://tailwindflex.com/public/images/thumbnails/mango-gradient/canvas.min.webp"
                                loading="lazy">
                            </a>
                        </div>
                        <div class="px-4 pb-3">
                            <div>
                                <a href="{{ route('course', $c) }}">
                                    <h5 class="text-xl font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-gray-900 dark:text-white ">
                                        {{$c->title}}
                                    </h5>
                                </a>

                                <p class="antialiased text-gray-600 dark:text-gray-400 text-sm break-all">
                                    course description
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Achievements</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 p-4 md:p-2 xl:p-5">
                    @foreach($profile['unlocked_achievements'] as $a)
                    
                    <div class="relative bg-white border rounded-md dark:bg-gray-800 dark:border-gray-700" style="width:12rem;">
                        <div class="p-2 flex justify-center">
                    
                                <img class="rounded-md"
                                src="https://tailwindflex.com/public/images/thumbnails/mango-gradient/canvas.min.webp"
                                loading="lazy">
                        
                        </div>
                        <div class="px-4 pb-3">
                            <div>
                                <a href="#">
                                    <h5 class="text-l font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-gray-900 dark:text-white ">
                                         {{$a}}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   @foreach($profile['next_available_achievements'] as $n)
                    
                    <div class="relative bg-white border rounded-md dark:bg-gray-800 dark:border-gray-700" style="width:12rem; height:11rem;">
                        <div class="p-2 flex justify-center">
                    
                                <img class="rounded-md"
                                src="https://images.unsplash.com/photo-1600456899121-68eda5705257?q=80&w=2157&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                loading="lazy">
                        
                        </div>
                        <div class="px-4 pb-3">
                            <div>
                                <a href="#">
                                    <h5 class="text-l text-gray-500 font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 dark:text-white ">
                                         {{$n}}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-2 p-2">Your Badges</h2>
            <div class="h-full flex w-full justify-left items-center dark:bg-gray-800">

                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 p-4 md:p-2 xl:p-5">
                    @foreach($profile['badges'] as $b)
                    
                    <div class="relative bg-white border rounded-md dark:bg-gray-800 dark:border-gray-700" style="width:12rem;">
                        <div class="p-2 flex justify-center">
                    
                                <img class="rounded-md"
                                src="https://tailwindflex.com/public/images/thumbnails/mango-gradient/canvas.min.webp"
                                loading="lazy">
                        
                        </div>
                        <div class="px-4 pb-3">
                            <div>
                                <a href="#">
                                    <h5 class="text-l font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-gray-900 dark:text-white ">
                                         {{$b->title}}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-layout>
