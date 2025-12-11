<?php

declare(strict_types=1);

namespace Phoebe;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Phoebe\Core\BaseClient;
use Phoebe\Core\Util;
use Phoebe\Services\DataService;
use Phoebe\Services\ProductService;
use Phoebe\Services\RefService;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public DataService $data;

    /**
     * @api
     */
    public ProductService $product;

    /**
     * @api
     */
    public RefService $ref;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('EBIRD_API_KEY'));

        $baseUrl ??= getenv('PHOEBE_BASE_URL') ?: 'https://api.ebird.org/v2';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('phoebe/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->data = new DataService($this);
        $this->product = new ProductService($this);
        $this->ref = new RefService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['X-eBirdApiToken' => $this->apiKey] : [];
    }
}
