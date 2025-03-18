<?php

namespace OCA\TestNullableDi\Service;

use OCP\IDBConnection;

class InvalidService
{
    public function __construct(
        private string $userId,
        // private string $unknownArgument,
        )
    {}
}
