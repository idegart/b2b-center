<?php

class UserRepository
{
    public function __construct(
        private DB $db,
    )
    {
    }

    public function loadUsersById(array $ids): Generator
    {
        $in = str_repeat('?,', count($ids) - 1) . '?';

        $query = "select * from users where id in ({$in})";

        foreach($this->db->select($query, $ids) as $dbRaw) {
            yield UserFactory::fromDBRaw($dbRaw);
        }
    }
}