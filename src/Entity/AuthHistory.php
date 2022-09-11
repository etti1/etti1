<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Controller\LoginController;
use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;
use DateTime;


#[
    ORM\Entity(repositoryClass: AuthHistory::class),
    ORM\HasLifecycleCallbacks,
    ORM\Table(name: 'user_auth_history')
]
class AuthHistory extends Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * @var string identifier of authorization, email
     */
    #[ORM\Column(name: 'identifier', type: 'string', nullable: false)]
    private string $identifier;

    /**
     * @var  DateTime $created
     */
    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: false,)]
    private DateTime $createdAt;

    /**
     * TODO: Разберись как работает
     *
     * @param string $identifier
     * @param DateTime $createdAt
     * @return AuthHistory
     */
    public static function create(string $identifier, DateTime $createdAt): AuthHistory
    {
        $authHistory = new AuthHistory();
        $authHistory->setIdentifier($identifier);
        $authHistory->setCreatedAt($createdAt);


        return $authHistory;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier(string $identifier): static
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
