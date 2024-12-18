@extends('plantillas.principal')
@section('titulo')
Artículos
@endsection

@section('cabecera')
Listado de Artículos
@endsection

@section('contenido')


<div class="p-4">
    <div class="flex flex-row-reverse my-2">
        <a href="{{route('articles.create')}}" class="px-2 py-1 rounded-xl bg-blue-500 hover:bg-blue-700 text-white font-bold">
            <i class="fas fa-add mr-2">Nueva</i>
        </a>
    </div>
    

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NOMBRE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DESCRIPCIÓN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CATEGORÍA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DISPONIBILIDAD
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->descripcion}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-white px-2 py-1 rounded-xl text-center w-32" style="background-color:{{$item->category->color}}">
                                {{$item->category->nombre}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div @class([
                                'px-2 py-1 rounded-xl font-bold',
                                'text-red-500' => $item->disponible =="NO",
                                'text-green-500' => $item->disponible =="SI",
                                ])>
                                {{$item->disponible}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('articles.destroy', $item)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">
                                    <i class="fas fa-trash text-red-500 hover:text-xl"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-1">
            {{$articulos->links()}}
        </div>
    </div>

</div>

@endsection
@section('alertas')
@if(@session('mensaje'))
<x-alert>
    {{session('mensaje')}}
</x-alert>
@endif
@endsection