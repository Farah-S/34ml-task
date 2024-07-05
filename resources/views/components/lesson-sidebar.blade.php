
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">

       <h2 class="text-xl font-bold mb-2"> {{$course['title']}}</h2>
       <ul class="space-y-2 font-medium">
            @foreach($course['lessons'] as $l)
         <li class="flex justify-between gap-x-6 py-5">
            <a href="lesson" class="w-full hover:bg-gray-100">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{$l->title}}</p>
                <p class="text-sm leading-6 text-gray-900">
                    <?php
                    if($l->completed==0){
                        echo "Not Completed";
                    }
                    else{
                        echo "Completed";
                    }
                    ?>
                </p>
            </a>
        </li>
        @endforeach
        
      </ul>
   </div>
</aside>
