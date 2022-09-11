<?php

namespace App\Repository;

use App\Entity\AuthHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthHistoryRepository extends ServiceEntityRepository

{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuthHistory::class);
    }

    /**
     * @param AuthHistory $auth
     * @param bool $flush
     * @return void
     */
    public function add(AuthHistory $auth, bool $flush = false): void
    {
        $this->getEntityManager()->persist($auth);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $this->getEntityManager()->flush();
    }

}
