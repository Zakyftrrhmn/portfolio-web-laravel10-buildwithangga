<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tools') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col gap-x-5">

                        <a href="{{route('admin.tools.create')}}" class="w-fit py-3 px-5 bg-indigo-950 text-white font-bold rounded-full">Add Tools</a>

                        <hr class="my-5">

                        <div class="flex flex-col gap-x-5">

                            @forelse ($tools as $tool)
                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-row gap-x-2 items-center">
                                        <img src="{{Storage::url($tool->logo)}}" alt="" class="w-[120px] h-[90px] object-contain rounded-2xl">
                                        <div class="flex flex-col gap-y-2">
                                            <h3 class="font-bold">{{$tool->name}}</h3>
                                            <p class="text-slate-400">{{$tool->tagline}}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-x-2 items-center">
                                        <a href="{{route('admin.tools.edit', $tool)}}" class="px-6 py-3 bg-indigo-500 text-white rounded-full">Edit</a>
                                        <form action="{{route('admin.tools.destroy', $tool)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-full">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                Tools belum ada
                            @endforelse

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
