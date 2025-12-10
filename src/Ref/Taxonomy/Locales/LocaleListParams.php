<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Locales;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Returns the list of supported locale codes and names for species common names, with the last time they were updated. Use the accept-language header to get translated language names when available.
 *
 * NOTE: The locale codes and names are stable but the other fields in this result are not yet finalized and should be used with caution.
 *
 * @see Phoebe\Services\Ref\Taxonomy\LocalesService::list()
 *
 * @phpstan-type LocaleListParamsShape = array{acceptLanguage?: string}
 */
final class LocaleListParams implements BaseModel
{
    /** @use SdkModel<LocaleListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $acceptLanguage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $acceptLanguage = null): self
    {
        $self = new self;

        null !== $acceptLanguage && $self['acceptLanguage'] = $acceptLanguage;

        return $self;
    }

    public function withAcceptLanguage(string $acceptLanguage): self
    {
        $self = clone $this;
        $self['acceptLanguage'] = $acceptLanguage;

        return $self;
    }
}
