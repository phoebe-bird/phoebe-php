<?php

namespace Phoebe\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Phoebe Not Found Exception';
}
