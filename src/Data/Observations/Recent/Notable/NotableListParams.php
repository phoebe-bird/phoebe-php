<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Notable;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams\Detail;

/**
 * Get the list of recent, notable observations (up to 30 days ago) of birds seen in a country, region or location. Notable observations can be for locally or nationally rare species or are otherwise unusual, e.g. over-wintering birds in a species which is normally only a summer visitor.
 *
 * @see Phoebe\Services\Data\Observations\Recent\NotableService::list()
 *
 * @phpstan-type NotableListParamsShape = array{
 *   back?: int,
 *   detail?: Detail|value-of<Detail>,
 *   hotspot?: bool,
 *   maxResults?: int,
 *   r?: list<string>,
 *   sppLocale?: string,
 * }
 */
final class NotableListParams implements BaseModel
{
    /** @use SdkModel<NotableListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of days back to fetch observations.
     */
    #[Api(optional: true)]
    public ?int $back;

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @var value-of<Detail>|null $detail
     */
    #[Api(enum: Detail::class, optional: true)]
    public ?string $detail;

    /**
     * Only fetch observations from hotspots.
     */
    #[Api(optional: true)]
    public ?bool $hotspot;

    /**
     * Only fetch this number of observations.
     */
    #[Api(optional: true)]
    public ?int $maxResults;

    /**
     * Fetch observations from up to 10 locations.
     *
     * @var list<string>|null $r
     */
    #[Api(list: 'string', optional: true)]
    public ?array $r;

    /**
     * Use this language for species common names.
     */
    #[Api(optional: true)]
    public ?string $sppLocale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Detail|value-of<Detail> $detail
     * @param list<string> $r
     */
    public static function with(
        ?int $back = null,
        Detail|string|null $detail = null,
        ?bool $hotspot = null,
        ?int $maxResults = null,
        ?array $r = null,
        ?string $sppLocale = null,
    ): self {
        $obj = new self;

        null !== $back && $obj->back = $back;
        null !== $detail && $obj['detail'] = $detail;
        null !== $hotspot && $obj->hotspot = $hotspot;
        null !== $maxResults && $obj->maxResults = $maxResults;
        null !== $r && $obj->r = $r;
        null !== $sppLocale && $obj->sppLocale = $sppLocale;

        return $obj;
    }

    /**
     * The number of days back to fetch observations.
     */
    public function withBack(int $back): self
    {
        $obj = clone $this;
        $obj->back = $back;

        return $obj;
    }

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @param Detail|value-of<Detail> $detail
     */
    public function withDetail(Detail|string $detail): self
    {
        $obj = clone $this;
        $obj['detail'] = $detail;

        return $obj;
    }

    /**
     * Only fetch observations from hotspots.
     */
    public function withHotspot(bool $hotspot): self
    {
        $obj = clone $this;
        $obj->hotspot = $hotspot;

        return $obj;
    }

    /**
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj->maxResults = $maxResults;

        return $obj;
    }

    /**
     * Fetch observations from up to 10 locations.
     *
     * @param list<string> $r
     */
    public function withR(array $r): self
    {
        $obj = clone $this;
        $obj->r = $r;

        return $obj;
    }

    /**
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $obj = clone $this;
        $obj->sppLocale = $sppLocale;

        return $obj;
    }
}
