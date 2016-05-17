<?php
namespace App\Modules\Fabricante\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;


use App\Models\Fabricante;

class FabricanteController extends Controller
{
    public function methodName()
    {


        $fabricantes = Fabricante::get();

        return view('fabricante::method_name')->with('fabricantes', $fabricantes);
    }


//Este metodo es muy sencillo puesto que solo va a devolver una vista sin ninguna variable
// ni uso de Eloquent, por lo cual queda de la siguiente manera:+

    public function create()
    {
        return view('fabricante::create');
    }



    public function store(Request $request)
    {
        $fabricante = new fabricante;
        $fabricante->nombre     = $request->input('nombre');
        $fabricante->direccion  = $request->input('direccion');
        $fabricante->telefono   = $request->input('telefono');

        $fabricante->save();

        return redirect()->route('fabricantes.method_name');
    }


    public function destroy($id)
    {
       Fabricante::destroy($id);


        return view('fabricante::method_name')->with('fabricantes', $fabricantes);
    }

}
