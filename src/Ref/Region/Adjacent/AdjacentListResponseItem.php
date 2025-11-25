<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Adjacent;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdjacentListResponseItemShape = array{
 *   code?: string|null, name?: string|null
 * }
 */
final class AdjacentListResponseItem implements BaseModel
{
    /** @use SdkModel<AdjacentListResponseItemShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $code;

    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $code = null, ?string $name = null): self
    {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
