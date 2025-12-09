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
        $obj = new self;

        null !== $bandingCodes && $obj['bandingCodes'] = $bandingCodes;
        null !== $category && $obj['category'] = $category;
        null !== $comName && $obj['comName'] = $comName;
        null !== $comNameCodes && $obj['comNameCodes'] = $comNameCodes;
        null !== $familyCode && $obj['familyCode'] = $familyCode;
        null !== $familyComName && $obj['familyComName'] = $familyComName;
        null !== $familySciName && $obj['familySciName'] = $familySciName;
        null !== $order && $obj['order'] = $order;
        null !== $sciName && $obj['sciName'] = $sciName;
        null !== $sciNameCodes && $obj['sciNameCodes'] = $sciNameCodes;
        null !== $speciesCode && $obj['speciesCode'] = $speciesCode;
        null !== $taxonOrder && $obj['taxonOrder'] = $taxonOrder;

        return $obj;
    }

    /**
     * @param list<string> $bandingCodes
     */
    public function withBandingCodes(array $bandingCodes): self
    {
        $obj = clone $this;
        $obj['bandingCodes'] = $bandingCodes;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withComName(string $comName): self
    {
        $obj = clone $this;
        $obj['comName'] = $comName;

        return $obj;
    }

    /**
     * @param list<string> $comNameCodes
     */
    public function withComNameCodes(array $comNameCodes): self
    {
        $obj = clone $this;
        $obj['comNameCodes'] = $comNameCodes;

        return $obj;
    }

    public function withFamilyCode(string $familyCode): self
    {
        $obj = clone $this;
        $obj['familyCode'] = $familyCode;

        return $obj;
    }

    public function withFamilyComName(string $familyComName): self
    {
        $obj = clone $this;
        $obj['familyComName'] = $familyComName;

        return $obj;
    }

    public function withFamilySciName(string $familySciName): self
    {
        $obj = clone $this;
        $obj['familySciName'] = $familySciName;

        return $obj;
    }

    public function withOrder(string $order): self
    {
        $obj = clone $this;
        $obj['order'] = $order;

        return $obj;
    }

    public function withSciName(string $sciName): self
    {
        $obj = clone $this;
        $obj['sciName'] = $sciName;

        return $obj;
    }

    /**
     * @param list<string> $sciNameCodes
     */
    public function withSciNameCodes(array $sciNameCodes): self
    {
        $obj = clone $this;
        $obj['sciNameCodes'] = $sciNameCodes;

        return $obj;
    }

    public function withSpeciesCode(string $speciesCode): self
    {
        $obj = clone $this;
        $obj['speciesCode'] = $speciesCode;

        return $obj;
    }

    public function withTaxonOrder(int $taxonOrder): self
    {
        $obj = clone $this;
        $obj['taxonOrder'] = $taxonOrder;

        return $obj;
    }
}
