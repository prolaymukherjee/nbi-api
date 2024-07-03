<?php

namespace App\Dtos;

use Illuminate\Support\Facades\Hash;

class UserDTO extends BaseDTO
{
    public string $name;

    public string $email;

    public string $password;

    public string $role;

    public function __construct(string $name = '', string $email = '', string $password = '', string $role = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public static function fromModel($user): self
    {
        return new self(
            $user->name,
            $user->email,
            '',
            $user->role,
        );
    }

    public static function fromRequest($authorRequest): self
    {
        return new self(
            $authorRequest['name'],
            $authorRequest['email'],
            Hash::make($authorRequest['password']),
            $authorRequest['role']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];
    }
}
