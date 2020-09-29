<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected function getItemsPerPage()
    {
        return 20;
    }

    protected function returnBack($data)
    {
        // Zapobiegaj infinite loop
        if (back()->getTargetUrl() === url()->current()) {
            return redirect(route('budget.index'))->with($data);
        }

        return back()->with($data);
    }

    public function changeLanguage($language)
    {
        return back()->withCookie(cookie()->forever('lang2', $language));
    }
}
