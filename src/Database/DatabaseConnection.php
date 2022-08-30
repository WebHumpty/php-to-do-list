<?php
declare(strict_types=1);

namespace App\Database;

/**
 * Class DatabaseConnection
 * @package App\Database
 */
final class DatabaseConnection
{
    /** @var DatabaseConfigurator  */
    private DatabaseConfigurator $configurator;

    /**
     * DatabaseConnection constructor.
     * @param DatabaseConfigurator $configurator
     */
    public function __construct(DatabaseConfigurator $configurator)
    {
        $this->configurator = $configurator;
    }

    /**
     * вернуть PDO
     */
    public function connect(): \PDO
    {
        try {
            return new \PDO(
                $this->constructDSN(),
                $this->configurator->getUsername(),
                $this->configurator->getPassword(),
                $this->configurator->getOptions()
            );
        } catch (\PDOException $e) {
            throw new \PDOException(
                'Database connection error: ' . $e->getMessage(),
                500
            );
        }
    }

    /**
     * вернуть строку подключения к бд
     */
    private function constructDSN(): string
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->configurator->getDriver(),
            $this->configurator->getHost(),
            $this->configurator->getDbName(),
            $this->configurator->getCharset()
        );
    }
}
