<?php
namespace App\DTO\Type;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Clas UserRegistrationTypeDTO.
 */
class UserDTO
{
    #[Assert\NotBlank]
    public string $name;

    #[Assert\NotBlank]
    public string $surname;

    #[Assert\Email]
    public string $email;

}