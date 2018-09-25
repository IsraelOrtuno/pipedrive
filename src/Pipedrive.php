<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Http\PipedriveClient4;
use Devio\Pipedrive\Resources\Activities;
use Devio\Pipedrive\Resources\ActivityFields;
use Devio\Pipedrive\Resources\ActivityTypes;
use Devio\Pipedrive\Resources\Authorizations;
use Devio\Pipedrive\Resources\Currencies;
use Devio\Pipedrive\Resources\DealFields;
use Devio\Pipedrive\Resources\Deals;
use Devio\Pipedrive\Resources\EmailMessages;
use Devio\Pipedrive\Resources\EmailThreads;
use Devio\Pipedrive\Resources\Files;
use Devio\Pipedrive\Resources\Filters;
use Devio\Pipedrive\Resources\GlobalMessages;
use Devio\Pipedrive\Resources\Goals;
use Devio\Pipedrive\Resources\NoteFields;
use Devio\Pipedrive\Resources\Notes;
use Devio\Pipedrive\Resources\OrganizationFields;
use Devio\Pipedrive\Resources\OrganizationRelationships;
use Devio\Pipedrive\Resources\Organizations;
use Devio\Pipedrive\Resources\PermissionsSets;
use Devio\Pipedrive\Resources\PersonFields;
use Devio\Pipedrive\Resources\Persons;
use Devio\Pipedrive\Resources\Pipelines;
use Devio\Pipedrive\Resources\ProductFields;
use Devio\Pipedrive\Resources\Products;
use Devio\Pipedrive\Resources\PushNotifications;
use Devio\Pipedrive\Resources\Recents;
use Devio\Pipedrive\Resources\Roles;
use Devio\Pipedrive\Resources\SearchResults;
use Devio\Pipedrive\Resources\Stages;
use Devio\Pipedrive\Resources\UserConnections;
use Devio\Pipedrive\Resources\Users;
use Devio\Pipedrive\Resources\UserSettings;
use Illuminate\Support\Str;
use Devio\Pipedrive\Http\Request;
use Devio\Pipedrive\Http\PipedriveClient;

/**
 * @method Activities activities()
 * @method ActivityFields activityFields()
 * @method ActivityTypes activityTypes()
 * @method Authorizations authorizations()
 * @method Currencies currencies()
 * @method DealFields dealFields()
 * @method Deals deals()
 * @method EmailMessages emailMessages()
 * @method EmailThreads emailThreads()
 * @method Files files()
 * @method Filters filters()
 * @method GlobalMessages globalMessages()
 * @method Goals goals()
 * @method NoteFields noteFields()
 * @method Notes notes()
 * @method OrganizationFields organizationFields()
 * @method OrganizationRelationships organizationRelationships()
 * @method Organizations organizations()
 * @method PermissionsSets permissionsSets()
 * @method PersonFields personFields()
 * @method Persons persons()
 * @method Pipelines pipelines()
 * @method ProductFields productFields()
 * @method Products products()
 * @method PushNotifications pushNotifications()
 * @method Recents recents()
 * @method Roles roles()
 * @method SearchResults searchResults()
 * @method Stages stages()
 * @method UserConnections userConnections()
 * @method Users users()
 * @method UserSettings userSettings()
 */
class Pipedrive
{
    /**
     * The base URI.
     *
     * @var string
     */
    protected $baseURI;

    /**
     * The API token.
     *
     * @var string
     */
    protected $token;

    /**
     * The guzzle version
     *
     * @var int
     */
    protected $guzzleVersion;

    /**
     * Pipedrive constructor.
     *
     * @param $token
     */
    public function __construct($token = '', $uri = 'https://api.pipedrive.com/v1/', $guzzleVersion = 6)
    {
        $this->token = $token;
        $this->baseURI = $uri;
        $this->guzzleVersion = $guzzleVersion;
    }

    /**
     * Get the resource instance.
     *
     * @param $resource
     * @return mixed
     */
    public function make($resource)
    {
        $class = $this->resolveClassPath($resource);

        return new $class($this->getRequest());
    }

    /**
     * Get the resource path.
     *
     * @param $resource
     * @return string
     */
    protected function resolveClassPath($resource)
    {
        return 'Devio\\Pipedrive\\Resources\\' . Str::studly($resource);
    }

    /**
     * Get the request instance.
     *
     * @return Request
     */
    public function getRequest()
    {
        return new Request($this->getClient());
    }

    /**
     * Get the HTTP client instance.
     *
     * @return Client
     */
    protected function getClient()
    {
        if ($this->guzzleVersion >= 6) {
            return new PipedriveClient($this->getBaseURI(), $this->token);
        } else {
            return new PipedriveClient4($this->getBaseURI(), $this->token);
        }
    }

    /**
     * Get the base URI.
     *
     * @return string
     */
    public function getBaseURI()
    {
        return $this->baseURI;
    }

    /**
     * Set the base URI.
     *
     * @param string $baseURI
     */
    public function setBaseURI($baseURI)
    {
        $this->baseURI = $baseURI;
    }

    /**
     * Set the token.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Any reading will return a resource.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->make($name);
    }

    /**
     * Methods will also return a resource.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (! in_array($name, get_class_methods(get_class()))) {
            return $this->{$name};
        }
    }
}
