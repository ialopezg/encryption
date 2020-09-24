<?php

namespace ialopezg\Libraries\Encryption;

use Exception;
use InvalidArgumentException;

/**
 * Interface that is implemented by all Password objects.
 *
 * @package ialopezg\Libraries\Security
 */
interface PasswordInterface {
    /**
     * Creates a random key with the length specified. Optional the result could be returned with capital letters.
     *
     * @param int $length       Output length.
     * @param bool $capitalize  Whether if the result key will be returned with capital letters.
     *
     * @throws Exception If it was not possible to gather sufficient entropy.
     * @return string A random key.
     */
    public static function createKey($length, $capitalize = false);

    /**
     * Decrypts cipher data into plain text data.
     *
     * @param string $data Encrypted data to decrypt.
     *
     * @return string The formatted password hash.
     *
     * @throws InvalidArgumentException If password provided is not a valid string.
     */
    public function decrypt($data);

    /**
     * Encrypts a plain text into cipher text.
     *
     * @param string $data The input data to encrypt.
     *
     * @return string The formatted password hash
     *
     * @throws InvalidArgumentException If password provided is not a valid string.
     */
    public function encrypt($data);

    /**
     * Gets an option value. If value does not exists will return the default value.
     *
     * @param string $key Option key name.
     * @param null $default Option default value.
     *
     * @return mixed
     */
    public function getOption($key, $default = null);

    /**
     * Sets an option value.
     *
     * @param string $key Option key name.
     * @param mixed $value Option value.
     *
     * @return void
     */
    public function setOption($key, $value);
}
