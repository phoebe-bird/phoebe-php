<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\ListGetResponseItem;

use Phoebe\Core\Attributes\Api;
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
 *   locId?: string|null,
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

    #[Api(optional: true)]
    public ?string $countryCode;

    #[Api(optional: true)]
    public ?string $countryName;

    #[Api(optional: true)]
    public ?string $hierarchicalName;

    #[Api(optional: true)]
    public ?bool $isHotspot;

    #[Api(optional: true)]
    public ?float $lat;

    #[Api(optional: true)]
    public ?float $latitude;

    #[Api(optional: true)]
    public ?float $lng;

    #[Api(optional: true)]
    public ?string $locId;

    #[Api(optional: true)]
    public ?string $locName;

    #[Api(optional: true)]
    public ?float $longitude;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $subnational1Code;

    #[Api(optional: true)]
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
        ?string $locId = null,
        ?string $locName = null,
        ?float $longitude = null,
        ?string $name = null,
        ?string $subnational1Code = null,
        ?string $subnational1Name = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $countryName && $obj['countryName'] = $countryName;
        null !== $hierarchicalName && $obj['hierarchicalName'] = $hierarchicalName;
        null !== $isHotspot && $obj['isHotspot'] = $isHotspot;
        null !== $lat && $obj['lat'] = $lat;
        null !== $latitude && $obj['latitude'] = $latitude;
        null !== $lng && $obj['lng'] = $lng;
        null !== $locId && $obj['locId'] = $locId;
        null !== $locName && $obj['locName'] = $locName;
        null !== $longitude && $obj['longitude'] = $longitude;
        null !== $name && $obj['name'] = $name;
        null !== $subnational1Code && $obj['subnational1Code'] = $subnational1Code;
        null !== $subnational1Name && $obj['subnational1Name'] = $subnational1Name;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withCountryName(string $countryName): self
    {
        $obj = clone $this;
        $obj['countryName'] = $countryName;

        return $obj;
    }

    public function withHierarchicalName(string $hierarchicalName): self
    {
        $obj = clone $this;
        $obj['hierarchicalName'] = $hierarchicalName;

        return $obj;
    }

    public function withIsHotspot(bool $isHotspot): self
    {
        $obj = clone $this;
        $obj['isHotspot'] = $isHotspot;

        return $obj;
    }

    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj['lat'] = $lat;

        return $obj;
    }

    public function withLatitude(float $latitude): self
    {
        $obj = clone $this;
        $obj['latitude'] = $latitude;

        return $obj;
    }

    public function withLng(float $lng): self
    {
        $obj = clone $this;
        $obj['lng'] = $lng;

        return $obj;
    }

    public function withLocID(string $locID): self
    {
        $obj = clone $this;
        $obj['locId'] = $locID;

        return $obj;
    }

    public function withLocName(string $locName): self
    {
        $obj = clone $this;
        $obj['locName'] = $locName;

        return $obj;
    }

    public function withLongitude(float $longitude): self
    {
        $obj = clone $this;
        $obj['longitude'] = $longitude;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $obj = clone $this;
        $obj['subnational1Code'] = $subnational1Code;

        return $obj;
    }

    public function withSubnational1Name(string $subnational1Name): self
    {
        $obj = clone $this;
        $obj['subnational1Name'] = $subnational1Name;

        return $obj;
    }
}
