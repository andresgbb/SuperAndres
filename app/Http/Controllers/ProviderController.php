<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    function index(){
        $products=Provider::all();
        if($products){
            return response()->json(['data' => $products,200]);
        }else{
           return  response()->json(['data' => "No Providers"], 404);
        }
    }
    public function show($id)
    {
        $product = Provider::find($id);
        if (!$product) {
            return response()->json(['error' => 'Provider no encontrado'], 404);
        }
        return response()->json($product);
    }
    public function store(Request $request){
        // Obtener el contenido JSON del cuerpo de la solicitud
        $requestData = $request->json()->all();

        // Verificar si el campo 'name' está presente en los datos de la solicitud
        if (isset($requestData['name'])) {
            // Obtener los datos del proveedor de la solicitud
             $name = $requestData['name'];
            $email = $requestData['email'];
            $phone = $requestData['phone'];

            try {
            // Crear un nuevo proveedor
                 $provider = new Provider();
                $provider->name = $name;
                $provider->email = $email;
                $provider->phone = $phone;
                $provider->save();

                // Devolver una respuesta adecuada
                return response()->json("El proveedor $name ha sido creado exitosamente.", 201);
            } catch (\Exception $e) {
            // Manejar errores de la base de datos
            return response()->json(['message' => 'Error al crear el proveedor: ' . $e->getMessage()], 500);
            }
        }
    }
    function update(Request $request, $id){
    // Obtener los datos del proveedor de la solicitud
        $requestData = $request->json()->all();

        try {
            // Buscar el proveedor por su ID
            $provider = Provider::findOrFail($id);

            // Actualizar los datos del proveedor
            $provider->update($requestData);

            // Devolver una respuesta adecuada
            return response()->json("El proveedor ha sido actualizado correctamente.", 200);
        } catch (\Exception $e) {
            // Manejar errores de la base de datos
            return response()->json(['message' => 'Error al actualizar el proveedor: ' . $e->getMessage()], 500);
        }
    }
    function destroy($id){
        try {
            $provider = Provider::find($id);
            if (!$provider) {
             return response()->json(['message' => 'El proveedor no existe.'], 404);
             }
            $provider->delete();
            return response()->json(['message' => 'El proveedor ha sido eliminado correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el proveedor: ' . $e->getMessage()], 500);
        }
    }

}
