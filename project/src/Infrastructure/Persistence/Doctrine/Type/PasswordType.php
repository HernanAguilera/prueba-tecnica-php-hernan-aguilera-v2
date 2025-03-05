<?php

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\ValueObject\Password;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PasswordType extends Type
{
    const NAME = 'password';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(255)'; // Almacenar el hash de la contraseña
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Password
    {
        return $value !== null ? new Password($value, true) : null; // Se pasa `true` para evitar re-hasheo
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value instanceof Password ? $value->getHash() : (string) $value;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
