<?php

class UserFactory
{
    public static function fromDBRaw(array $raw): User
    {
        return new User(
            id: $raw['id'],
            name: $raw['name'],
        );
    }
}