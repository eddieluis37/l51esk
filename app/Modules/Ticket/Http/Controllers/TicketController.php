<?php
namespace App\Modules\Ticket\Http\Controllers;

use App\Http\Requests;
use App\Modules\Ticket\Http\Requests\CreateTicketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;


use App\Modules\Ticket\Models\Ticket;
use App\Modules\Ticket\Models\Importance;


class TicketController extends Controller
{
    public function methodName()
    {

        $tickets = Ticket::get();

        return view('ticket::method_name')->with('tickets', $tickets);
    }


    //Este metodo es muy sencillo puesto que solo va a devolver una vista sin ninguna variable
    // ni uso de Eloquent, por lo cual queda de la siguiente manera:+

    public function create()
    {
        $importances = \DB::table('importances')->lists('name', 'id');
        return view('ticket::create')->with('importances', $importances);
    }


    //Guarda

        public function store(CreateTicketRequest $request)
    {

        $request->user()->importance()->ticket()->create([

                'name'          => $request->name,
                'text'          => $request->text,
                'description'   => $request->description,


        ]);




        return redirect()->route('ticket.method_name');

        }




}