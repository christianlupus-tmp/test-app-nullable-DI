<?php

namespace OCA\TestNullableDi\Service;

class TransitiveService
{
    public function __construct(
        private InvalidService $invalidService
        )
    {}
}
