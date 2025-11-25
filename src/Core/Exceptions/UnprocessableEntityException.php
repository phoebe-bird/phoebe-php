<?php

namespace Phoebe\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Unprocessable Entity Exception';
}
