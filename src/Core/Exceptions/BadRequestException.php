<?php

namespace Phoebe\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Bad Request Exception';
}
