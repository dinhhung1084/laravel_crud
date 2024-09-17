<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
  public function getAllUsers();
  public function getAllUsersSorted($sort_by, $order);
  public function createUser(array $data);
  public function deleteUser($id);
  public function findUserById($id);
  public function updateUser($id, array $data);
}
