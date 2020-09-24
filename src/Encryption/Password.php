<?php

namespace ialopezg\Libraries\Encryption;

use Exception;
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
     * Encrypt a simple text password into a ciphered password.
     *
     * @param string $password Plain text password.
     *
     * @return string Ciphered password.
     * @throws Exception If data provided is not a string.
     */
    public function hash($password) {
        return parent::encrypt($password);
    }

    /**
     * Verifies if a hashed password is equal to the plain tex provided.
     *
     * @param string $password Plain text password.
     * @param string $hash Ciphered text
     *
     * @return bool true If password equals to hash, false otherwise.
     * @throws Exception If data provided is not a string.
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