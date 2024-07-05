<a href="{{ route('course', $course) }}" class="group ">
    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7" style="width:16rem;">
        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="person writing on a paper" class="h-full w-full object-cover object-center group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-sm text-gray-700">{{ $course->title }}</h3>
</a>