<?php

declare(strict_types=1);

namespace Phoebe\Services;

use Phoebe\Client;
use Phoebe\ServiceContracts\ProductContract;
use Phoebe\Services\Product\ChecklistService;
use Phoebe\Services\Product\ListsService;
use Phoebe\Services\Product\SpeciesListService;
use Phoebe\Services\Product\StatsService;
use Phoebe\Services\Product\Top100Service;

final class ProductService implements ProductContract
{
    /**
     * @api
     */
    public ListsService $lists;

    /**
     * @api
     */
    public Top100Service $top100;

    /**
     * @api
     */
    public StatsService $stats;

    /**
     * @api
     */
    public SpeciesListService $speciesList;

    /**
     * @api
     */
    public ChecklistService $checklist;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->lists = new ListsService($client);
        $this->top100 = new Top100Service($client);
        $this->stats = new StatsService($client);
        $this->speciesList = new SpeciesListService($client);
        $this->checklist = new ChecklistService($client);
    }
}
