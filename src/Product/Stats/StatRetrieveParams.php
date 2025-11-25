<?php

declare(strict_types=1);

namespace Phoebe\Product\Stats;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Get a summary of the number of checklist submitted, species seen and contributors on a given date for a country or region.
 * #### Notes The results are updated every 15 minutes.
 *
 * @see Phoebe\Services\Product\StatsService::retrieve()
 *
 * @phpstan-type StatRetrieveParamsShape = array{
 *   regionCode: string, y: int, m: int
 * }
 */
final class StatRetrieveParams implements BaseModel
{
    /** @use SdkModel<StatRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $regionCode;

    #[Api]
    public int $y;

    #[Api]
    public int $m;

    /**
     * `new StatRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatRetrieveParams::with(regionCode: ..., y: ..., m: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatRetrieveParams)->withRegionCode(...)->withY(...)->withM(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $regionCode, int $y, int $m): self
    {
        $obj = new self;

        $obj->regionCode = $regionCode;
        $obj->y = $y;
        $obj->m = $m;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    public function withY(int $y): self
    {
        $obj = clone $this;
        $obj->y = $y;

        return $obj;
    }

    public function withM(int $m): self
    {
        $obj = clone $this;
        $obj->m = $m;

        return $obj;
    }
}
