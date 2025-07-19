<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
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


                        <div class="flex-row flex items-center gap-x-5">
                            <div class="flex flex-col gap-y-1">
                                <h3 class="font-bold text-xl">{{$projectOrder->name}}</h3>
                                <p class="text-sm text-slate-400">{{$projectOrder->category}}</p>
                            </div>
                        </div>
                       
                <hr class="my-10">

                
                <h1 class="text-1xl text-indigo-950 font-bold">Brief</h1>
                <p>{{$projectOrder->brief}}</p>
                <p>{{$projectOrder->email}}</p>
                <p>${{$projectOrder->budget}}</p>

            </div>
        </div>
    </div>
</x-app-layout>
