<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validamos
        // $request->validate([
        //     'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,nombre'],
        //     'color' => ['required', 'regex:/^#?([a-f0-9]{6}|[a-f0-9]{3})$/']],
        // Y ahora podemos hacer un array de mensajes de error
        // [
        //     'color.regex' => 'El color debe ser una # y seis caracteres hexadecimales'
        // ]
        // );

        // ^ ^ ^ Lo dejamos como documentación ya que lo haremos con paquetes

        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,nombre'],
            'color' => ['required', 'color_hex']]);
        // Si todo sale bien, lo insertamos

        Category::create($request->all());
        // Nos vamos a index y creamos la alerta del mensaje
        return redirect()->route('categories.index')->with('mensaje', 'Categoría creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categorias.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,nombre,'.$category->id],
            'color' => ['required', 'color_hex']]);
        
        // Si todo sale bien, lo modificamos
        $category->update($request->all());
        // Nos vamos a index y creamos la alerta del mensaje
        return redirect()->route('categories.index')->with('mensaje', 'Categoría modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $category->delete();

        return redirect()->route('categories.index')->with('mensaje', 'Categoría eliminada');
    }
}
