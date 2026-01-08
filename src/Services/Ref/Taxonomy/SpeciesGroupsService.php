<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams\SpeciesGrouping;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\SpeciesGroupsContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class SpeciesGroupsService implements SpeciesGroupsContract
{
    /**
     * @api
     */
    public SpeciesGroupsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeciesGroupsRawService($client);
    }

    /**
     * @api
     *
     * Get the list of species groups, e.g. terns, finches, etc. #### Notes Merlin puts like birds together, with Falcons next to Hawks, whereas eBird follows taxonomic order.
     *
     * @param SpeciesGrouping|value-of<SpeciesGrouping> $speciesGrouping the order in which groups are returned
     * @param string $groupNameLocale Locale for species group names. English names are returned for any non-listed locale or any non-translated group name.
     * @param RequestOpts|null $requestOptions
     *
     * @return list<SpeciesGroupListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        SpeciesGrouping|string $speciesGrouping,
        string $groupNameLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['groupNameLocale' => $groupNameLocale]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($speciesGrouping, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
