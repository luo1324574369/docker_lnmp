<?php
namespace App\Stores\MarketAdminService;

/**
 * Class Application
 * @property Column $column
 * @property Topic $topic
 * @package Xiaoe\MarketAdminService
 */

class Application
{
    protected $role;
    public $client;
    protected $versionType;

    const CHANNEL = 'channel';
    const CONTENT = 'content';
    const PLATFORM = 'platform';

    public function __construct($config)
    {
        if(is_null($config)) {
            throw new \Exception('config not found');
        }

        $this->client = new Client($config['http']['base_uri'],$config['http']['timeout']);
        $this->versionType = $config['version'];
    }

    public function channel()
    {
        $this->role = self::CHANNEL;
        return $this;
    }

    public function content()
    {
        $this->role = self::CONTENT;
        return $this;
    }

    public function platform()
    {
        $this->role = self::PLATFORM;
        return $this;
    }

    /**
     * @param string $appId
     * @return $this
     */
    public function gray($appId)
    {
        $this->client->gray = $appId;
        return $this;
    }

    /**
     * @return Base
     */
    public function Base()
    {
        $class = 'App\\Stores\\MarketAdminService\\'.'Base';
        $c = new $class($this->client,$this->role,$this->versionType);

        $c->setResourceType('BaseResource');

        return $c;
    }

    /**
     * @param string $tableName
     * @return Table
     */
    public function table($tableName)
    {
        $this->role = 'table';

        $class = 'Xiaoe\\MarketAdminService\\Resource\\'.'Table';
        $c = new $class($this->client,$this->role,$this->versionType);

        $c->setResourceType($tableName);

        return $c;
    }

    public function __get($name)
    {
        $class = 'Xiaoe\\MarketAdminService\\Resource\\'.$name;
        return new $class($this->client,$this->role,$this->versionType);
    }
}
