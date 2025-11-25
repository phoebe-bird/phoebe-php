<?php

namespace Phoebe\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Rate Limit Exception';
}
