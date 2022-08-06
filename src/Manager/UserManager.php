<?php

namespace App\Manager;


use App\Entity\User;
use App\Repository\UserRepository;

/**
 * Class UserManager.
 */
class UserManager
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct
    (
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param User $user
     * @param bool $flush
     * @return User
     */
    public function create(User $user, bool $flush = true): User
    {
        $this->userRepository->add($user, $flush);

        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function update(User $user): User
    {
        $this->userRepository->save();

        return $user;

    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->userRepository->findOneBy(['email' => $email]);
    }

}