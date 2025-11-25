<?php

namespace Phoebe\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Conflict Exception';
}
