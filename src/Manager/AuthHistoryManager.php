<?php

namespace App\Manager;

use App\Repository\AuthHistoryRepository;
use App\Entity\AuthHistory;
class AuthHistoryManager
{
    /**
     * @param AuthHistoryRepository
     */
    public function __construct
    (
        private AuthHistoryRepository $authHistoryRepository
    )
    {
    }

        /**
         * @param AuthHistory $authHistory
         * @return AuthHistory
         */
        public function create(AuthHistory $authHistory): AuthHistory
    {
        $this->authHistoryRepository->add($authHistory);

        return $authHistory;
    }


}