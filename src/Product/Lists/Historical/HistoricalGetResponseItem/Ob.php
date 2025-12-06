<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem\Ob\ObsAux;

/**
 * @phpstan-type ObShape = array{
 *   obsAux?: list<ObsAux>|null,
 *   obsDt?: string|null,
 *   obsId?: string|null,
 *   speciesCode?: string|null,
 * }
 */
final class Ob implements BaseModel
{
    /** @use SdkModel<ObShape> */
    use SdkModel;

    /** @var list<ObsAux>|null $obsAux */
    #[Api(list: ObsAux::class, optional: true)]
    public ?array $obsAux;

    #[Api(optional: true)]
    public ?string $obsDt;

    #[Api(optional: true)]
    public ?string $obsId;

    #[Api(optional: true)]
    public ?string $speciesCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ObsAux|array{
     *   auxCode?: string|null,
     *   entryMethodCode?: string|null,
     *   fieldName?: string|null,
     *   obsId?: string|null,
     *   speciesCode?: string|null,
     *   subId?: string|null,
     *   value?: string|null,
     * }> $obsAux
     */
    public static function with(
        ?array $obsAux = null,
        ?string $obsDt = null,
        ?string $obsId = null,
        ?string $speciesCode = null,
    ): self {
        $obj = new self;

        null !== $obsAux && $obj['obsAux'] = $obsAux;
        null !== $obsDt && $obj['obsDt'] = $obsDt;
        null !== $obsId && $obj['obsId'] = $obsId;
        null !== $speciesCode && $obj['speciesCode'] = $speciesCode;

        return $obj;
    }

    /**
     * @param list<ObsAux|array{
     *   auxCode?: string|null,
     *   entryMethodCode?: string|null,
     *   fieldName?: string|null,
     *   obsId?: string|null,
     *   speciesCode?: string|null,
     *   subId?: string|null,
     *   value?: string|null,
     * }> $obsAux
     */
    public function withObsAux(array $obsAux): self
    {
        $obj = clone $this;
        $obj['obsAux'] = $obsAux;

        return $obj;
    }

    public function withObsDt(string $obsDt): self
    {
        $obj = clone $this;
        $obj['obsDt'] = $obsDt;

        return $obj;
    }

    public function withObsID(string $obsID): self
    {
        $obj = clone $this;
        $obj['obsId'] = $obsID;

        return $obj;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $obj = clone $this;
        $obj['speciesCode'] = $speciesCode;

        return $obj;
    }
}
