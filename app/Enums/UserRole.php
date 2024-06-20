<?php

namespace App\Enums;

enum UserRole: string
{
    case Gamer = 'gamer';
    case Judge = 'judge';
    case Admin = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Gamer => 'Gamer',
            self::Judge => 'Judge',
            self::Admin => 'Administrator',
        };
    }
}
