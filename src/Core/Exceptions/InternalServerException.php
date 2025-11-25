<?php

namespace Phoebe\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Internal Server Exception';
}
