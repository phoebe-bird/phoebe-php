<?php

declare(strict_types=1);

namespace Phoebe\Product\Stats;

use Phoebe\Core\Attributes\Required;
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

    #[Required]
    public string $regionCode;

    #[Required]
    public int $y;

    #[Required]
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
        $self = new self;

        $self['regionCode'] = $regionCode;
        $self['y'] = $y;
        $self['m'] = $m;

        return $self;
    }

    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    public function withY(int $y): self
    {
        $self = clone $this;
        $self['y'] = $y;

        return $self;
    }

    public function withM(int $m): self
    {
        $self = clone $this;
        $self['m'] = $m;

        return $self;
    }
}
