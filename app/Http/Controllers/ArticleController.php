<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Article::with('category')->orderBy('category_id')->orderBy('nombre')->paginate(5); // como tenemos una función category para traernos info
        // de la tabla categoría, tenemos que añadirla para evitar un problema de rendimiento
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:60', 'unique:articles,nombre'],
            'descripcion' => ['required', 'string', 'min:3', 'max:150'],
            'disponible' => ['required', 'in:SI,NO'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Article::create($request->all());

        // Si Disponible fuese recogido por un checkbox solamente (Se marca si SI y si no se marca, es un NO), se hace de la siguiente manera:
        $disponible = $request->disponible ?? "NO";
        Article::create([
            'nombre' => ucfirst($request->nombre),
            'descripcion' => ucfirst($request->descripcion),
            'disponible' => $disponible,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('articles.index')->with('mensaje', 'Artículo Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::destroy($article);
        redirect()->route('articles.index')->with('mensaje', 'Artículo Borrado');
    }
}
