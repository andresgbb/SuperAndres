<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log; // Importar la fachada Log

class ProductController extends Controller
{
    function index(){
        $products=Product::all();
        if($products){
            return response()->json(['data' => $products,200]);
        }else{
           return  response()->json(['data' => "No products"], 404);
        }
    }

    //get
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }
    //post
    public function store(Request $request){
    // Obtener el contenido JSON del cuerpo de la solicitud
    $requestData = $request->json()->all();

    // Verificar si el campo 'name' está presente en los datos de la solicitud
    if (isset($requestData['name'])) {
        // Obtener los datos del producto de la solicitud
        $name = $requestData['name'];
        $price = $requestData['price'];
        $description = $requestData['description'];

        try {
            // Crear un nuevo producto
            $product = new Product();
            $product->name = $name;
            $product->price = $price;
            $product->description = $description;
            $product->save();

            // Devolver una respuesta adecuada
            return response()->json("El producto $name ha sido creado exitosamente.", 201);
        } catch (\Exception $e) {
            // Manejar errores de la base de datos
            Log::error('Error al crear el producto:', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Error al crear el producto: ' . $e->getMessage()], 500);
        }
    } else {
        // Si el campo 'name' no está presente en los datos de la solicitud, responder con un mensaje de error
        return response()->json("El campo 'name' no está presente en la solicitud.", 400);
    }
}
    //put /id
    function update(Request $request, $id){
    // Obtener los datos del producto de la solicitud
    $requestData = $request->json()->all();

    try {
        // Buscar el producto por su ID
        $product = Product::findOrFail($id);

        // Actualizar los datos del producto
        $product->update($requestData);

        // Devolver una respuesta adecuada
        return response()->json("El producto ha sido actualizado correctamente.", 200);
    } catch (\Exception $e) {
        // Manejar errores de la base de datos
        Log::error('Error al actualizar el producto:', ['exception' => $e->getMessage()]);
        return response()->json(['message' => 'Error al actualizar el producto: ' . $e->getMessage()], 500);
    }
}

   //Delete /products/{id}
    function destroy($id){
        try {
            // Buscar el producto por su ID
            $product = Product::find($id);

             // Verificar si el producto existe
            if (!$product) {
            return response()->json(['message' => 'El producto no existe.'], 404);
            }

            // Eliminar el producto
             $product->delete();

            // Devolver una respuesta adecuada
            return response()->json(['message' => 'El producto ha sido eliminado correctamente.'], 200);
        } catch (\Exception $e) {
        // Manejar errores de la base de datos
        Log::error('Error al eliminar el producto:', ['exception' => $e->getMessage()]);
        return response()->json(['message' => 'Error al eliminar el producto: ' . $e->getMessage()], 500);
        }
    }

}
