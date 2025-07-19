<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col">
                <a href="{{route('admin.projects.create')}}" class="w-fit py-4 px-10 text-white bg-indigo-950 rounded-full font-bold">Add New Project</a>
                <hr class="my-5">

                <div class="flex flex-col gap-y-4">

                    @forelse ($projects as $p)
                    <div class="item-project flex flex-row  items-center justify-between">
                       <div class="flex-row flex items-center gap-x-5">
                         <img src="{{Storage::url($p->cover)}}" alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">

                        <div class="flex flex-col gap-y-1">
                            <h3 class="font-bold text-xl">{{$p->name}}</h3>
                            <p class="text-sm text-slate-400">{{$p->category}}</p>
                        </div>

                       </div>

                        <div class="flex-row flex items-center gap-x-2">
                            <a href="{{route('admin.project.assign.tool', $p)}}" class="py-3 px-5 rounded-full bg-indigo-950 text-white">Add Tools</a>
                            <a href="{{route('admin.project_screenshots.create', $p)}}" class="py-3 px-5 rounded-full bg-indigo-950 text-white">Add Screenshot</a>
                        </div>

                        <div class="flex-row flex items-center gap-x-2">
                            <a href="{{route('admin.projects.edit', $p)}}" class="py-3 px-5 rounded-full bg-indigo-500 text-white">Edit</a>
                            <form action="{{route('admin.projects.destroy', $p)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white">Delete</button>
                            </form>
                        </div>
                    </div>
                    @empty
                        Belum ada project tersedia
                    @endforelse
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
