<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update My Tools') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li class="py-5 bg-red-700 text-white font-bold">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('admin.tools.update', $tool)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col gap-y-5">
                            <div class="flex flex-col gap-y-2">
                                <h3 >Name</h3>
                                <input type="text" value="{{$tool->name}}" name="name" id="name">
                            </div>

                            <div class="flex flex-col gap-y-2">
                                <h3 >Tagline</h3>
                                <input type="text" value="{{$tool->tagline}}" name="tagline" id="tagline">
                            </div>

                            <div class="flex flex-col gap-y-2">
                                <h3 >Logo</h3>
                                <img src="{{Storage::url($tool->logo)}}" alt="" class="w-[120px] h-[90px] object-contain rounded-2xl">
                                <input type="file" name="logo" id="logo">
                            </div>
                        </div>

                        <button type="submit" class="px-5 py-2 bg-indigo-950 text-white font-bold">Update My Tool</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
