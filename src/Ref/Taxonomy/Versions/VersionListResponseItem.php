<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Versions;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type VersionListResponseItemShape = array{
 *   authorityVer?: float|null, latest?: bool|null
 * }
 */
final class VersionListResponseItem implements BaseModel
{
    /** @use SdkModel<VersionListResponseItemShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?float $authorityVer;

    #[Api(optional: true)]
    public ?bool $latest;

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
        ?float $authorityVer = null,
        ?bool $latest = null
    ): self {
        $obj = new self;

        null !== $authorityVer && $obj->authorityVer = $authorityVer;
        null !== $latest && $obj->latest = $latest;

        return $obj;
    }

    public function withAuthorityVer(float $authorityVer): self
    {
        $obj = clone $this;
        $obj->authorityVer = $authorityVer;

        return $obj;
    }

    public function withLatest(bool $latest): self
    {
        $obj = clone $this;
        $obj->latest = $latest;

        return $obj;
    }
}
