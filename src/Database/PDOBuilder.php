<?php
declare(strict_types=1);

namespace App\Database;

/**
 * Class PDOBuilder
 * @package App\Database
 */
class PDOBuilder
{
    /** @var PDOBuilder|null  */
    private static ?PDOBuilder $instance = null;

    /** @var \PDO  */
    private \PDO $dbh;

    /** @var \PDOStatement|null  */
    private ?\PDOStatement $sth = null;

    /**
     * PDOBuilder constructor.
     */
    private function __construct()
    {
        $this->dbh = DatabaseFactory::createPDO();
    }

    /**
     * вернуть количество строк, затронутых последним SQL-запросом
     */
    public static function getInstance(): PDOBuilder
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * выполнить запрос, вернуть кол-во строк затронутых запросом
     */
    public function exec(string $query): int
    {
        return $this->dbh->exec($query);
    }

    /**
     * подготовить запрос на выполнение, вернуть объект
     */
    public function prepare(string $query): self
    {
        $this->sth = $this->dbh->prepare($query);

        return $this;
    }

    /**
     * запустить запрос на выполнение, вернуть объект
     */
    public function execute(array $binds = []): self
    {
        $this->sth->execute($binds);

        return $this;
    }

    /**
     * вернуть результат запроса
     */
    public function fetch(): ?array
    {
        $result = $this->sth->fetch();
        $this->sth = null;

        return ($result !== false) ? $result : [];
    }

    /**
     * вернуть результат запроса
     */
    public function fetchAll(): ?array
    {
        $result = $this->sth->fetchAll();
        $this->sth = null;

        return ($result !== false) ? $result : [];
    }

    /**
     * вернуть ID вставленной строки
     */
    public function lastInsertId(): int
    {
        return (int)$this->dbh->lastInsertId();
    }

    /**
     * вернуть количество строк, затронутых последним SQL-запросом
     */
    public function rowCount(): int
    {
        $result = $this->sth->rowCount();
        $this->sth = null;

        return (int)$result;
    }
}
