<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Locales;

use Phoebe\Core\Attributes\Api;
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
 * @phpstan-type LocaleListParamsShape = array{Accept_Language?: string}
 */
final class LocaleListParams implements BaseModel
{
    /** @use SdkModel<LocaleListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $Accept_Language;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $Accept_Language = null): self
    {
        $obj = new self;

        null !== $Accept_Language && $obj['Accept_Language'] = $Accept_Language;

        return $obj;
    }

    public function withAcceptLanguage(string $acceptLanguage): self
    {
        $obj = clone $this;
        $obj['Accept_Language'] = $acceptLanguage;

        return $obj;
    }
}
