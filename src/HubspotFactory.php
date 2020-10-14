<?php

namespace Eolica\LaravelHubspot;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use SevenShores\Hubspot\Delay;
use SevenShores\Hubspot\Factory;
use SevenShores\Hubspot\Http\Client;
use SevenShores\Hubspot\RetryMiddlewareFactory;

final class HubspotFactory
{
    public function __invoke(array $config)
    {
        return new Factory([], $this->getClient($config));
    }

    private function getClient(array $config)
    {
        return new Client(
            $config['config'],
            new GuzzleClient(['handler' => $this->buildHandlerStack($config)]),
            Arr::get($config, 'client_options', []),
            Arr::get($config, 'wrap_response', true)
        );
    }

    private function buildHandlerStack(array $config)
    {
        $handlerStack = HandlerStack::create();

        if ($rateLimitConfig = Arr::get($config, 'retry_middleware.rate_limit')) {
            $handlerStack->push(
                RetryMiddlewareFactory::createRateLimitMiddleware(
                    $this->getDelayFunction($rateLimitConfig)
                )
            );
        }

        if ($internalErrorsConfig = Arr::get($config, 'retry_middleware.internal_errors')) {
            $handlerStack->push(
                RetryMiddlewareFactory::createInternalErrorsMiddleware(
                    $this->getDelayFunction($internalErrorsConfig)
                )
            );
        }

        return $handlerStack;
    }

    private function getDelayFunction(string $config)
    {
        [$method, $value] = explode(':', $config);

        switch ($method) {
            case 'linear':
                return Delay::getLinearDelayFunction();
            case 'exponential':
                return Delay::getExponentialDelayFunction((int) $value);
            case 'constant':
            default:
                return Delay::getConstantDelayFunction((int) $value);
        }

        throw new InvalidArgumentException(sprintf('Unsupported delay method [%s].', $method));
    }
}
