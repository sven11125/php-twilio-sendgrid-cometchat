<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class RatePlanContext extends InstanceContext {
    /**
     * Initialize the RatePlanContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The sid
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/RatePlans/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch a RatePlanInstance
     *
     * @return RatePlanInstance Fetched RatePlanInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): RatePlanInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new RatePlanInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the RatePlanInstance
     *
     * @param array|Options $options Optional Arguments
     * @return RatePlanInstance Updated RatePlanInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): RatePlanInstance {
        $options = new Values($options);

        $data = Values::of([
            'UniqueName' => $options['uniqueName'],
            'FriendlyName' => $options['friendlyName'],
        ]);

        $payload = $this->version->update(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new RatePlanInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the RatePlanInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Wireless.RatePlanContext ' . \implode(' ', $context) . ']';
    }
}