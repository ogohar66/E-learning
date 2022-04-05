
<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl  text-violet-500 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="w-1/2 mx-auto max-w-sm mb-4 mt-6" method="post" action="{{route('courses.store')}}">
                    @csrf
                    <div>
                        <x-jet-label for="name" value="{{ __('Course Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4 ">
                        <x-jet-label for="duration" value="{{ __('Duration') }}" />
                        <x-jet-input id="duration" class="block mt-1 w-full" type="number" name="duration" :value="old('duration')" required />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea name="description"  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="description" cols="39" rows="5">
                            {{old('description')}}
                        </textarea>
                    </div>
                    <div class="flex items-center justify-start mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
