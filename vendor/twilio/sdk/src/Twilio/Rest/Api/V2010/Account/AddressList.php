<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class AddressList extends ListResource
    {
    /**
     * Construct the AddressList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that will be responsible for the new Address resource.
     */
    public function __construct(
        Version $version,
        string $accountSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'accountSid' =>
            $accountSid,
        
        ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid)
        .'/Addresses.json';
    }

    /**
     * Create the AddressInstance
     *
     * @param string $customerName The name to associate with the new address.
     * @param string $street The number and street address of the new address.
     * @param string $city The city of the new address.
     * @param string $region The state or region of the new address.
     * @param string $postalCode The postal code of the new address.
     * @param string $isoCountry The ISO country code of the new address.
     * @param array|Options $options Optional Arguments
     * @return AddressInstance Created AddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $customerName, string $street, string $city, string $region, string $postalCode, string $isoCountry, array $options = []): AddressInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'CustomerName' =>
                $customerName,
            'Street' =>
                $street,
            'City' =>
                $city,
            'Region' =>
                $region,
            'PostalCode' =>
                $postalCode,
            'IsoCountry' =>
                $isoCountry,
            'FriendlyName' =>
                $options['friendlyName'],
            'EmergencyEnabled' =>
                Serialize::booleanToString($options['emergencyEnabled']),
            'AutoCorrectAddress' =>
                Serialize::booleanToString($options['autoCorrectAddress']),
            'StreetSecondary' =>
                $options['streetSecondary'],
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new AddressInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }


    /**
     * Reads AddressInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return AddressInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Streams AddressInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of AddressInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return AddressPage Page of AddressInstance
     */
    public function page(
        array $options = [],
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): AddressPage
    {
        $options = new Values($options);

        $params = Values::of([
            'CustomerName' =>
                $options['customerName'],
            'FriendlyName' =>
                $options['friendlyName'],
            'IsoCountry' =>
                $options['isoCountry'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new AddressPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of AddressInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return AddressPage Page of AddressInstance
     */
    public function getPage(string $targetUrl): AddressPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new AddressPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a AddressContext
     *
     * @param string $sid The Twilio-provided string that uniquely identifies the Address resource to delete.
     */
    public function getContext(
        string $sid
        
    ): AddressContext
    {
        return new AddressContext(
            $this->version,
            $this->solution['accountSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Api.V2010.AddressList]';
    }
}
