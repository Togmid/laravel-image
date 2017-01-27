<?php

use Folklore\Image\ImagineManager;
use \Imagine\Gd\Imagine as ImagineGd;
use \Imagine\Imagick\Imagine as ImagineImagick;
use \Imagine\Gmagick\Imagine as ImagineGmagick;

/**
 * @coversDefaultClass Folklore\Image\ImagineManager
 */
class ImagineManagerTest extends ImageTestCase
{
    protected $manager;

    public function setUp()
    {
        parent::setUp();

        $this->manager = new ImagineManager(app());
    }

    /**
     * Test getting the gd driver
     * @test
     * @covers ::createDriver
     * @covers ::createGdDriver
     */
    public function testGdDriver()
    {
        $driver = $this->manager->driver('gd');
        $this->assertEquals(new ImagineGd(), $driver);
    }

    /**
     * Test getting the imagick driver
     * @test
     * @covers ::createDriver
     * @covers ::createImagickDriver
     */
    public function testImagickDriver()
    {
        $driver = $this->manager->driver('imagick');
        $this->assertEquals(new ImagineImagick(), $driver);
    }

    /**
     * Test getting the gmagick driver
     * @test
     * @covers ::createDriver
     * @covers ::createGmagickDriver
     */
    public function testGmagickDriver()
    {
        $driver = $this->manager->driver('gmagick');
        $this->assertEquals(new ImagineGmagick(), $driver);
    }

    /**
     * Test get and set default driver
     * @test
     * @covers ::getDefaultDriver
     * @covers ::setDefaultDriver
     */
    public function testGetDefaultDriver()
    {
        $defaultDriver = $this->app['config']->get('image.driver');
        $this->assertEquals($defaultDriver, $this->manager->getDefaultDriver());

        $driver = 'imagick';
        $this->manager->setDefaultDriver($driver);
        $this->assertEquals($driver, $this->manager->getDefaultDriver());
    }
}
