<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class StyleSheetOptions {
    /**
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     * @return UpdateStyleSheetOptions Options builder
     */
    public static function update(array $styleSheet = Values::NONE): UpdateStyleSheetOptions {
        return new UpdateStyleSheetOptions($styleSheet);
    }
}

class UpdateStyleSheetOptions extends Options {
    /**
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     */
    public function __construct(array $styleSheet = Values::NONE) {
        $this->options['styleSheet'] = $styleSheet;
    }

    /**
     * The JSON string that describes the style sheet object.
     *
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     * @return $this Fluent Builder
     */
    public function setStyleSheet(array $styleSheet): self {
        $this->options['styleSheet'] = $styleSheet;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($value !== Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Autopilot.V1.UpdateStyleSheetOptions ' . \implode(' ', $options) . ']';
    }
}