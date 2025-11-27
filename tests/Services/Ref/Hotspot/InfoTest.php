<?php

namespace Tests\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Ref\Hotspot\Info\InfoGetResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversNothing]
final class InfoTest extends TestCase
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
    public function testRetrieve(): void
    {
        $result = $this->client->ref->hotspot->info->retrieve('locId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InfoGetResponse::class, $result);
    }
}
