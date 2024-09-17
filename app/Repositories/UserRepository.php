<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsersSorted($sort_by, $order)
    {
        return User::orderBy($sort_by, $order)->paginate(10);
    }

    public function getAllUsers()
    {
        return User::paginate(10);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }

    public function findUserById($id)
    {
        return User::find($id);
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
        }
        return $user;
    }
}
