<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V2\Flow;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class FlowRevisionContext extends InstanceContext {
    /**
     * Initialize the FlowRevisionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     * @param string $revision Specific Revision number or can be `LatestPublished`
     *                         and `LatestRevision`
     */
    public function __construct(Version $version, $sid, $revision) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, 'revision' => $revision, ];

        $this->uri = '/Flows/' . \rawurlencode($sid) . '/Revisions/' . \rawurlencode($revision) . '';
    }

    /**
     * Fetch a FlowRevisionInstance
     *
     * @return FlowRevisionInstance Fetched FlowRevisionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): FlowRevisionInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new FlowRevisionInstance(
            $this->version,
            $payload,
            $this->solution['sid'],
            $this->solution['revision']
        );
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
        return '[Twilio.Studio.V2.FlowRevisionContext ' . \implode(' ', $context) . ']';
    }
}