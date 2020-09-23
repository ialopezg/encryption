<?php

namespace ialopezg\Libraries\Encryption;

use InvalidArgumentException;

use function is_string;
use function is_null;

/**
 * Class for password manipulation.
 *
 * @package ialopezg\Libraries\Encryption
 */
class Password extends AbstractPassword {
    /**
     * @param $password
     * @param $hash
     * @return false|string
     */
    public function verify($password, $hash) {
        // check if password is a string
        if (!is_string($password) || is_null($password) || empty($password)) {
            throw new InvalidArgumentException("Password parameter must be a string.");
        }
        // check if hash is a string
        if (!is_string($password) || is_null($password) || empty($password)) {
            throw new InvalidArgumentException("Hash parameter must be a string.");
        }

        return parent::decrypt($hash) === $password;
    }
}