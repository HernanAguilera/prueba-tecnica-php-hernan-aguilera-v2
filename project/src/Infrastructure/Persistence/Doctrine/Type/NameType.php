<?php

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\ValueObject\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class NameType extends Type
{
    const NAME = 'name';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(100)'; // Almacenar el nombre como string
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Name
    {
        return $value !== null ? new Name($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value instanceof Name ? $value->getValue() : (string) $value;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
