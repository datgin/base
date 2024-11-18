<?php

namespace App\Services\User;

use App\Repositories\Interfaces\User\UserRepositoryInterface;
use App\Services\Interfaces\User\UserServiceInterface;

class UserService implements UserServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository) {}

    public function paginate()
    {
        $request = request();

        $orderBy = ['id' => 'desc'];
        $relations = [];
        $condition = [
            'search'  => addslashes($request->search),
            'publish' => $request->publish,
            // 'archive' => $request->boolean('archive'),
        ];

        $pageSize = $request->pageSize;

        $data = $this->userRepository->pagination(['*'], $condition, $pageSize, $orderBy, [], $relations);

        return $data;
    }
}
