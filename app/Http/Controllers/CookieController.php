<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class CookieController extends Controller
{
    public function store(): Response
    {
        // Force full refresh of the previous route,
        // so the changes to cookie consent are immediate.
        return Inertia::location(redirect()->back()->getTargetUrl());
    }
}
