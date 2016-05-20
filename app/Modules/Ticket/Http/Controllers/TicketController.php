<?php
namespace App\Modules\Ticket\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;


use App\Modules\Ticket\Models\Ticket;


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


    public function store(Request $request)
    {
        $ticket = new ticket;
        $ticket->name          = $request->input('name');
        $ticket->text          = $request->input('text');
        $ticket->description   = $request->input('description');

        $ticket->save();

        return redirect()->route('ticket.method_name');
    }




}
