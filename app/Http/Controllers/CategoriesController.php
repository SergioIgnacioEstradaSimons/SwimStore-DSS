<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index()
    {
        $categories = Categories::all();

        return view('categories', compact('categories'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        //
    }

    /**
     * Guardar una nueva categoría.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|max:100|unique:categories,nombre'
            ],
            [
                'nombre.required' => 'Debe ingresar el nombre de la categoría.',
                'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
                'nombre.unique' => 'Categoría ya existente.'
            ]
        );

        $nombre = ucfirst(strtolower(trim($request->nombre)));

        Categories::create([
            'nombre' => $nombre
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Categoría registrada correctamente');
    }

    /**
     * Mostrar una categoría.
     */
    public function show(Categories $category)
    {
        return response()->json($category);
    }

    /**
     * Formulario de edición.
     */
    public function edit(Categories $category)
    {
        //
    }

    /**
     * Actualizar una categoría.
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate(
            [
                'nombre' => 'required|max:100|unique:categories,nombre,' . $category->id
            ],
            [
                'nombre.required' => 'Debe ingresar el nombre de la categoría.',
                'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
                'nombre.unique' => 'Categoría ya existente.'
            ]
        );

        $nombre = ucfirst(strtolower(trim($request->nombre)));

        $category->update([
            'nombre' => $nombre
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy(Categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada correctamente');
    }
}
