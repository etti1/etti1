<?php

namespace App\Service;


use App\Entity\User;
use App\Manager\UserManager;
use App\Model\UserList;
use App\Model\UserListResponse;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Criteria;
use App\DTOBuilder\Type\UserDTOBuilder;
use App\DTO\Type\UserDTO;
use phpDocumentor\Reflection\Types\String_;


class UserCategoryService
{
    public function __construct(
        private UserRepository $userRepository
    )
    {

    }

    public function getUsers(): UserListResponse
    {

    }
}