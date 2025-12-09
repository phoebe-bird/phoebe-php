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
        $obj = new self;

        null !== $numCompleteChecklists && $obj['numCompleteChecklists'] = $numCompleteChecklists;
        null !== $numSpecies && $obj['numSpecies'] = $numSpecies;
        null !== $profileHandle && $obj['profileHandle'] = $profileHandle;
        null !== $rowNum && $obj['rowNum'] = $rowNum;
        null !== $userDisplayName && $obj['userDisplayName'] = $userDisplayName;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    public function withNumCompleteChecklists(int $numCompleteChecklists): self
    {
        $obj = clone $this;
        $obj['numCompleteChecklists'] = $numCompleteChecklists;

        return $obj;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $obj = clone $this;
        $obj['numSpecies'] = $numSpecies;

        return $obj;
    }

    public function withProfileHandle(string $profileHandle): self
    {
        $obj = clone $this;
        $obj['profileHandle'] = $profileHandle;

        return $obj;
    }

    public function withRowNum(int $rowNum): self
    {
        $obj = clone $this;
        $obj['rowNum'] = $rowNum;

        return $obj;
    }

    public function withUserDisplayName(string $userDisplayName): self
    {
        $obj = clone $this;
        $obj['userDisplayName'] = $userDisplayName;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
