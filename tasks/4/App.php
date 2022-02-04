<?php

class App
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function renderUsers(Request $request): void
    {
        $response = '';
        $ids = $request->get('user_ids', [1, 2, 3]);

        /** @var User $user */
        foreach ($this->userRepository->loadUsersById($ids) as $user) {
            $response .= "<a href='/show_user.php?id={$user->getId()}'>{$user->getName()}</a>";
        }

        echo $response;
    }
}