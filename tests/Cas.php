<?php

declare(strict_types=1);

namespace tests\EcPhp\CasLib;

use EcPhp\CasLib\AbstractCas;
use EcPhp\CasLib\Configuration\PropertiesInterface;
use EcPhp\CasLib\Introspection\Contract\IntrospectorInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\LoggerInterface;

class Cas extends AbstractCas
{
    /**
     * @var \EcPhp\CasLib\Cas
     */
    private $cas;

    public function __construct(
        ServerRequestInterface $serverRequest,
        PropertiesInterface $properties,
        ClientInterface $client,
        UriFactoryInterface $uriFactory,
        ResponseFactoryInterface $responseFactory,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        CacheItemPoolInterface $cache,
        LoggerInterface $logger,
        IntrospectorInterface $introspector
    ) {
        parent::__construct(
            $serverRequest,
            $properties,
            $client,
            $uriFactory,
            $responseFactory,
            $requestFactory,
            $streamFactory,
            $cache,
            $logger,
            $introspector
        );

        $this->cas = new \EcPhp\CasLib\Cas(
            $serverRequest,
            $properties,
            $client,
            $uriFactory,
            $responseFactory,
            $requestFactory,
            $streamFactory,
            $cache,
            $logger,
            $introspector
        );
    }

    public function handleProxyCallback(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->handleProxyCallback($parameters, $response);
    }

    public function login(array $parameters = []): ?ResponseInterface
    {
        return $this->cas->login($parameters);
    }

    public function logout(array $parameters = []): ?ResponseInterface
    {
        return $this->cas->logout($parameters);
    }

    public function proxyMode(): bool
    {
        return parent::proxyMode();
    }

    public function requestProxyTicket(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestProxyTicket($parameters, $response);
    }

    public function requestProxyValidate(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestProxyValidate($parameters, $response);
    }

    public function requestServiceValidate(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestServiceValidate($parameters, $response);
    }
}
