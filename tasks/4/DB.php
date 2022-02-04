<?php

class DB
{
    public function __construct(
        private PDO $connection
    )
    {
    }

    public function select(string $query, array $bindings): Generator
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($bindings);

        while ($raw = $statement->fetch(PDO::FETCH_ASSOC)) {
            yield $raw;
        }
    }
}