<?php
namespace App\Modules\Ticket\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;


use App\Modules\Ticket\Models\Ticket;
use App\User;

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
        return view('ticket::create');
    }


    //Guarda

        public function store(Request $request)
    {

        $request->user()->ticket()->create([

                'name'          => $request->name,
                'text'          => $request->text,
                'description'   => $request->description,


        ]);






        return redirect()->route('ticket.method_name');

        }




}