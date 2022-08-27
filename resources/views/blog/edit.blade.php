@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center ">
    <div class="py-8 ">
        <h1 class="text-5xl">
            Update Post
        </h1>
    </div>
</div>

{{-- Validation --}}
@if ($errors->any())    
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-2/5 m-auto mb-4 text-gray-50 bg-red-500 rounded-2xl py-4 uppercase">
                    <i class="fa fa-exclamation-triangle fa-lg fa-beat-fade p-5 text-yellow-300" style="--fa-beat-scale: 2.0;" aria-hidden="true"></i>{{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


<div class="w-4/5 m-auto pt-20">
    <form action="/blog/{{ $post->slug }}"
    method="POST"
    enctype="multipart/form-data"
    class="border border-gray-400 rounded-3xl p-10">
    @csrf
    {{-- Tranfer the POST request into a PUT --}}
    @method('PUT')

    <input type="text"
        name="title"
        class="bg-transparent outline-none block border-b-2 w-full h-20 text-2xl"
        value="{{ $post->title }}"
    >

    <textarea 
        name="description"
        class="py-20 bg-transparent block border-b-2 w-full h-60  text-2xl outline-none" >{{ $post->description }}</textarea>

    <div class="bg-grey-lighter pt-15">
        <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:shadow-xl">
            <span class="mt-2 text-base leading-normal">
                Select a file
            </span>
            {{-- hidden input type --}}
            <input 
                type="file"
                name="image"
                class="hidden">
        </label>

    </div>

    {{-- Submit btn --}}
    <button 
        type="submit" 
        class="uppercase mt-15 bg-blue-500 text-gray-100 text-xl tracking-wide font-semibold py-4 px-8 rounded-3xl">
        Submit
    </button>

    </form>
</div>


@endsection