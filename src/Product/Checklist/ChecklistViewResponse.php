<?php

declare(strict_types=1);

namespace Phoebe\Product\Checklist;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Checklist\ChecklistViewResponse\Loc;
use Phoebe\Product\Checklist\ChecklistViewResponse\Ob;
use Phoebe\Product\Checklist\ChecklistViewResponse\Ob\ObsAux;

/**
 * @phpstan-type ChecklistViewResponseShape = array{
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
final class ChecklistViewResponse implements BaseModel
{
    /** @use SdkModel<ChecklistViewResponseShape> */
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
        $obj = new self;

        null !== $allObsReported && $obj['allObsReported'] = $allObsReported;
        null !== $checklistID && $obj['checklistID'] = $checklistID;
        null !== $creationDt && $obj['creationDt'] = $creationDt;
        null !== $durationHrs && $obj['durationHrs'] = $durationHrs;
        null !== $isoObsDate && $obj['isoObsDate'] = $isoObsDate;
        null !== $lastEditedDt && $obj['lastEditedDt'] = $lastEditedDt;
        null !== $loc && $obj['loc'] = $loc;
        null !== $locID && $obj['locID'] = $locID;
        null !== $numObservers && $obj['numObservers'] = $numObservers;
        null !== $numSpecies && $obj['numSpecies'] = $numSpecies;
        null !== $obs && $obj['obs'] = $obs;
        null !== $obsDt && $obj['obsDt'] = $obsDt;
        null !== $obsTime && $obj['obsTime'] = $obsTime;
        null !== $obsTimeValid && $obj['obsTimeValid'] = $obsTimeValid;
        null !== $projID && $obj['projID'] = $projID;
        null !== $protocolID && $obj['protocolID'] = $protocolID;
        null !== $subID && $obj['subID'] = $subID;
        null !== $submissionMethodCode && $obj['submissionMethodCode'] = $submissionMethodCode;
        null !== $subnational1Code && $obj['subnational1Code'] = $subnational1Code;
        null !== $userDisplayName && $obj['userDisplayName'] = $userDisplayName;

        return $obj;
    }

    public function withAllObsReported(bool $allObsReported): self
    {
        $obj = clone $this;
        $obj['allObsReported'] = $allObsReported;

        return $obj;
    }

    public function withChecklistID(string $checklistID): self
    {
        $obj = clone $this;
        $obj['checklistID'] = $checklistID;

        return $obj;
    }

    public function withCreationDt(string $creationDt): self
    {
        $obj = clone $this;
        $obj['creationDt'] = $creationDt;

        return $obj;
    }

    public function withDurationHrs(float $durationHrs): self
    {
        $obj = clone $this;
        $obj['durationHrs'] = $durationHrs;

        return $obj;
    }

    public function withISOObsDate(string $isoObsDate): self
    {
        $obj = clone $this;
        $obj['isoObsDate'] = $isoObsDate;

        return $obj;
    }

    public function withLastEditedDt(string $lastEditedDt): self
    {
        $obj = clone $this;
        $obj['lastEditedDt'] = $lastEditedDt;

        return $obj;
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
        $obj = clone $this;
        $obj['loc'] = $loc;

        return $obj;
    }

    public function withLocID(string $locID): self
    {
        $obj = clone $this;
        $obj['locID'] = $locID;

        return $obj;
    }

    public function withNumObservers(int $numObservers): self
    {
        $obj = clone $this;
        $obj['numObservers'] = $numObservers;

        return $obj;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $obj = clone $this;
        $obj['numSpecies'] = $numSpecies;

        return $obj;
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
        $obj = clone $this;
        $obj['obs'] = $obs;

        return $obj;
    }

    public function withObsDt(string $obsDt): self
    {
        $obj = clone $this;
        $obj['obsDt'] = $obsDt;

        return $obj;
    }

    public function withObsTime(string $obsTime): self
    {
        $obj = clone $this;
        $obj['obsTime'] = $obsTime;

        return $obj;
    }

    public function withObsTimeValid(bool $obsTimeValid): self
    {
        $obj = clone $this;
        $obj['obsTimeValid'] = $obsTimeValid;

        return $obj;
    }

    public function withProjID(string $projID): self
    {
        $obj = clone $this;
        $obj['projID'] = $projID;

        return $obj;
    }

    public function withProtocolID(string $protocolID): self
    {
        $obj = clone $this;
        $obj['protocolID'] = $protocolID;

        return $obj;
    }

    public function withSubID(string $subID): self
    {
        $obj = clone $this;
        $obj['subID'] = $subID;

        return $obj;
    }

    public function withSubmissionMethodCode(string $submissionMethodCode): self
    {
        $obj = clone $this;
        $obj['submissionMethodCode'] = $submissionMethodCode;

        return $obj;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $obj = clone $this;
        $obj['subnational1Code'] = $subnational1Code;

        return $obj;
    }

    public function withUserDisplayName(string $userDisplayName): self
    {
        $obj = clone $this;
        $obj['userDisplayName'] = $userDisplayName;

        return $obj;
    }
}
