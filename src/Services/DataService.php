<?php

declare(strict_types=1);

namespace Phoebe\Services;

use Phoebe\Client;
use Phoebe\ServiceContracts\DataContract;
use Phoebe\Services\Data\ObservationsService;

final class DataService implements DataContract
{
    /**
     * @api
     */
    public DataRawService $raw;

    /**
     * @api
     */
    public ObservationsService $observations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DataRawService($client);
        $this->observations = new ObservationsService($client);
    }
}
