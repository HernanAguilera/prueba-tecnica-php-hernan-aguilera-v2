<?php

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\ValueObject\Email;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class EmailType extends Type
{
    const NAME = 'email';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(255)'; // Almacenamos el email como string en la BD
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Email
    {
        return $value !== null ? new Email($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value instanceof Email ? $value->getValue() : (string) $value;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
