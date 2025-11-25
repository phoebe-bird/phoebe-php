<?php

namespace Phoebe\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Permission Denied Exception';
}
