@extends('plantillas.principal')
@section('titulo')
Editar Categoría
@endsection
@section('cabecera')
Modificar Categoría
@endsection
@section('contenido')
<div class="w-1/2 mx-auto my-2 p-2 rounded-xl shadow-xl border-2 border-black">
    <form method="POST" action="{{route('categories.update', $category)}}">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{@old('nombre', $category->nombre)}}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            @error('nombre')
                <x-error>
                    {{$message}}
                </x-error>
            @enderror
        </div>
        <div class="mb-5">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
            <input type="color" name="color" value="{{@old('color', $category->color)}}" id="color"/>
            @error('color')
                <x-error>
                    {{$message}}
                </x-error>
            @enderror
        </div>
        <div class="flex justify-around">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <button type="reset" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Reset</button>
            <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <a href="{{route('categories.index')}}">Volver</a>
            </button>
        </div>
    </form>
</div>
@endsection