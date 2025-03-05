<?php

namespace App\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Types\Type;
use App\Infrastructure\Persistence\Doctrine\Type\UserIdType;
use App\Infrastructure\Persistence\Doctrine\Type\EmailType;
use App\Infrastructure\Persistence\Doctrine\Type\NameType;
use App\Infrastructure\Persistence\Doctrine\Type\PasswordType;

class AddTypes
{
    public static function add(): void
    {
        if (!Type::hasType('user_id')) {
            Type::addType('user_id', UserIdType::class);
        }

        if (!Type::hasType('email')) {
            Type::addType('email', EmailType::class);
        }

        if (!Type::hasType('name')) {
            Type::addType('name', NameType::class);
        }

        if (!Type::hasType('password')) {
            Type::addType('password', PasswordType::class);
        }
    }
}
