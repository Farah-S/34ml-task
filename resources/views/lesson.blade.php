<x-layout>
    @section('content')

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">

       <h2 class="text-xl font-bold mb-2"> {{$object['course']['title']}}</h2>
       <ul class="space-y-2 font-medium">
            @foreach($object['course']['lessons'] as $l)
         <li class="flex justify-between gap-x-6 py-5">
            <form method="POST" action="{{ route('lessons.update') }}">
    @csrf

    <!-- Assuming serialized data is stored in a hidden input field -->
    <input type="hidden" name="course_id" value="{{ $object['course']['id'] }}">
    <input type="hidden" name="lesson_id" value="{{ $l->id }}">
    
    <!-- <a href="lesson/{{$l->id}}" class="w-full hover:bg-gray-100"> -->
        <button type="submit" class="w-full hover:bg-gray-100 " style="padding-right: 100px; 
        box-sizing: border-box;">
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
            </button>
        </li>
    </form>
        @endforeach
        
      </ul>
   </div>
</aside>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
        <h2 class="text-xl font-bold mb-2">{{$object['lesson']['title']}}</h2>
     
      <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800" style="height: 20rem;">
         <p class="text-2xl text-gray-600 dark:text-gray-500">
            Video
         </p>
      </div>
      <div class="bg-gray-50 p-6">
            <h2 class="text-lg font-bold mb-4">Comments</h2>
            <div class="flex flex-col space-y-4">
                <ul id="commentsList">
                    @if(count($object['comments'])>0)
                        @foreach ($object['comments'] as $comment)
                            <x-comment-card :comment="$comment" name=""/>
                        @endforeach
                    @endif
                </ul>
                <form class="bg-white p-4 rounded-lg shadow-md" method="POST" action="{{route('comment')}}">
                    @csrf
                    <h3 class="text-lg font-bold mb-2">Add a comment</h3>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="comment">
                            Comment
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="text" name="text" rows="3" placeholder="Enter your comment"></textarea>
                            <input type="hidden" value="{{$object['lesson']['id']}}" id="lesson_id" name="lesson_id"/>
                            
                    </div>
                    <button
                        class="bg-gray-800 hover:bg-gray-800 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
   </div>
</div>

    @endsection
</x-layout>