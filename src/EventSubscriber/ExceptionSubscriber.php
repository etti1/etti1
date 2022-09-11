<?php

namespace App\EventSubscriber;

use App\Entity\AuthHistory;
use App\Manager\AuthHistoryManager;
use App\Manager\UserManager;
use DateTime;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use App\Entity\User;


class ExceptionSubscriber implements EventSubscriberInterface
{

    public function __construct
    (
        private AuthHistoryManager $authHistoryManager,
        private UserManager $userManager
    )
    {

    }

    #[ArrayShape([LoginSuccessEvent::class => 'string'])]
    public static function getSubscribedEvents()
    {
        return [
            LoginSuccessEvent::class => 'loginSuccess',
        ];
    }

    public function loginSuccess(LoginSuccessEvent $event)
    {

        /** @var User $user */
        $user = $event->getUser();

        $authHistory = AuthHistory::create($user->getEmail(), new DateTime('now'));
        $this->authHistoryManager->create($authHistory);
        $user->increaseAuthorizationCount();
        $this->userManager->update($user);
    }
}
