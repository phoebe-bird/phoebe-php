<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObsAuxShape = array{
 *   auxCode?: string|null,
 *   entryMethodCode?: string|null,
 *   fieldName?: string|null,
 *   obsID?: string|null,
 *   speciesCode?: string|null,
 *   subID?: string|null,
 *   value?: string|null,
 * }
 */
final class ObsAux implements BaseModel
{
    /** @use SdkModel<ObsAuxShape> */
    use SdkModel;

    #[Optional]
    public ?string $auxCode;

    #[Optional]
    public ?string $entryMethodCode;

    #[Optional]
    public ?string $fieldName;

    #[Optional('obsId')]
    public ?string $obsID;

    #[Optional]
    public ?string $speciesCode;

    #[Optional('subId')]
    public ?string $subID;

    #[Optional]
    public ?string $value;

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
        ?string $auxCode = null,
        ?string $entryMethodCode = null,
        ?string $fieldName = null,
        ?string $obsID = null,
        ?string $speciesCode = null,
        ?string $subID = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $auxCode && $obj['auxCode'] = $auxCode;
        null !== $entryMethodCode && $obj['entryMethodCode'] = $entryMethodCode;
        null !== $fieldName && $obj['fieldName'] = $fieldName;
        null !== $obsID && $obj['obsID'] = $obsID;
        null !== $speciesCode && $obj['speciesCode'] = $speciesCode;
        null !== $subID && $obj['subID'] = $subID;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    public function withAuxCode(string $auxCode): self
    {
        $obj = clone $this;
        $obj['auxCode'] = $auxCode;

        return $obj;
    }

    public function withEntryMethodCode(string $entryMethodCode): self
    {
        $obj = clone $this;
        $obj['entryMethodCode'] = $entryMethodCode;

        return $obj;
    }

    public function withFieldName(string $fieldName): self
    {
        $obj = clone $this;
        $obj['fieldName'] = $fieldName;

        return $obj;
    }

    public function withObsID(string $obsID): self
    {
        $obj = clone $this;
        $obj['obsID'] = $obsID;

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
        $obj['subID'] = $subID;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
