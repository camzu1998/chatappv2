<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    private User $user;

    public function set(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function get(): User
    {
        return $this->user;
    }

    public function store(array $validated): self
    {
        $user = new User();

        DB::beginTransaction();
        try {
            $user = User::create($validated);
        } catch (Exception $exception) {
            DB::rollBack();
        }
        DB::commit();

        $this->user = $user;

        return $this;
    }

    public function update(array $validated): self
    {
        DB::beginTransaction();
        try {
            $this->user->update($validated);
        } catch (Exception $exception) {
            DB::rollBack();
        }
        DB::commit();

        return $this;
    }
}
