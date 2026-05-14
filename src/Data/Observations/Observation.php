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
 *   locID?: string|null,
 *   locName?: string|null,
 *   obsDt?: string|null,
 *   obsReviewed?: bool|null,
 *   obsValid?: bool|null,
 *   sciName?: string|null,
 *   speciesCode?: string|null,
 *   subID?: string|null,
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

    #[Optional('locId')]
    public ?string $locID;

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

    #[Optional('subId')]
    public ?string $subID;

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
        ?string $locID = null,
        ?string $locName = null,
        ?string $obsDt = null,
        ?bool $obsReviewed = null,
        ?bool $obsValid = null,
        ?string $sciName = null,
        ?string $speciesCode = null,
        ?string $subID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $comName && $self['comName'] = $comName;
        null !== $firstname && $self['firstname'] = $firstname;
        null !== $howMany && $self['howMany'] = $howMany;
        null !== $lastname && $self['lastname'] = $lastname;
        null !== $lat && $self['lat'] = $lat;
        null !== $lng && $self['lng'] = $lng;
        null !== $locationPrivate && $self['locationPrivate'] = $locationPrivate;
        null !== $locID && $self['locID'] = $locID;
        null !== $locName && $self['locName'] = $locName;
        null !== $obsDt && $self['obsDt'] = $obsDt;
        null !== $obsReviewed && $self['obsReviewed'] = $obsReviewed;
        null !== $obsValid && $self['obsValid'] = $obsValid;
        null !== $sciName && $self['sciName'] = $sciName;
        null !== $speciesCode && $self['speciesCode'] = $speciesCode;
        null !== $subID && $self['subID'] = $subID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withComName(string $comName): self
    {
        $self = clone $this;
        $self['comName'] = $comName;

        return $self;
    }

    public function withFirstname(string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    public function withHowMany(int $howMany): self
    {
        $self = clone $this;
        $self['howMany'] = $howMany;

        return $self;
    }

    public function withLastname(string $lastname): self
    {
        $self = clone $this;
        $self['lastname'] = $lastname;

        return $self;
    }

    public function withLat(float $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    public function withLng(float $lng): self
    {
        $self = clone $this;
        $self['lng'] = $lng;

        return $self;
    }

    public function withLocationPrivate(bool $locationPrivate): self
    {
        $self = clone $this;
        $self['locationPrivate'] = $locationPrivate;

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

    public function withObsDt(string $obsDt): self
    {
        $self = clone $this;
        $self['obsDt'] = $obsDt;

        return $self;
    }

    public function withObsReviewed(bool $obsReviewed): self
    {
        $self = clone $this;
        $self['obsReviewed'] = $obsReviewed;

        return $self;
    }

    public function withObsValid(bool $obsValid): self
    {
        $self = clone $this;
        $self['obsValid'] = $obsValid;

        return $self;
    }

    public function withSciName(string $sciName): self
    {
        $self = clone $this;
        $self['sciName'] = $sciName;

        return $self;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $self = clone $this;
        $self['speciesCode'] = $speciesCode;

        return $self;
    }

    public function withSubID(string $subID): self
    {
        $self = clone $this;
        $self['subID'] = $subID;

        return $self;
    }
}
