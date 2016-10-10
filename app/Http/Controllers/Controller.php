<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $items_per_page = 20;

    protected function returnBack($data) {
    	// Zapobiegaj infinite loop
        if(back()->getTargetUrl() === url()->current()) {
            return redirect(route("budget.index"))->with($data);
        }

        return back()->with($data);
    }

}
