<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li class="py-5 bg-red-700 text-white font-bold">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('admin.project_screenshots.store', $project->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="flex flex-col gap-5">
                        <h1 class="text-3xl text-indigo-950 font-bold">Add Project Screenshot</h1>

                        <div class="flex-row flex items-center gap-x-5">
                         <img src="{{Storage::url($project->cover)}}" alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">

                        <div class="flex flex-col gap-y-1">
                            <h3 class="font-bold text-xl">{{$project->name}}</h3>
                            <p class="text-sm text-slate-400">{{$project->category}}</p>
                        </div>

                       </div>
                       

                        <div class="flex flex-col gap-y-2">
                            <h3>Screenshot</h3>
                            <input type="file" id="screenshot" name="screenshot">
                        </div>


                        <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Add Screenshot</button>
                    </div>

                </form>

                <hr class="my-10">

                
                <h1 class="text-1xl text-indigo-950 font-bold">Existing Screenshots</h1>

                <div class="flex flex-col gap-x-5">

                            @forelse ($project->screenshots as $screenshot)
                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-row gap-x-2 items-center">
                                        <img src="{{Storage::url($screenshot->screenshot)}}" alt="" class="w-[120px] h-[90px] object-contain rounded-2xl">
                                    </div>
                                    <div class="flex flex-row gap-x-2 items-center">
                                        <form action="{{route('admin.project_screenshots.destroy', $screenshot->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-full">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                Screeshots belum ada
                            @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
