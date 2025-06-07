<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function template_login()
    {
        return view('templating.template_login'); // Sesuai dengan folder view kamu
    }

    public function master()
    {
        return view('templating.master'); // Sesuai dengan folder view kamu
    }
}
