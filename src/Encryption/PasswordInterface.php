<?php

namespace ialopezg\Libraries\Encryption;

use InvalidArgumentException;

/**
 * Interface that is implemented by all Password objects.
 *
 * @package ialopezg\Libraries\Security
 */
interface PasswordInterface {
    /**
     * Decrypt a password hash for a given encrypted password.
     *
     * @param string $data Encrypted data to decrypt.
     *
     * @return string The formatted password hash.
     *
     * @throws InvalidArgumentException If password provided is not a valid string.
     */
    public function decrypt($data);

    /**
     * Encrypt a plain text into cipher text.
     *
     * @param string $data The input data to encrypt.
     *
     * @return string The formatted password hash
     *
     * @throws InvalidArgumentException If password provided is not a valid string.
     */
    public function encrypt($data);

    /**
     * Create a random key.
     *
     * @param int $length       Output length.
     * @param bool $capitalize  Capitalize the result key.
     *
     * @return string A random key.
     * @throws \Exception If it was not possible to gather sufficient entropy.
     */
    public static function createKey($length, $capitalize = true);

    /**
     * Get an option value.
     *
     * @param string $key Option key name.
     * @param null $default Option default value.
     *
     * @return mixed
     */
    public function getOption($key, $default = null);

    /**
     * Set an option value.
     *
     * @param string $key Option key name.
     * @param mixed $value Option value.
     *
     * @return void
     */
    public function setOption($key, $value);
}
