<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Loc;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob\ObsAux;

/**
 * @phpstan-type HistoricalGetResponseItemShape = array{
 *   allObsReported?: bool|null,
 *   checklistID?: string|null,
 *   creationDt?: string|null,
 *   durationHrs?: float|null,
 *   isoObsDate?: string|null,
 *   lastEditedDt?: string|null,
 *   loc?: Loc|null,
 *   locID?: string|null,
 *   numObservers?: int|null,
 *   numSpecies?: int|null,
 *   obs?: list<Ob>|null,
 *   obsDt?: string|null,
 *   obsTime?: string|null,
 *   obsTimeValid?: bool|null,
 *   projID?: string|null,
 *   protocolID?: string|null,
 *   subID?: string|null,
 *   submissionMethodCode?: string|null,
 *   subnational1Code?: string|null,
 *   userDisplayName?: string|null,
 * }
 */
final class HistoricalGetResponseItem implements BaseModel
{
    /** @use SdkModel<HistoricalGetResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?bool $allObsReported;

    #[Optional('checklistId')]
    public ?string $checklistID;

    #[Optional]
    public ?string $creationDt;

    #[Optional]
    public ?float $durationHrs;

    #[Optional]
    public ?string $isoObsDate;

    #[Optional]
    public ?string $lastEditedDt;

    #[Optional]
    public ?Loc $loc;

    #[Optional('locId')]
    public ?string $locID;

    #[Optional]
    public ?int $numObservers;

    #[Optional]
    public ?int $numSpecies;

    /** @var list<Ob>|null $obs */
    #[Optional(list: Ob::class)]
    public ?array $obs;

    #[Optional]
    public ?string $obsDt;

    #[Optional]
    public ?string $obsTime;

    #[Optional]
    public ?bool $obsTimeValid;

    #[Optional('projId')]
    public ?string $projID;

    #[Optional('protocolId')]
    public ?string $protocolID;

    #[Optional('subId')]
    public ?string $subID;

    #[Optional]
    public ?string $submissionMethodCode;

    #[Optional]
    public ?string $subnational1Code;

    #[Optional]
    public ?string $userDisplayName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Loc|array{
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
     * } $loc
     * @param list<Ob|array{
     *   obsAux?: list<ObsAux>|null,
     *   obsDt?: string|null,
     *   obsID?: string|null,
     *   speciesCode?: string|null,
     * }> $obs
     */
    public static function with(
        ?bool $allObsReported = null,
        ?string $checklistID = null,
        ?string $creationDt = null,
        ?float $durationHrs = null,
        ?string $isoObsDate = null,
        ?string $lastEditedDt = null,
        Loc|array|null $loc = null,
        ?string $locID = null,
        ?int $numObservers = null,
        ?int $numSpecies = null,
        ?array $obs = null,
        ?string $obsDt = null,
        ?string $obsTime = null,
        ?bool $obsTimeValid = null,
        ?string $projID = null,
        ?string $protocolID = null,
        ?string $subID = null,
        ?string $submissionMethodCode = null,
        ?string $subnational1Code = null,
        ?string $userDisplayName = null,
    ): self {
        $self = new self;

        null !== $allObsReported && $self['allObsReported'] = $allObsReported;
        null !== $checklistID && $self['checklistID'] = $checklistID;
        null !== $creationDt && $self['creationDt'] = $creationDt;
        null !== $durationHrs && $self['durationHrs'] = $durationHrs;
        null !== $isoObsDate && $self['isoObsDate'] = $isoObsDate;
        null !== $lastEditedDt && $self['lastEditedDt'] = $lastEditedDt;
        null !== $loc && $self['loc'] = $loc;
        null !== $locID && $self['locID'] = $locID;
        null !== $numObservers && $self['numObservers'] = $numObservers;
        null !== $numSpecies && $self['numSpecies'] = $numSpecies;
        null !== $obs && $self['obs'] = $obs;
        null !== $obsDt && $self['obsDt'] = $obsDt;
        null !== $obsTime && $self['obsTime'] = $obsTime;
        null !== $obsTimeValid && $self['obsTimeValid'] = $obsTimeValid;
        null !== $projID && $self['projID'] = $projID;
        null !== $protocolID && $self['protocolID'] = $protocolID;
        null !== $subID && $self['subID'] = $subID;
        null !== $submissionMethodCode && $self['submissionMethodCode'] = $submissionMethodCode;
        null !== $subnational1Code && $self['subnational1Code'] = $subnational1Code;
        null !== $userDisplayName && $self['userDisplayName'] = $userDisplayName;

        return $self;
    }

