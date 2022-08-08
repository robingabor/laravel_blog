@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">

                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>

                <a href="/blog" class="bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>

            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        {{-- img --}}
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/01/08/18/29/entrepreneur-593357_960_720.jpg" width="700" alt="">
        </div>
        {{-- Content --}}
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur voluptates quod nam et, explicabo maiores. Debitis quisquam modi ab quae obcaecati rerum minima corrupti delectus asperiores, autem reiciendis reprehenderit ipsa?
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur, eos?
            </p>

            <a 
                href="/blog"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-1xl">
                Find Out More
            </a>
            
        </div>
    </div>

    {{-- TODO : Make it dynamic --}}
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            I'm an expert in ...
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            UX Desing
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Project Management
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Digital Strategy
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Backend 
        </span>
    </div>

    <div class="text-center py-15">

        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti dignissimos quo, esse dolorem placeat doloribus fuga eius optio neque voluptatum consectetur vero repudiandae, dolor delectus nesciunt numquam accusamus totam necessitatibus!
        </p>

    </div>

    {{-- Posts --}}
    <div class="sm:grid grid-cols-2 w-4/5 m-auto">

        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block ">

                <span class="uppercase text-xs">
                    PHP
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis eius laudantium deserunt accusantium animi deleniti provident, recusandae similique fuga eum temporibus, corrupti ducimus, modi corporis quas quae alias eaque quia.
                </h3>
                
                <a href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>

            </div>
        </div>

        {{-- img --}}
        <div>
            <img src="https://cdn.pixabay.com/photo/2018/01/16/16/47/adult-3086304_960_720.jpg" width="700" alt="">
        </div>

    </div>

@endsection