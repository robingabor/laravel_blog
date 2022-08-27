@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center ">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

{{-- Placeholder for the message of the successully created post --}}
@if (session()->has('message'))
    <div class="w-4/5 m-auto pt-10 pl-2">
        <p class="w-2/5 m-auto mb-4 text-center text-gray-50 bg-green-500 rounded-2xl py-4 uppercase">
            <i class="fa-solid fa-circle-check p-5 text-gray-50"></i>{{ session()->get('message') }}
        </p>
    </div>
@endif

{{-- Lets determin if a user already logged in or not --}}
@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto my-5 ">
        <a href="/blog/create" class="bg-gray-0 bg-transparent border border-green-600 rounded-full font-extrabold text-green-600 text-xs  px-7 py-7 uppercase flex flex-col align-center text-center w-1/6 shadow-lg hover:text-gray-50 hover:bg-green-600 hover:shadow-xl">
                <span class=" text-2xl font-extrabold">+ POST</span>                                       
        </a>
    </div>
@endif

@foreach ($posts as $post )   


<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    {{-- IMG --}}
    <div>
        <img src="{{ asset('images/' . $post->image_path)  }}" width="700" alt="">
    </div>

    
    <div>
        {{-- Title --}}
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{ $post->title }}
        </h2>

        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>
        </span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>

        {{-- Show Post --}}
        <a href="/blog/{{ $post->slug }}"        
            class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-8 rounded-3xl">Keep Reading
        </a>
        {{-- Edit Post --}}
        {{-- First we need to check 2 thing --}}
        {{-- First : is the user logged in?  --}}
        {{-- Second is the logged in user's is the same as the id of the user who created the post? --}}
        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <div class="grid grid-rows-2 gap-10 justify-items-end ">
                <span class="">
                    {{-- Edit Button --}}
                    <a href="/blog/{{ $post->slug }}/edit"
                        class=" text-gray-700 hover:text-gray-900 pb-1 border-b-2 border-green-500 font-extrabold">Edit
                    </a>
                </span>
                {{-- Delete button --}}
                <span class="">
                    <form 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')
                    
    
                        <button class="text-red-500" type="submit">Delete</button>
                    </form>
                </span>
            </div>
            
        @endif
        
    </div>
</div>

@endforeach

@endsection