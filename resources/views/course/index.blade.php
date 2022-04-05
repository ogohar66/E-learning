<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold w-3/4  text-xl text-violet-500 leading-tight">
                {{ __('My Courses') }}
            </h2>
            @teacher
            <a  href="{{ route('courses.create') }}" class="bg-transparent text-center w-1/4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Create new course
            </a>
            @endteacher
        </div>

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
                                @teacher
                                    <a href="{{ route('courses.edit',$course->id) }}" class="bg-gray-300 ml-3 text-yellow-600  hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span> Edit</span>
                                    </a>
                                    <form method="post" action="{{ route('courses.destroy',$course->id) }}" class="  w-1/4   font-bold py-2 px-4 rounded inline-flex items-center">
                                        @csrf
                                        @method('delete')

                                        <button  class="bg-gray-300 ml-3 text-red-600  hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span> Delete</span>
                                        </button>

                                    </form>
                                @else

                                    <a href="{{route('courses.show',$course->id)}}" class=" font-medium mr-10 text-purple-600">Go to Course</a>
                                    <a href="{{route('unEnroll',$course->id)}}" class="bg-blue-900 p-3  font-medium text-purple-600">Un-Enroll</a>
                                @endteacher
                            </div>
                        </div>
                        {{--                        <img src="https://tailus.io/sources/blocks/end-image/preview/images/graphic.svg" class="w-2/3 ml-auto -mb-12" alt="illustration" loading="lazy" width="900" height="600">--}}
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
