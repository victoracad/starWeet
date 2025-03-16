<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function loadContent(Request $request)
    {
        $modelName = $request->input('model'); 

        switch ($modelName) {
            case 'login-modal':

                return view('partials.login-modal');
            case 'register-modal':

                return view('partials.register-modal');
            default:

                return view('partials.default-modal');
        }
    }
}
