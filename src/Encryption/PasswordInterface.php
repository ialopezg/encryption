<?php

namespace ialopezg\Libraries\Encryption;

/**
 * Interface that is implemented by all Password objects.
 *
 * @package ialopezg\Libraries\Security
 */
interface PasswordInterface {
    /**
     * Create a random key.
     *
     * @param int $length output length.
     *
     * @return string a random key.
     * @throws \Exception if it was not possible to gather sufficient entropy.
     */
    public static function createKey($length);

    /**
     * Get an option value.
     *
     * @param string $key Option key name.
     * @param null $default Option default value.
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
