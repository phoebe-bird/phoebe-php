<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObservationShape = array{
 *   id?: int|null,
 *   comName?: string|null,
 *   firstname?: string|null,
 *   howMany?: int|null,
 *   lastname?: string|null,
 *   lat?: float|null,
 *   lng?: float|null,
 *   locationPrivate?: bool|null,
 *   locId?: string|null,
 *   locName?: string|null,
 *   obsDt?: string|null,
 *   obsReviewed?: bool|null,
 *   obsValid?: bool|null,
 *   sciName?: string|null,
 *   speciesCode?: string|null,
 *   subId?: string|null,
 * }
 */
final class Observation implements BaseModel
{
    /** @use SdkModel<ObservationShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $comName;

    #[Optional]
    public ?string $firstname;

    #[Optional]
    public ?int $howMany;

    #[Optional]
    public ?string $lastname;

    #[Optional]
    public ?float $lat;

    #[Optional]
    public ?float $lng;

    #[Optional]
    public ?bool $locationPrivate;

    #[Optional]
    public ?string $locId;

    #[Optional]
    public ?string $locName;

    #[Optional]
    public ?string $obsDt;

    #[Optional]
    public ?bool $obsReviewed;

    #[Optional]
    public ?bool $obsValid;

    #[Optional]
    public ?string $sciName;

    #[Optional]
    public ?string $speciesCode;

    #[Optional]
    public ?string $subId;

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
        ?int $id = null,
        ?string $comName = null,
        ?string $firstname = null,
        ?int $howMany = null,
        ?string $lastname = null,
        ?float $lat = null,
        ?float $lng = null,
        ?bool $locationPrivate = null,
        ?string $locId = null,
        ?string $locName = null,
        ?string $obsDt = null,
        ?bool $obsReviewed = null,
        ?bool $obsValid = null,
        ?string $sciName = null,
        ?string $speciesCode = null,
        ?string $subId = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $comName && $obj['comName'] = $comName;
        null !== $firstname && $obj['firstname'] = $firstname;
        null !== $howMany && $obj['howMany'] = $howMany;
        null !== $lastname && $obj['lastname'] = $lastname;
        null !== $lat && $obj['lat'] = $lat;
        null !== $lng && $obj['lng'] = $lng;
        null !== $locationPrivate && $obj['locationPrivate'] = $locationPrivate;
        null !== $locId && $obj['locId'] = $locId;
        null !== $locName && $obj['locName'] = $locName;
        null !== $obsDt && $obj['obsDt'] = $obsDt;
        null !== $obsReviewed && $obj['obsReviewed'] = $obsReviewed;
        null !== $obsValid && $obj['obsValid'] = $obsValid;
        null !== $sciName && $obj['sciName'] = $sciName;
        null !== $speciesCode && $obj['speciesCode'] = $speciesCode;
        null !== $subId && $obj['subId'] = $subId;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withComName(string $comName): self
    {
        $obj = clone $this;
        $obj['comName'] = $comName;

        return $obj;
    }

    public function withFirstname(string $firstname): self
    {
        $obj = clone $this;
        $obj['firstname'] = $firstname;

        return $obj;
    }

    public function withHowMany(int $howMany): self
    {
        $obj = clone $this;
        $obj['howMany'] = $howMany;

        return $obj;
    }

    public function withLastname(string $lastname): self
    {
        $obj = clone $this;
        $obj['lastname'] = $lastname;

        return $obj;
    }

    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj['lat'] = $lat;

        return $obj;
    }

    public function withLng(float $lng): self
    {
        $obj = clone $this;
        $obj['lng'] = $lng;

        return $obj;
    }

    public function withLocationPrivate(bool $locationPrivate): self
    {
        $obj = clone $this;
        $obj['locationPrivate'] = $locationPrivate;

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

    public function withObsDt(string $obsDt): self
    {
        $obj = clone $this;
        $obj['obsDt'] = $obsDt;

        return $obj;
    }

    public function withObsReviewed(bool $obsReviewed): self
    {
        $obj = clone $this;
        $obj['obsReviewed'] = $obsReviewed;

        return $obj;
    }

    public function withObsValid(bool $obsValid): self
    {
        $obj = clone $this;
        $obj['obsValid'] = $obsValid;

        return $obj;
    }

    public function withSciName(string $sciName): self
    {
        $obj = clone $this;
        $obj['sciName'] = $sciName;

        return $obj;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $obj = clone $this;
        $obj['speciesCode'] = $speciesCode;

        return $obj;
    }

    public function withSubID(string $subID): self
    {
        $obj = clone $this;
        $obj['subId'] = $subID;

        return $obj;
    }
}
