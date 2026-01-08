<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Cat;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Detail;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Rank;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\HistoricRawContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class HistoricRawService implements HistoricRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of all taxa seen in a country, region or location on a specific date, with the specific observations determined by the "rank" parameter (defaults to latest observation on the date).
     * #### Notes Responses may be cached for 30 minutes
     *
     * @param int $d Path param:
     * @param array{
     *   regionCode: string,
     *   y: int,
     *   m: int,
     *   cat?: Cat|value-of<Cat>,
     *   detail?: Detail|value-of<Detail>,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   r?: list<string>,
     *   rank?: Rank|value-of<Rank>,
     *   sppLocale?: string,
     * }|HistoricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        int $d,
        array|HistoricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = HistoricListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regionCode = $parsed['regionCode'];
        unset($parsed['regionCode']);
        $y = $parsed['y'];
        unset($parsed['y']);
        $m = $parsed['m'];
        unset($parsed['m']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['data/obs/%1$s/historic/%2$s/%3$s/%4$s', $regionCode, $y, $m, $d],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
