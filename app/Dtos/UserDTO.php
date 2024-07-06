<?php

namespace App\Dtos;

use Illuminate\Support\Facades\Hash;

class UserDTO extends BaseDTO
{
    private string $name;

    private string $email;

    private string $password;

    private string $role;

    public function __construct(string $name, string $email, string $password, string $role)
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
            $user->role
        );
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            Hash::make($data['password']),
            $data['role']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}
