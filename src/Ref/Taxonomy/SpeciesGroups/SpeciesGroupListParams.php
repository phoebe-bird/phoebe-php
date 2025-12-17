<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\SpeciesGroups;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Get the list of species groups, e.g. terns, finches, etc. #### Notes Merlin puts like birds together, with Falcons next to Hawks, whereas eBird follows taxonomic order.
 *
 * @see Phoebe\Services\Ref\Taxonomy\SpeciesGroupsService::list()
 *
 * @phpstan-type SpeciesGroupListParamsShape = array{groupNameLocale?: string|null}
 */
final class SpeciesGroupListParams implements BaseModel
{
    /** @use SdkModel<SpeciesGroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Locale for species group names. English names are returned for any non-listed locale or any non-translated group name.
     */
    #[Optional]
    public ?string $groupNameLocale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $groupNameLocale = null): self
    {
        $self = new self;

        null !== $groupNameLocale && $self['groupNameLocale'] = $groupNameLocale;

        return $self;
    }

    /**
     * Locale for species group names. English names are returned for any non-listed locale or any non-translated group name.
     */
    public function withGroupNameLocale(string $groupNameLocale): self
    {
        $self = clone $this;
        $self['groupNameLocale'] = $groupNameLocale;

        return $self;
    }
}
