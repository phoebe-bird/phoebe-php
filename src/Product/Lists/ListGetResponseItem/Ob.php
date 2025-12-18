<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\ListGetResponseItem;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Lists\ListGetResponseItem\Ob\ObsAux;

/**
 * @phpstan-import-type ObsAuxShape from \Phoebe\Product\Lists\ListGetResponseItem\Ob\ObsAux
 *
 * @phpstan-type ObShape = array{
 *   obsAux?: list<ObsAuxShape>|null,
 *   obsDt?: string|null,
 *   obsID?: string|null,
 *   speciesCode?: string|null,
 * }
 */
final class Ob implements BaseModel
{
    /** @use SdkModel<ObShape> */
    use SdkModel;

    /** @var list<ObsAux>|null $obsAux */
    #[Optional(list: ObsAux::class)]
    public ?array $obsAux;

    #[Optional]
    public ?string $obsDt;

    #[Optional('obsId')]
    public ?string $obsID;

    #[Optional]
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
     * @param list<ObsAuxShape>|null $obsAux
     */
    public static function with(
        ?array $obsAux = null,
        ?string $obsDt = null,
        ?string $obsID = null,
        ?string $speciesCode = null,
    ): self {
        $self = new self;

        null !== $obsAux && $self['obsAux'] = $obsAux;
        null !== $obsDt && $self['obsDt'] = $obsDt;
        null !== $obsID && $self['obsID'] = $obsID;
        null !== $speciesCode && $self['speciesCode'] = $speciesCode;

        return $self;
    }

    /**
     * @param list<ObsAuxShape> $obsAux
     */
    public function withObsAux(array $obsAux): self
    {
        $self = clone $this;
        $self['obsAux'] = $obsAux;

        return $self;
    }

    public function withObsDt(string $obsDt): self
    {
        $self = clone $this;
        $self['obsDt'] = $obsDt;

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
}
