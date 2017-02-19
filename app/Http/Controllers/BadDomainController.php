<?php

namespace App\Http\Controllers;

use App\Models\BadDomain;
use Illuminate\Http\Request;

class BadDomainController extends Controller
{
    public function showDomainsManagementPage()
    {
        $domains = BadDomain::all();
        return view('domains_management')->with(['domains' => $domains]);
    }

    public function create(Request $request)
    {
        $domain = BadDomain::create([
            'name' => $request->name
        ]);

        $response = $domain ? $domain : 'error';

        return $response;
    }

    public function delete($domain_id)
    {
        $domain = BadDomain::find($domain_id);
        if($domain){
            $domain->delete();
            $response = 'ok';
        } else {
            $response = 'error';
        }

        return $response;
    }
}
