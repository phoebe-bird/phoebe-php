<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\ListGetResponseItem;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocShape = array{
 *   countryCode?: string|null,
 *   countryName?: string|null,
 *   hierarchicalName?: string|null,
 *   isHotspot?: bool|null,
 *   lat?: float|null,
 *   latitude?: float|null,
 *   lng?: float|null,
 *   locID?: string|null,
 *   locName?: string|null,
 *   longitude?: float|null,
 *   name?: string|null,
 *   subnational1Code?: string|null,
 *   subnational1Name?: string|null,
 * }
 */
final class Loc implements BaseModel
{
    /** @use SdkModel<LocShape> */
    use SdkModel;

    #[Optional]
    public ?string $countryCode;

    #[Optional]
    public ?string $countryName;

    #[Optional]
    public ?string $hierarchicalName;

    #[Optional]
    public ?bool $isHotspot;

    #[Optional]
    public ?float $lat;

    #[Optional]
    public ?float $latitude;

    #[Optional]
    public ?float $lng;

    #[Optional('locId')]
    public ?string $locID;

    #[Optional]
    public ?string $locName;

    #[Optional]
    public ?float $longitude;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $subnational1Code;

    #[Optional]
    public ?string $subnational1Name;

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
        ?string $countryName = null,
        ?string $hierarchicalName = null,
        ?bool $isHotspot = null,
        ?float $lat = null,
        ?float $latitude = null,
        ?float $lng = null,
        ?string $locID = null,
        ?string $locName = null,
        ?float $longitude = null,
        ?string $name = null,
        ?string $subnational1Code = null,
        ?string $subnational1Name = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryName && $self['countryName'] = $countryName;
        null !== $hierarchicalName && $self['hierarchicalName'] = $hierarchicalName;
        null !== $isHotspot && $self['isHotspot'] = $isHotspot;
        null !== $lat && $self['lat'] = $lat;
        null !== $latitude && $self['latitude'] = $latitude;
        null !== $lng && $self['lng'] = $lng;
        null !== $locID && $self['locID'] = $locID;
        null !== $locName && $self['locName'] = $locName;
        null !== $longitude && $self['longitude'] = $longitude;
        null !== $name && $self['name'] = $name;
        null !== $subnational1Code && $self['subnational1Code'] = $subnational1Code;
        null !== $subnational1Name && $self['subnational1Name'] = $subnational1Name;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCountryName(string $countryName): self
    {
        $self = clone $this;
        $self['countryName'] = $countryName;

        return $self;
    }

    public function withHierarchicalName(string $hierarchicalName): self
    {
        $self = clone $this;
        $self['hierarchicalName'] = $hierarchicalName;

        return $self;
    }

    public function withIsHotspot(bool $isHotspot): self
    {
        $self = clone $this;
        $self['isHotspot'] = $isHotspot;

        return $self;
    }

    public function withLat(float $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

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

    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $self = clone $this;
        $self['subnational1Code'] = $subnational1Code;

        return $self;
    }

    public function withSubnational1Name(string $subnational1Name): self
    {
        $self = clone $this;
        $self['subnational1Name'] = $subnational1Name;

        return $self;
    }
}
