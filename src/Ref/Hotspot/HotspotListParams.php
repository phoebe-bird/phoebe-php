<?php

declare(strict_types=1);

namespace Phoebe\Ref\Hotspot;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Hotspot\HotspotListParams\Fmt;

/**
 * Hotspots in a region.
 *
 * @see Phoebe\Services\Ref\HotspotService::list()
 *
 * @phpstan-type HotspotListParamsShape = array{
 *   back?: int|null, fmt?: null|Fmt|value-of<Fmt>
 * }
 */
final class HotspotListParams implements BaseModel
{
    /** @use SdkModel<HotspotListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of days back to fetch hotspots.
     */
    #[Optional]
    public ?int $back;

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @var value-of<Fmt>|null $fmt
     */
    #[Optional(enum: Fmt::class)]
    public ?string $fmt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fmt|value-of<Fmt>|null $fmt
     */
    public static function with(?int $back = null, Fmt|string|null $fmt = null): self
    {
        $self = new self;

        null !== $back && $self['back'] = $back;
        null !== $fmt && $self['fmt'] = $fmt;

        return $self;
    }

    /**
     * The number of days back to fetch hotspots.
     */
    public function withBack(int $back): self
    {
        $self = clone $this;
        $self['back'] = $back;

        return $self;
    }

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @param Fmt|value-of<Fmt> $fmt
     */
    public function withFmt(Fmt|string $fmt): self
    {
        $self = clone $this;
        $self['fmt'] = $fmt;

        return $self;
    }
}
