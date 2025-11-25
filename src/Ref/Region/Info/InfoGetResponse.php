<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkResponse;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Core\Conversion\Contracts\ResponseConverter;
use Phoebe\Ref\Region\Info\InfoGetResponse\Bounds;

/**
 * @phpstan-type InfoGetResponseShape = array{
 *   bounds?: Bounds|null, result?: string|null
 * }
 */
final class InfoGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InfoGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Bounds $bounds;

    #[Api(optional: true)]
    public ?string $result;

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
        ?Bounds $bounds = null,
        ?string $result = null
    ): self {
        $obj = new self;

        null !== $bounds && $obj->bounds = $bounds;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    public function withBounds(Bounds $bounds): self
    {
        $obj = clone $this;
        $obj->bounds = $bounds;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
