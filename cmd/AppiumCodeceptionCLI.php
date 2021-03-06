<?php

namespace AppiumCodeceptionCLI;

use Symfony\Component\Console\Application;
use AppiumCodeceptionCLI\Commands\JsonParserCommand;

class AppiumCodeceptionCLI
{
    /**
     * @var string
     */
    const APPLICATION_NAME = 'Appium Codeception CLI';

    /**
     * @var string
     */
    const APPLICATION_VERSION = '0.0.1';

    /**
     * @var array
     */
    protected $commands = [];

    /**
     * AppiumCodeceptionCLI constructor.
     */
    public function __construct()
    {
        $this->commands[] = new JsonParserCommand();
    }

    /**
     * Get all commands of the application.
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * The function from where whole fun begins.
     *
     * @link https://github.com/appium/appium-base-driver/blob/master/lib/mjsonwp/routes.js Appium Base Driver Routes
     * @link http://phrogz.net/JS/NeatJSON/ Convert js var to json
     */
    public function runApplication()
    {
        $application = new Application(self::APPLICATION_NAME, self::APPLICATION_VERSION);
        $application->addCommands($this->getCommands());
        $application->run();
    }
}