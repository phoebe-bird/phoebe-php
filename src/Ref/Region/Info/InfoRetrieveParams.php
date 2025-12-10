<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Region\Info\InfoRetrieveParams\RegionNameFormat;

/**
 * Get information on the name and geographical area covered by a region.
 * #### Notes.
 *
 * Taking Madison County, New York, USA (location code US-NY-053) as an example
 * the various values for the regionNameFormat query parameter work as follows:
 *
 * | Value | Description | Result |
 * | ------| ----------- | ------ |
 * | detailed | return a detailed description | Madison County, New York, US |
 * | detailednoqual | return the name to the subnational1 level | Madison, New York |
 * | full | return the full description | Madison, New York, United States |
 * | namequal | return the qualified name | Madison County |
 * | nameonly | return only the name of the region | Madison |
 * | revdetailed | return the detailed description in reverse | US, New York, Madison County |
 *
 * @see Phoebe\Services\Ref\Region\InfoService::retrieve()
 *
 * @phpstan-type InfoRetrieveParamsShape = array{
 *   delim?: string, regionNameFormat?: RegionNameFormat|value-of<RegionNameFormat>
 * }
 */
final class InfoRetrieveParams implements BaseModel
{
    /** @use SdkModel<InfoRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The characters used to separate elements in the name.
     */
    #[Optional]
    public ?string $delim;

    /**
     * Control how the name is displayed.
     *
     * @var value-of<RegionNameFormat>|null $regionNameFormat
     */
    #[Optional(enum: RegionNameFormat::class)]
    public ?string $regionNameFormat;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RegionNameFormat|value-of<RegionNameFormat> $regionNameFormat
     */
    public static function with(
        ?string $delim = null,
        RegionNameFormat|string|null $regionNameFormat = null
    ): self {
        $self = new self;

        null !== $delim && $self['delim'] = $delim;
        null !== $regionNameFormat && $self['regionNameFormat'] = $regionNameFormat;

        return $self;
    }

    /**
     * The characters used to separate elements in the name.
     */
    public function withDelim(string $delim): self
    {
        $self = clone $this;
        $self['delim'] = $delim;

        return $self;
    }

    /**
     * Control how the name is displayed.
     *
     * @param RegionNameFormat|value-of<RegionNameFormat> $regionNameFormat
     */
    public function withRegionNameFormat(
        RegionNameFormat|string $regionNameFormat
    ): self {
        $self = clone $this;
        $self['regionNameFormat'] = $regionNameFormat;

        return $self;
    }
}
