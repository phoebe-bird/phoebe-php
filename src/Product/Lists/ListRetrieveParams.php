<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Get information on the most recently submitted checklists for a region.
 *
 * @see Phoebe\Services\Product\ListsService::retrieve()
 *
 * @phpstan-type ListRetrieveParamsShape = array{maxResults?: int|null}
 */
final class ListRetrieveParams implements BaseModel
{
    /** @use SdkModel<ListRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only fetch this number of checklists.
     */
    #[Optional]
    public ?int $maxResults;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $maxResults = null): self
    {
        $self = new self;

        null !== $maxResults && $self['maxResults'] = $maxResults;

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
}
