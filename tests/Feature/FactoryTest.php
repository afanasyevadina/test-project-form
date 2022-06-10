<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Factories\CsvSaverFactory;
use App\Models\Factories\DatabaseSaverFactory;
use App\Models\Factories\JsonSaverFactory;
use App\Models\Factories\MailSaverFactory;
use App\Models\Factories\SaverFactory;
use App\Models\Savers\CsvSaver;
use App\Models\Savers\DatabaseSaver;
use App\Models\Savers\JsonSaver;
use App\Models\Savers\MailSaver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FactoryTest extends TestCase
{
    public function provideFactory(): array
    {
        return [
            [JsonSaver::class, new JsonSaverFactory()],
            [CsvSaver::class, new CsvSaverFactory()],
            [DatabaseSaver::class, new DatabaseSaverFactory()],
            [MailSaver::class, new MailSaverFactory()],
        ];
    }

    /**
     * @dataProvider provideFactory
     * @return void
     */
    public function testCanCreateSaver(string $class, SaverFactory $saverFactory): void
    {
        $this->assertInstanceOf($class, $saverFactory->getSaver());
        $this->assertInstanceOf($class, $saverFactory->getSaver());
        $this->assertInstanceOf($class, $saverFactory->getSaver());
        $this->assertInstanceOf($class, $saverFactory->getSaver());
    }
}
