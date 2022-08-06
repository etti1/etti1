<?php

namespace App\Model;

class UserListResponse
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getUser(): array
    {
        return $this->items;
    }
}