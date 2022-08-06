<?php

namespace App\DTOBuilder\Type;

use App\Controller\GetUsersController;
use App\Entity\User;
use App\DTO\Type\UserDTO;

class UserDTOBuilder
{
    public  function buildEntity(UserDTO $userDTO): User
    {
        $entity = new User();

        $entity->setName($userDTO->name);
        $entity->setSurname($userDTO->surname);
        $entity->setEmail($userDTO->email);

        return $entity;
    }
}