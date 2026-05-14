<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams\SortKey;

/**
 * Get information on the checklists submitted on a given date for a country or region.
 *
 * @see Phoebe\Services\Product\Lists\HistoricalService::retrieve()
 *
 * @phpstan-type HistoricalRetrieveParamsShape = array{
 *   regionCode: string,
 *   y: int,
 *   m: int,
 *   maxResults?: int|null,
 *   sortKey?: null|SortKey|value-of<SortKey>,
 * }
 */
final class HistoricalRetrieveParams implements BaseModel
{
    /** @use SdkModel<HistoricalRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regionCode;

    #[Required]
    public int $y;

    #[Required]
    public int $m;

    /**
     * Only fetch this number of checklists.
     */
    #[Optional]
    public ?int $maxResults;

    /**
     * Order the results by the date of the checklist or by the date it was submitted.
     *
     * @var value-of<SortKey>|null $sortKey
     */
    #[Optional(enum: SortKey::class)]
    public ?string $sortKey;

    /**
     * `new HistoricalRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HistoricalRetrieveParams::with(regionCode: ..., y: ..., m: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HistoricalRetrieveParams)->withRegionCode(...)->withY(...)->withM(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SortKey|value-of<SortKey>|null $sortKey
     */
    public static function with(
        string $regionCode,
        int $y,
        int $m,
        ?int $maxResults = null,
        SortKey|string|null $sortKey = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;
        $self['y'] = $y;
        $self['m'] = $m;

        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $sortKey && $self['sortKey'] = $sortKey;

        return $self;
    }

    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    public function withY(int $y): self
    {
        $self = clone $this;
        $self['y'] = $y;

        return $self;
    }

    public function withM(int $m): self
    {
        $self = clone $this;
        $self['m'] = $m;

        return $self;
    }

    /**
     * Only fetch this number of checklists.
     */
    public function withMaxResults(int $maxResults): self
    {
        $self = clone $this;
        $self['maxResults'] = $maxResults;

        return $self;
    }

    /**
     * Order the results by the date of the checklist or by the date it was submitted.
     *
     * @param SortKey|value-of<SortKey> $sortKey
     */
    public function withSortKey(SortKey|string $sortKey): self
    {
        $self = clone $this;
        $self['sortKey'] = $sortKey;

        return $self;
    }
}
