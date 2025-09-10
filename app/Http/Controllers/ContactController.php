<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Services\Contact\ContactCreator;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function __construct(private readonly ContactCreator $contactCreator)
    {
        //
    }

    /**
     * @return \Inertia\Response
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Contact');
    }

    /**
     * @param \App\Http\Requests\Contact\StoreContactRequest $storeRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContactRequest $storeRequest): RedirectResponse
    {
        $this->contactCreator->create($storeRequest->validated());

        return redirect('contact', Response::HTTP_SEE_OTHER)
            ->with('status', 'Thank you for your message. We will get back to you soon.');
    }
}
