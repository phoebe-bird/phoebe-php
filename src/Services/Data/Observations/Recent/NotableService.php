<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams\Detail;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\NotableContract;

final class NotableService implements NotableContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of recent, notable observations (up to 30 days ago) of birds seen in a country, region or location. Notable observations can be for locally or nationally rare species or are otherwise unusual, e.g. over-wintering birds in a species which is normally only a summer visitor.
     *
     * @param array{
     *   back?: int,
     *   detail?: 'simple'|'full'|Detail,
     *   hotspot?: bool,
     *   maxResults?: int,
     *   r?: list<string>,
     *   sppLocale?: string,
     * }|NotableListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|NotableListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = NotableListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<Observation>> */
        $response = $this->client->request(
            method: 'get',
            path: ['data/obs/%1$s/recent/notable', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );

        return $response->parse();
    }
}
