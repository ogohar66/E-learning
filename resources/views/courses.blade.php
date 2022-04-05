
<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-violet-500 leading-tight">
            {{ __('Available Courses') }}
        </h2>
    </x-slot>
    <div class="py-16 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-3">

                @foreach($courses as $course)

                    <div class="bg-white relative rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                        <div class="mb-12   space-y-4">
                            <h3 class="text-2xl mb-6 font-semibold text-purple-900">{{$course->name}}</h3>
                            <h4 class="text-1xl mb-6 font-semibold text-purple-900">Description : </h4>
                            <p class="mb-6 ml-3">{{$course->description}}</p>
                            <h4 class="text-1xl mb-6 font-semibold text-purple-900">Duration : </h4>
                            <p class="mb-6 ml-3">{{$course->duration}} Hours</p>
                            <div class="absolute bottom-10 left-10">
                                <a href="{{route('enroll',$course->id)}}" class="bg-transparent hover:bg-blue-500 mr-6 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Enroll</a>
                                <a href="{{route('courses.show',$course->id)}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">View</a>
                            </div>
                        </div>
{{--                        <img src="https://tailus.io/sources/blocks/end-image/preview/images/graphic.svg" class="w-2/3 ml-auto -mb-12" alt="illustration" loading="lazy" width="900" height="600">--}}
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>



