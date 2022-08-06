<?php

namespace App\DTO\Type;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Clas UserRegistrationTypeDTO.
 */
class UserRegistrationTypeDTO
{
    #[Assert\NotBlank]
    public string $name;

    #[Assert\NotBlank]
    public string $surname;

    #[Assert\Email]
    public string $email;

    #[
        Assert\NotBlank,
        Assert\Length(min: 4, max: 50),
    ]
    public string $password;
}