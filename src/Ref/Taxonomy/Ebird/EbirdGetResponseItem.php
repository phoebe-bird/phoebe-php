<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Ebird;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type EbirdGetResponseItemShape = array{
 *   bandingCodes?: list<string>|null,
 *   category?: string|null,
 *   comName?: string|null,
 *   comNameCodes?: list<string>|null,
 *   familyCode?: string|null,
 *   familyComName?: string|null,
 *   familySciName?: string|null,
 *   order?: string|null,
 *   sciName?: string|null,
 *   sciNameCodes?: list<string>|null,
 *   speciesCode?: string|null,
 *   taxonOrder?: int|null,
 * }
 */
final class EbirdGetResponseItem implements BaseModel
{
    /** @use SdkModel<EbirdGetResponseItemShape> */
    use SdkModel;

    /** @var list<string>|null $bandingCodes */
    #[Optional(list: 'string')]
    public ?array $bandingCodes;

    #[Optional]
    public ?string $category;

    #[Optional]
    public ?string $comName;

    /** @var list<string>|null $comNameCodes */
    #[Optional(list: 'string')]
    public ?array $comNameCodes;

    #[Optional]
    public ?string $familyCode;

    #[Optional]
    public ?string $familyComName;

    #[Optional]
    public ?string $familySciName;

    #[Optional]
    public ?string $order;

    #[Optional]
    public ?string $sciName;

    /** @var list<string>|null $sciNameCodes */
    #[Optional(list: 'string')]
    public ?array $sciNameCodes;

    #[Optional]
    public ?string $speciesCode;

    #[Optional]
    public ?int $taxonOrder;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $bandingCodes
     * @param list<string> $comNameCodes
     * @param list<string> $sciNameCodes
     */
    public static function with(
        ?array $bandingCodes = null,
        ?string $category = null,
        ?string $comName = null,
        ?array $comNameCodes = null,
        ?string $familyCode = null,
        ?string $familyComName = null,
        ?string $familySciName = null,
        ?string $order = null,
        ?string $sciName = null,
        ?array $sciNameCodes = null,
        ?string $speciesCode = null,
        ?int $taxonOrder = null,
    ): self {
        $self = new self;

        null !== $bandingCodes && $self['bandingCodes'] = $bandingCodes;
        null !== $category && $self['category'] = $category;
        null !== $comName && $self['comName'] = $comName;
        null !== $comNameCodes && $self['comNameCodes'] = $comNameCodes;
        null !== $familyCode && $self['familyCode'] = $familyCode;
        null !== $familyComName && $self['familyComName'] = $familyComName;
        null !== $familySciName && $self['familySciName'] = $familySciName;
        null !== $order && $self['order'] = $order;
        null !== $sciName && $self['sciName'] = $sciName;
        null !== $sciNameCodes && $self['sciNameCodes'] = $sciNameCodes;
        null !== $speciesCode && $self['speciesCode'] = $speciesCode;
        null !== $taxonOrder && $self['taxonOrder'] = $taxonOrder;

        return $self;
    }

    /**
     * @param list<string> $bandingCodes
     */
    public function withBandingCodes(array $bandingCodes): self
    {
        $self = clone $this;
        $self['bandingCodes'] = $bandingCodes;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withComName(string $comName): self
    {
        $self = clone $this;
        $self['comName'] = $comName;

        return $self;
    }

    /**
     * @param list<string> $comNameCodes
     */
    public function withComNameCodes(array $comNameCodes): self
    {
        $self = clone $this;
        $self['comNameCodes'] = $comNameCodes;

        return $self;
    }

    public function withFamilyCode(string $familyCode): self
    {
        $self = clone $this;
        $self['familyCode'] = $familyCode;

        return $self;
    }

    public function withFamilyComName(string $familyComName): self
    {
        $self = clone $this;
        $self['familyComName'] = $familyComName;

        return $self;
    }

    public function withFamilySciName(string $familySciName): self
    {
        $self = clone $this;
        $self['familySciName'] = $familySciName;

        return $self;
    }

    public function withOrder(string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withSciName(string $sciName): self
    {
        $self = clone $this;
        $self['sciName'] = $sciName;

        return $self;
    }

    /**
     * @param list<string> $sciNameCodes
     */
    public function withSciNameCodes(array $sciNameCodes): self
    {
        $self = clone $this;
        $self['sciNameCodes'] = $sciNameCodes;

        return $self;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $self = clone $this;
        $self['speciesCode'] = $speciesCode;

        return $self;
    }

    public function withTaxonOrder(int $taxonOrder): self
    {
        $self = clone $this;
        $self['taxonOrder'] = $taxonOrder;

        return $self;
    }
}
