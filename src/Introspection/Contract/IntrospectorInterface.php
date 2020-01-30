<?php

declare(strict_types=1);

namespace EcPhp\CasLib\Introspection\Contract;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface IntrospectorInterface.
 */
interface IntrospectorInterface
{
    public static function detect(ResponseInterface $response): IntrospectionInterface;
}
