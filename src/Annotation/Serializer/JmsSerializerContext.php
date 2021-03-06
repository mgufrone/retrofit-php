<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru\Retrofit\Annotation\Serializer;

/**
 * Class JmsSerializerContext
 *
 * @author Matthew Loberg <m@mloberg.com>
 * @author Nate Brunette <n@tebru.net>
 */
abstract class JmsSerializerContext
{
    /**
     * Serialization groups
     *
     * @var array
     */
    private $groups;

    /**
     * Object version
     *
     * @var int
     */
    private $version;

    /**
     * If we should serialize null values
     *
     * @var bool
     */
    private $serializeNull = false;

    /**
     * If we should check depth
     *
     * @var bool
     */
    private $enableMaxDepthChecks = false;

    /**
     * Extra attributes
     *
     * @var array
     */
    private $attributes = [];

    /**
     * Constructor
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        if (array_key_exists('groups', $params)) {
            $this->groups = (array) $params['groups'];
            unset($params['groups']);
        }

        if (array_key_exists('version', $params)) {
            $this->version = $params['version'];
            unset($params['version']);
        }

        if (array_key_exists('serializeNull', $params)) {
            $this->serializeNull = $params['serializeNull'];
            unset($params['serializeNull']);
        }

        if (array_key_exists('enableMaxDepthChecks', $params)) {
            $this->enableMaxDepthChecks = $params['enableMaxDepthChecks'];
            unset($params['enableMaxDepthChecks']);
        }

        $this->attributes = $params;
    }

    /**
     * Get Groups
     *
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Get version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get SerializeNull
     *
     * @return bool
     */
    public function getSerializeNull()
    {
        return $this->serializeNull;
    }

    /**
     * Get enable max depth checks
     *
     * @return bool
     */
    public function getEnableMaxDepthChecks()
    {
        return $this->enableMaxDepthChecks;
    }

    /**
     * Get Attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
