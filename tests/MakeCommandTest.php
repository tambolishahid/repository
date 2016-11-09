<?php

namespace Fuguevit\Repositories\Tests;

use Illuminate\Support\Facades\Artisan;

class MakeCommandTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
    }
    
    /**
     * Test make:repository command.
     */
    public function test_it_can_make_create_repository_command()
    {
        Artisan::call('make:repository', [
            'repository' => 'Tests',
            '--model'    => 'Test',
        ]);

        $test_path = __DIR__ . "/../app";
        $test_repository = $test_path . DIRECTORY_SEPARATOR . "Repositories/TestsRepository.php";

        $this->assertFileExists($test_repository);
        app()['FileSystem']->cleanDirectory($test_path);
    }
}