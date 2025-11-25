<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObsAuxShape = array{
 *   auxCode?: string|null,
 *   entryMethodCode?: string|null,
 *   fieldName?: string|null,
 *   obsId?: string|null,
 *   speciesCode?: string|null,
 *   subId?: string|null,
 *   value?: string|null,
 * }
 */
final class ObsAux implements BaseModel
{
    /** @use SdkModel<ObsAuxShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $auxCode;

    #[Api(optional: true)]
    public ?string $entryMethodCode;

    #[Api(optional: true)]
    public ?string $fieldName;

    #[Api(optional: true)]
    public ?string $obsId;

    #[Api(optional: true)]
    public ?string $speciesCode;

    #[Api(optional: true)]
    public ?string $subId;

    #[Api(optional: true)]
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
        ?string $obsId = null,
        ?string $speciesCode = null,
        ?string $subId = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $auxCode && $obj->auxCode = $auxCode;
        null !== $entryMethodCode && $obj->entryMethodCode = $entryMethodCode;
        null !== $fieldName && $obj->fieldName = $fieldName;
        null !== $obsId && $obj->obsId = $obsId;
        null !== $speciesCode && $obj->speciesCode = $speciesCode;
        null !== $subId && $obj->subId = $subId;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withAuxCode(string $auxCode): self
    {
        $obj = clone $this;
        $obj->auxCode = $auxCode;

        return $obj;
    }

    public function withEntryMethodCode(string $entryMethodCode): self
    {
        $obj = clone $this;
        $obj->entryMethodCode = $entryMethodCode;

        return $obj;
    }

    public function withFieldName(string $fieldName): self
    {
        $obj = clone $this;
        $obj->fieldName = $fieldName;

        return $obj;
    }

    public function withObsID(string $obsID): self
    {
        $obj = clone $this;
        $obj->obsId = $obsID;

        return $obj;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $obj = clone $this;
        $obj->speciesCode = $speciesCode;

        return $obj;
    }

    public function withSubID(string $subID): self
    {
        $obj = clone $this;
        $obj->subId = $subID;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
