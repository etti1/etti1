<?php
namespace App\DTOBuilder\Type;

use App\Controller\UserRegistrationController;
use App\DTO\Type\UserRegistrationTypeDTO;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserRegistrationTypeDTOBuilder.
 */
class UserRegistrationTypeDTOBuilder
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }



    public  function buildEntity(UserRegistrationTypeDTO $dto): User
    {
        $entity = new User();

        $entity->setName($dto->name);
        $entity->setSurname($dto->surname);
        $entity->setEmail($dto->email);
        $entity->setPassword($dto->password);
        $entity->setPassword($this->passwordHasher->hashPassword($entity, $entity->getPassword()));

        return $entity;
    }
}