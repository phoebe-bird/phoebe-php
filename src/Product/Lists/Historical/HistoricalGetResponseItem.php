<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Loc;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob\ObsAux;

/**
 * @phpstan-type HistoricalGetResponseItemShape = array{
 *   allObsReported?: bool|null,
 *   checklistId?: string|null,
 *   creationDt?: string|null,
 *   durationHrs?: float|null,
 *   isoObsDate?: string|null,
 *   lastEditedDt?: string|null,
 *   loc?: Loc|null,
 *   locId?: string|null,
 *   numObservers?: int|null,
 *   numSpecies?: int|null,
 *   obs?: list<Ob>|null,
 *   obsDt?: string|null,
 *   obsTime?: string|null,
 *   obsTimeValid?: bool|null,
 *   projId?: string|null,
 *   protocolId?: string|null,
 *   subId?: string|null,
 *   submissionMethodCode?: string|null,
 *   subnational1Code?: string|null,
 *   userDisplayName?: string|null,
 * }
 */
final class HistoricalGetResponseItem implements BaseModel
{
    /** @use SdkModel<HistoricalGetResponseItemShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $allObsReported;

    #[Api(optional: true)]
    public ?string $checklistId;

    #[Api(optional: true)]
    public ?string $creationDt;

    #[Api(optional: true)]
    public ?float $durationHrs;

    #[Api(optional: true)]
    public ?string $isoObsDate;

    #[Api(optional: true)]
    public ?string $lastEditedDt;

    #[Api(optional: true)]
    public ?Loc $loc;

    #[Api(optional: true)]
    public ?string $locId;

    #[Api(optional: true)]
    public ?int $numObservers;

    #[Api(optional: true)]
    public ?int $numSpecies;

    /** @var list<Ob>|null $obs */
    #[Api(list: Ob::class, optional: true)]
    public ?array $obs;

    #[Api(optional: true)]
    public ?string $obsDt;

    #[Api(optional: true)]
    public ?string $obsTime;

    #[Api(optional: true)]
    public ?bool $obsTimeValid;

    #[Api(optional: true)]
    public ?string $projId;

    #[Api(optional: true)]
    public ?string $protocolId;

    #[Api(optional: true)]
    public ?string $subId;

    #[Api(optional: true)]
    public ?string $submissionMethodCode;

    #[Api(optional: true)]
    public ?string $subnational1Code;

    #[Api(optional: true)]
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
     *   locId?: string|null,
     *   locName?: string|null,
     *   longitude?: float|null,
     *   name?: string|null,
     *   subnational1Code?: string|null,
     *   subnational1Name?: string|null,
     * } $loc
     * @param list<Ob|array{
     *   obsAux?: list<ObsAux>|null,
     *   obsDt?: string|null,
     *   obsId?: string|null,
     *   speciesCode?: string|null,
     * }> $obs
     */
    public static function with(
        ?bool $allObsReported = null,
        ?string $checklistId = null,
        ?string $creationDt = null,
        ?float $durationHrs = null,
        ?string $isoObsDate = null,
        ?string $lastEditedDt = null,
        Loc|array|null $loc = null,
        ?string $locId = null,
        ?int $numObservers = null,
        ?int $numSpecies = null,
        ?array $obs = null,
        ?string $obsDt = null,
        ?string $obsTime = null,
        ?bool $obsTimeValid = null,
        ?string $projId = null,
        ?string $protocolId = null,
        ?string $subId = null,
        ?string $submissionMethodCode = null,
        ?string $subnational1Code = null,
        ?string $userDisplayName = null,
    ): self {
        $obj = new self;

        null !== $allObsReported && $obj['allObsReported'] = $allObsReported;
        null !== $checklistId && $obj['checklistId'] = $checklistId;
        null !== $creationDt && $obj['creationDt'] = $creationDt;
        null !== $durationHrs && $obj['durationHrs'] = $durationHrs;
        null !== $isoObsDate && $obj['isoObsDate'] = $isoObsDate;
        null !== $lastEditedDt && $obj['lastEditedDt'] = $lastEditedDt;
        null !== $loc && $obj['loc'] = $loc;
        null !== $locId && $obj['locId'] = $locId;
        null !== $numObservers && $obj['numObservers'] = $numObservers;
        null !== $numSpecies && $obj['numSpecies'] = $numSpecies;
        null !== $obs && $obj['obs'] = $obs;
        null !== $obsDt && $obj['obsDt'] = $obsDt;
        null !== $obsTime && $obj['obsTime'] = $obsTime;
        null !== $obsTimeValid && $obj['obsTimeValid'] = $obsTimeValid;
        null !== $projId && $obj['projId'] = $projId;
        null !== $protocolId && $obj['protocolId'] = $protocolId;
        null !== $subId && $obj['subId'] = $subId;
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
        $obj['checklistId'] = $checklistID;

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
     *   locId?: string|null,
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
        $obj['locId'] = $locID;

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
     *   obsId?: string|null,
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
        $obj['projId'] = $projID;

        return $obj;
    }

    public function withProtocolID(string $protocolID): self
    {
        $obj = clone $this;
        $obj['protocolId'] = $protocolID;

        return $obj;
    }

    public function withSubID(string $subID): self
    {
        $obj = clone $this;
        $obj['subId'] = $subID;

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
