<?php
declare(strict_types=1);

namespace App\Kernel;

/**
 * Class Config
 * @package App\Kernel
 */
final class Config
{
    /**
     * вернуть массив настроек бд
     */
    public static function getDBConfig(): array
    {
        return require __DIR__ . '/../../config/db.php';
    }
}
