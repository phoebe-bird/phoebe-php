<?php

declare(strict_types=1);

namespace Phoebe\Product\Top100;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type Top100GetResponseItemShape = array{
 *   numCompleteChecklists?: int|null,
 *   numSpecies?: int|null,
 *   profileHandle?: string|null,
 *   rowNum?: int|null,
 *   userDisplayName?: string|null,
 *   userID?: string|null,
 * }
 */
final class Top100GetResponseItem implements BaseModel
{
    /** @use SdkModel<Top100GetResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?int $numCompleteChecklists;

    #[Optional]
    public ?int $numSpecies;

    #[Optional]
    public ?string $profileHandle;

    #[Optional]
    public ?int $rowNum;

    #[Optional]
    public ?string $userDisplayName;

    #[Optional('userId')]
    public ?string $userID;

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
        ?int $numCompleteChecklists = null,
        ?int $numSpecies = null,
        ?string $profileHandle = null,
        ?int $rowNum = null,
        ?string $userDisplayName = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $numCompleteChecklists && $self['numCompleteChecklists'] = $numCompleteChecklists;
        null !== $numSpecies && $self['numSpecies'] = $numSpecies;
        null !== $profileHandle && $self['profileHandle'] = $profileHandle;
        null !== $rowNum && $self['rowNum'] = $rowNum;
        null !== $userDisplayName && $self['userDisplayName'] = $userDisplayName;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withNumCompleteChecklists(int $numCompleteChecklists): self
    {
        $self = clone $this;
        $self['numCompleteChecklists'] = $numCompleteChecklists;

        return $self;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $self = clone $this;
        $self['numSpecies'] = $numSpecies;

        return $self;
    }

    public function withProfileHandle(string $profileHandle): self
    {
        $self = clone $this;
        $self['profileHandle'] = $profileHandle;

        return $self;
    }

    public function withRowNum(int $rowNum): self
    {
        $self = clone $this;
        $self['rowNum'] = $rowNum;

        return $self;
    }

    public function withUserDisplayName(string $userDisplayName): self
    {
        $self = clone $this;
        $self['userDisplayName'] = $userDisplayName;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
