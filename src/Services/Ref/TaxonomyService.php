<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\ServiceContracts\Ref\TaxonomyContract;
use Phoebe\Services\Ref\Taxonomy\EbirdService;
use Phoebe\Services\Ref\Taxonomy\FormsService;
use Phoebe\Services\Ref\Taxonomy\LocalesService;
use Phoebe\Services\Ref\Taxonomy\SpeciesGroupsService;
use Phoebe\Services\Ref\Taxonomy\VersionsService;

final class TaxonomyService implements TaxonomyContract
{
    /**
     * @api
     */
    public TaxonomyRawService $raw;

    /**
     * @api
     */
    public EbirdService $ebird;

    /**
     * @api
     */
    public FormsService $forms;

    /**
     * @api
     */
    public LocalesService $locales;

    /**
     * @api
     */
    public VersionsService $versions;

    /**
     * @api
     */
    public SpeciesGroupsService $speciesGroups;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TaxonomyRawService($client);
        $this->ebird = new EbirdService($client);
        $this->forms = new FormsService($client);
        $this->locales = new LocalesService($client);
        $this->versions = new VersionsService($client);
        $this->speciesGroups = new SpeciesGroupsService($client);
    }
}
