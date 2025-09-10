<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactRepository extends AbstractRepository implements ContactRepositoryContract
{
    /**
     * @param \App\Models\Contact $contact
     */
    public function __construct(private readonly Contact $contact)
    {
        $this->model = $contact;
    }
}
