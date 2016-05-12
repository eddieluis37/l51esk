<?php
namespace App\Modules\Fabricante\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;

class FabricanteController extends Controller
{
    public function methodName()
    {
        $var = 'SomeVar';
        Audit::log(Auth::user()->id, trans('fabricante::general.audit-log.category'), trans('fabricante::general.audit-log.msg-method-name', ['var' => $var]));

        $page_title = trans('fabricante::general.page.method-name.title');
        $page_description = trans('fabricante::general.page.method-name.description');

        return view('fabricante::method_name', compact('page_title', 'page_description'));
    }

}
