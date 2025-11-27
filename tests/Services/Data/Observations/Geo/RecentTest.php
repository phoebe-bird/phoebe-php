<?php

namespace Tests\Services\Data\Observations\Geo;

use Phoebe\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversNothing]
final class RecentTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->data->observations->geo->recent->list([
            'lat' => -90, 'lng' => -180,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        $result = $this->client->data->observations->geo->recent->list([
            'lat' => -90,
            'lng' => -180,
            'back' => 1,
            'cat' => 'species',
            'dist' => 0,
            'hotspot' => true,
            'includeProvisional' => true,
            'maxResults' => 1,
            'sort' => 'date',
            'sppLocale' => 'sppLocale',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }
}
