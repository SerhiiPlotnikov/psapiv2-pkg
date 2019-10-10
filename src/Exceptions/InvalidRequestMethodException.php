<?php
declare(strict_types=1);

namespace Psapiv2\Exceptions;

use Throwable;

class InvalidRequestMethodException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
