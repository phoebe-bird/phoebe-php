<?php

declare(strict_types=1);

namespace Phoebe\Ref\Hotspot;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type HotspotListResponseItemShape = array{
 *   countryCode?: string|null,
 *   lat?: float|null,
 *   latestObsDt?: string|null,
 *   lng?: float|null,
 *   locID?: string|null,
 *   locName?: string|null,
 *   numSpeciesAllTime?: int|null,
 *   subnational1Code?: string|null,
 *   subnational2Code?: string|null,
 * }
 */
final class HotspotListResponseItem implements BaseModel
{
    /** @use SdkModel<HotspotListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $countryCode;

    #[Optional]
    public ?float $lat;

    #[Optional]
    public ?string $latestObsDt;

    #[Optional]
    public ?float $lng;

    #[Optional('locId')]
    public ?string $locID;

    #[Optional]
    public ?string $locName;

    #[Optional]
    public ?int $numSpeciesAllTime;

    #[Optional]
    public ?string $subnational1Code;

    #[Optional]
    public ?string $subnational2Code;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $countryCode = null,
        ?float $lat = null,
        ?string $latestObsDt = null,
        ?float $lng = null,
        ?string $locID = null,
        ?string $locName = null,
        ?int $numSpeciesAllTime = null,
        ?string $subnational1Code = null,
        ?string $subnational2Code = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $lat && $self['lat'] = $lat;
        null !== $latestObsDt && $self['latestObsDt'] = $latestObsDt;
        null !== $lng && $self['lng'] = $lng;
        null !== $locID && $self['locID'] = $locID;
        null !== $locName && $self['locName'] = $locName;
        null !== $numSpeciesAllTime && $self['numSpeciesAllTime'] = $numSpeciesAllTime;
        null !== $subnational1Code && $self['subnational1Code'] = $subnational1Code;
        null !== $subnational2Code && $self['subnational2Code'] = $subnational2Code;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withLat(float $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    public function withLatestObsDt(string $latestObsDt): self
    {
        $self = clone $this;
        $self['latestObsDt'] = $latestObsDt;

        return $self;
    }

    public function withLng(float $lng): self
    {
        $self = clone $this;
        $self['lng'] = $lng;

        return $self;
    }

    public function withLocID(string $locID): self
    {
        $self = clone $this;
        $self['locID'] = $locID;

        return $self;
    }

    public function withLocName(string $locName): self
    {
        $self = clone $this;
        $self['locName'] = $locName;

        return $self;
    }

    public function withNumSpeciesAllTime(int $numSpeciesAllTime): self
    {
        $self = clone $this;
        $self['numSpeciesAllTime'] = $numSpeciesAllTime;

        return $self;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $self = clone $this;
        $self['subnational1Code'] = $subnational1Code;

        return $self;
    }

    public function withSubnational2Code(string $subnational2Code): self
    {
        $self = clone $this;
        $self['subnational2Code'] = $subnational2Code;

        return $self;
    }
}
