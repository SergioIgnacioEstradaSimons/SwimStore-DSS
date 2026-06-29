<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        $categories = Categories::all();

        return view('administrador.productos.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categories_id' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Products::create([
            'nombre' => $request->nombre,
            'categories_id' => $request->categories_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'estado' => true
        ]);

        return back()->with('success', 'Producto registrado');
    }

    public function update(Request $request, $producto)
    {
        $product = Products::findOrFail($producto);

        $request->validate([
            'nombre' => 'required|max:100',
            'categories_id' => 'required|exists:categories,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update([
            'nombre' => ucfirst(strtolower(trim($request->nombre))),
            'categories_id' => $request->categories_id,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('administrador.productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($producto)
    {
        $product = Products::findOrFail($producto);

        $product->delete();

        return redirect()
            ->route('administrador.productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

    public function toggle($id)
    {
        $product = Products::findOrFail($id);
        $product->estado = !$product->estado;
        $product->save();

        return back();
    }
}
