<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Repositories\Eloquent\ContactRepository;

readonly class ContactCreator
{
    public function __construct(private ContactRepository $contactRepository)
    {

    }

    /**
     * @param array $data
     * @return \App\Models\Contact
     */
    public function create(array $data): Contact
    {
        return $this->contactRepository->create([
            ...$data,
            'is_read' => false,
        ]);
    }
}
