@extends('plantillas.principal')
@section('titulo')
Categorías
@endsection

@section('cabecera')
Listado de Categorías
@endsection

@section('contenido')


<div class="mx-auto w-1/2 p-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    NOMBRE
                </th>
                <th scope="col" class="px-6 py-3">
                    COLOR
                </th>
                <th scope="col" class="px-6 py-3">
                    ACCIONES
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->id}}
                </th>
                <td class="px-6 py-4 font-bold">
                    {{$item->nombre}}
                </td>
                <td class="px-6 py-4">
                    <p class="px-2 py-1 rounded w-32" style="background-color:{{$item->color}}">&nbsp;</p>
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('alertas')
@endsection