    public function withAllObsReported(bool $allObsReported): self
    {
        $self = clone $this;
        $self['allObsReported'] = $allObsReported;

        return $self;
    }

    public function withChecklistID(string $checklistID): self
    {
        $self = clone $this;
        $self['checklistID'] = $checklistID;

        return $self;
    }

    public function withCreationDt(string $creationDt): self
    {
        $self = clone $this;
        $self['creationDt'] = $creationDt;

        return $self;
    }

    public function withDurationHrs(float $durationHrs): self
    {
        $self = clone $this;
        $self['durationHrs'] = $durationHrs;

        return $self;
    }

    public function withISOObsDate(string $isoObsDate): self
    {
        $self = clone $this;
        $self['isoObsDate'] = $isoObsDate;

        return $self;
    }

    public function withLastEditedDt(string $lastEditedDt): self
    {
        $self = clone $this;
        $self['lastEditedDt'] = $lastEditedDt;

        return $self;
    }

    /**
     * @param Loc|array{
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
     * } $loc
     */
    public function withLoc(Loc|array $loc): self
    {
        $self = clone $this;
        $self['loc'] = $loc;

        return $self;
    }

    public function withLocID(string $locID): self
    {
        $self = clone $this;
        $self['locID'] = $locID;

        return $self;
    }

    public function withNumObservers(int $numObservers): self
    {
        $self = clone $this;
        $self['numObservers'] = $numObservers;

        return $self;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $self = clone $this;
        $self['numSpecies'] = $numSpecies;

        return $self;
    }

    /**
     * @param list<Ob|array{
     *   obsAux?: list<ObsAux>|null,
     *   obsDt?: string|null,
     *   obsID?: string|null,
     *   speciesCode?: string|null,
     * }> $obs
     */
    public function withObs(array $obs): self
    {
        $self = clone $this;
        $self['obs'] = $obs;

        return $self;
    }

    public function withObsDt(string $obsDt): self
    {
        $self = clone $this;
        $self['obsDt'] = $obsDt;

        return $self;
    }

    public function withObsTime(string $obsTime): self
    {
        $self = clone $this;
        $self['obsTime'] = $obsTime;

        return $self;
    }

    public function withObsTimeValid(bool $obsTimeValid): self
    {
        $self = clone $this;
        $self['obsTimeValid'] = $obsTimeValid;

        return $self;
    }

    public function withProjID(string $projID): self
    {
        $self = clone $this;
        $self['projID'] = $projID;

        return $self;
    }

    public function withProtocolID(string $protocolID): self
    {
        $self = clone $this;
        $self['protocolID'] = $protocolID;

        return $self;
    }

    public function withSubID(string $subID): self
    {
        $self = clone $this;
        $self['subID'] = $subID;

        return $self;
    }

    public function withSubmissionMethodCode(string $submissionMethodCode): self
    {
        $self = clone $this;
        $self['submissionMethodCode'] = $submissionMethodCode;

        return $self;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $self = clone $this;
        $self['subnational1Code'] = $subnational1Code;

        return $self;
    }

    public function withUserDisplayName(string $userDisplayName): self
    {
        $self = clone $this;
        $self['userDisplayName'] = $userDisplayName;

        return $self;
    }
}
