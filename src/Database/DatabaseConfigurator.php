<?php
declare(strict_types=1);

namespace App\Database;

/**
 * Class DatabaseConfigurator
 * @package App\Database
 */
final class DatabaseConfigurator
{
    /** @var string  */
    private string $driver;

    /** @var string  */
    private string $host;

    /** @var string  */
    private string $dbname;

    /** @var string  */
    private string $username;

    /** @var string  */
    private string $password;

    /** @var string  */
    private string $charset;

    /** @var array  */
    private array $options;

    /**
     * DatabaseConfigurator constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->driver = $config['driver'];
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->charset = $config['charset'];
        $this->options = $config['options'];
    }

    /**
     * вернуть драйвер бд
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * вернут хост бд
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * вернуть имя бд
     */
    public function getDbName(): string
    {
        return $this->dbname;
    }

    /**
     * вернуть пользователя бд
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * вернуть пароль бд
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * вернуть кодировку бд
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * верунть настройки бд
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
