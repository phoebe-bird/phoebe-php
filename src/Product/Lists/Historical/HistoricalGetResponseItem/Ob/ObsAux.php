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
        $self = new self;

        null !== $auxCode && $self['auxCode'] = $auxCode;
        null !== $entryMethodCode && $self['entryMethodCode'] = $entryMethodCode;
        null !== $fieldName && $self['fieldName'] = $fieldName;
        null !== $obsID && $self['obsID'] = $obsID;
        null !== $speciesCode && $self['speciesCode'] = $speciesCode;
        null !== $subID && $self['subID'] = $subID;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withAuxCode(string $auxCode): self
    {
        $self = clone $this;
        $self['auxCode'] = $auxCode;

        return $self;
    }

    public function withEntryMethodCode(string $entryMethodCode): self
    {
        $self = clone $this;
        $self['entryMethodCode'] = $entryMethodCode;

        return $self;
    }

    public function withFieldName(string $fieldName): self
    {
        $self = clone $this;
        $self['fieldName'] = $fieldName;

        return $self;
    }

    public function withObsID(string $obsID): self
    {
        $self = clone $this;
        $self['obsID'] = $obsID;

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

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
