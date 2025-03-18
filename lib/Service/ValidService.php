<?php

namespace OCA\TestNullableDi\Service;

use OCP\IDBConnection;

class ValidService
{
    public function __construct(
        private ?string $userId,
        )
    {}
}
