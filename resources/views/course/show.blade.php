
<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-violet-500 leading-tight">
            {{ __('Available Courses >') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h2 class="text-gray-900 text-3xl title-font font-medium mb-1">Comments</h2>
                            </div>
                            <div class="lg:w-1/2 w-full  lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                                <h1 class="mb-6 text-gray-900 text-3xl title-font font-medium mb-1">{{$course->name}}</h1>
                                <h5 class="text-gray-900 text-2xl title-font font-medium mb-1">Description : </h5>
                                <p class="leading-relaxed ml-3">{{$course->description}}.</p>
                                <div class="flex border-b-2 border-gray-200 mb-5">
                                    <h5 class="text-gray-900 text-2xl title-font font-medium mb-1">Duration : </h5>
                                    <span class="title-font font-medium text-2xl text-gray-900"> {{$course->duration}} Hours</span>
                                    <a href="{{route('enroll',$course->id)}}" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>

