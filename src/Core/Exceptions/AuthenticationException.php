<?php

namespace Phoebe\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Authentication Exception';
}
