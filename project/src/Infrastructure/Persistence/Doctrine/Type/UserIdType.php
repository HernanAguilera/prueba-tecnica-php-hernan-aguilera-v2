<?php

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\ValueObject\UserId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UserIdType extends Type
{
    const NAME = 'user_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'CHAR(36)'; // Almacenar como UUID
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?UserId
    {
        return $value !== null ? new UserId($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value instanceof UserId ? $value->getValue() : (string) $value;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
