<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\ServiceContracts\Ref\RegionContract;
use Phoebe\Services\Ref\Region\AdjacentService;
use Phoebe\Services\Ref\Region\InfoService;
use Phoebe\Services\Ref\Region\ListService;

final class RegionService implements RegionContract
{
    /**
     * @api
     */
    public AdjacentService $adjacent;

    /**
     * @api
     */
    public InfoService $info;

    /**
     * @api
     */
    public ListService $list;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->adjacent = new AdjacentService($client);
        $this->info = new InfoService($client);
        $this->list = new ListService($client);
    }
}
