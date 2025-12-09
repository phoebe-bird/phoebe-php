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
 *   maxResults?: int,
 *   sortKey?: SortKey|value-of<SortKey>,
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
     * @param SortKey|value-of<SortKey> $sortKey
     */
    public static function with(
        string $regionCode,
        int $y,
        int $m,
        ?int $maxResults = null,
        SortKey|string|null $sortKey = null,
    ): self {
        $obj = new self;

        $obj['regionCode'] = $regionCode;
        $obj['y'] = $y;
        $obj['m'] = $m;

        null !== $maxResults && $obj['maxResults'] = $maxResults;
        null !== $sortKey && $obj['sortKey'] = $sortKey;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['regionCode'] = $regionCode;

        return $obj;
    }

    public function withY(int $y): self
    {
        $obj = clone $this;
        $obj['y'] = $y;

        return $obj;
    }

    public function withM(int $m): self
    {
        $obj = clone $this;
        $obj['m'] = $m;

        return $obj;
    }

    /**
     * Only fetch this number of checklists.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj['maxResults'] = $maxResults;

        return $obj;
    }

    /**
     * Order the results by the date of the checklist or by the date it was submitted.
     *
     * @param SortKey|value-of<SortKey> $sortKey
     */
    public function withSortKey(SortKey|string $sortKey): self
    {
        $obj = clone $this;
        $obj['sortKey'] = $sortKey;

        return $obj;
    }
}
