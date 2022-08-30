<?php
declare(strict_types=1);

namespace App\Database;


use App\Kernel\Config;

/**
 * Class DatabaseFactory
 * @package App\Database
 */
final class DatabaseFactory
{
    /**
     * вернуть PDO
     */
    public static function createPDO(): \PDO
    {
        return (new DatabaseConnection(
            new DatabaseConfigurator(
                Config::getDBConfig()
            )
        ))->connect();
    }
}
