<?php

namespace App;

class Debuger
{
    private array $timestamps = ['start_time'];
    private array $memories_usage = ['start'];

    public function __construct()
    {
        $this->timestamps['start_time'] = microtime(true);
        $this->memories_usage['start'] = memory_get_usage();
    }

    public static function &getInstance(): Debuger
    {
        static $instance;

        if (!($instance instanceof Debuger)) {
            $instance = new self();
        }

        return $instance;
    }

    public function getFinalResults(): array
    {
        return [
            'run_time' => (microtime(true) - $this->timestamps['start_time']) / 1000,
            'memory_usage' => intval((memory_get_usage() - $this->memories_usage['start']) / 1024),
        ];
    }
}
