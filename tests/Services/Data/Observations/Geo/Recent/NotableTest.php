<?php

namespace Tests\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversNothing]
final class NotableTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->data->observations->geo->recent->notable->list(
            lat: -90,
            lng: -180
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        $result = $this->client->data->observations->geo->recent->notable->list(
            lat: -90,
            lng: -180,
            back: 1,
            detail: 'simple',
            dist: 0,
            hotspot: true,
            maxResults: 1,
            sppLocale: 'sppLocale',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }
}
