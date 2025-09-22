<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Repositories\Contracts\ContactRepositoryContract;

readonly class ContactCreator
{
    /**
     * @param \App\Repositories\Contracts\ContactRepositoryContract $contactRepository
     */
    public function __construct(private ContactRepositoryContract $contactRepository)
    {
        //
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
