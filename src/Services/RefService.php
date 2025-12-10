<?php

declare(strict_types=1);

namespace Phoebe\Services;

use Phoebe\Client;
use Phoebe\ServiceContracts\RefContract;
use Phoebe\Services\Ref\HotspotService;
use Phoebe\Services\Ref\RegionService;
use Phoebe\Services\Ref\TaxonomyService;

final class RefService implements RefContract
{
    /**
     * @api
     */
    public RefRawService $raw;

    /**
     * @api
     */
    public RegionService $region;

    /**
     * @api
     */
    public HotspotService $hotspot;

    /**
     * @api
     */
    public TaxonomyService $taxonomy;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RefRawService($client);
        $this->region = new RegionService($client);
        $this->hotspot = new HotspotService($client);
        $this->taxonomy = new TaxonomyService($client);
    }
}
