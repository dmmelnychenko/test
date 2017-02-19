<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click;
use App\Models\BadDomain;

class ClickController extends Controller
{
    public function clickHandler(Request $request)
    {
        $guid = hash('md5', $request->ip() . $request->header('User-Agent') . $request->header('referer') . $request->param1);
        $click = $this->getClickByID($guid);
        if($click){
            $click->increment('error');
            $bad_domain = BadDomain::where('name', $request->header('referer'))->first();
            if($bad_domain){
                $click->bad_domain = 1;
            }
            $click->save();
            $page = 'error';
        } else {
            Click::create([
                'id' => $guid,
                'ua' => $request->header('User-Agent'),
                'ip' => $request->ip(),
                'ref' => $request->header('referer'),
                'param1' => $request->param1,
                'param2' => $request->param2,
            ]);
            $page = 'success';
        }

        return redirect("/$page/$guid");
    }

    public function showErrorPage($click_id)
    {
        $click = $this->getClickByID($click_id);
        return view('error')->with(['click' => $click]);
    }

    public function showSuccessPage($click_id)
    {
        $click = $this->getClickByID($click_id);
        return view('success')->with(['click' => $click]);
    }

    private function getClickByID($click_id)
    {
        return Click::find($click_id);
    }
}
