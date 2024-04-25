<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;



class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user):void
    {
        if (!$user instanceof User) {
            return;
        }
        if (!$user->isStatut()) {
            throw new CustomUserMessageAuthenticationException(
                'Votre compte est désactivé'
            );
        }
    }
    public function checkPostAuth(UserInterface $user):void
    {
        $this->checkPreAuth($user);
    }
}