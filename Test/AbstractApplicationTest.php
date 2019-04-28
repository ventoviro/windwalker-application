<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 LYRASOFT Taiwan, Inc.
 * @license    LGPL-2.0-or-later
 */

namespace Windwalker\Application\Test;

use Psr\Log\NullLogger;
use Windwalker\Application\Test\Mock\MockLogger;
use Windwalker\Application\Test\Stub\StubApplication;
use Windwalker\Structure\Structure;

/**
 * Test class of AbstractApplication
 *
 * @since 2.0
 */
class AbstractApplicationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance.
     *
     * @var StubApplication
     */
    protected $instance;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->instance = new StubApplication();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown(): void
    {
    }

    /**
     * Method to test close().
     *
     * @return void
     *
     * @covers \Windwalker\Application\AbstractApplication::close
     */
    public function testClose()
    {
        $this->assertEquals(0, $this->instance->close());
    }

    /**
     * Method to test execute().
     *
     * @return void
     *
     * @covers \Windwalker\Application\AbstractApplication::execute
     */
    public function testExecute()
    {
        $this->instance->execute();

        $this->assertEquals('Hello World', $this->instance->executed);
    }

    /**
     * Method to test get().
     *
     * @return void
     *
     * @covers \Windwalker\Application\AbstractApplication::get
     */
    public function testGetAndSet()
    {
        $config = [
            'flower' => 'sakura',
            'sky' => [
                'bird' => 'seagull',
            ],
        ];

        $this->instance->setConfiguration(new Structure($config));

        $this->assertEquals('sakura', $this->instance->get('flower'));
        $this->assertEquals('seagull', $this->instance->get('sky.bird'));
        $this->assertEquals('foo', $this->instance->get('bar', 'foo'));

        $this->instance->set('packour', 'run');

        $this->assertEquals('run', $this->instance->get('packour', 'foo'));
    }

    /**
     * Method to test getLogger().
     *
     * @return void
     *
     * @covers \Windwalker\Application\AbstractApplication::getLogger
     */
    public function testGetAndSetLogger()
    {
        $logger = $this->instance->getLogger();

        $this->assertTrue($logger instanceof NullLogger, 'Default logger should be NullLogger.');

        $this->instance->setLogger(new MockLogger());

        $this->assertTrue($this->instance->getLogger() instanceof MockLogger);
    }

    /**
     * Method to test setConfiguration().
     *
     * @return void
     *
     * @covers \Windwalker\Application\AbstractApplication::setConfiguration
     */
    public function testSetConfiguration()
    {
        $config = [
            'wind' => 'sound',
        ];

        $this->instance->setConfiguration(new Structure($config));

        $this->assertEquals('sound', $this->instance->get('wind'));
    }
}
