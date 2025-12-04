<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams\SpeciesGrouping;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\SpeciesGroupsContract;

final class SpeciesGroupsService implements SpeciesGroupsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of species groups, e.g. terns, finches, etc. #### Notes Merlin puts like birds together, with Falcons next to Hawks, whereas eBird follows taxonomic order.
     *
     * @param SpeciesGrouping|value-of<SpeciesGrouping> $speciesGrouping
     * @param array{groupNameLocale?: string}|SpeciesGroupListParams $params
     *
     * @return list<SpeciesGroupListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        SpeciesGrouping|string $speciesGrouping,
        array|SpeciesGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = SpeciesGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/sppgroup/%1$s', $speciesGrouping],
            query: $parsed,
            options: $options,
            convert: new ListOf(SpeciesGroupListResponseItem::class),
        );
    }
}
