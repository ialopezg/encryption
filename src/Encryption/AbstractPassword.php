<?php


namespace ialopezg\Libraries\Encryption;

use Exception;
use InvalidArgumentException;
use Traversable;

use ialopezg\Core\IteratorObject;

use function base64_encode;
use function extension_loaded;
use function ini_get;
use function is_array;
use function is_null;
use function key_exists;
use function mb_strlen;
use function openssl_encrypt;
use function openssl_random_pseudo_bytes;
use function strlen;
use function strtoupper;

use const OPENSSL_CIPHER_RC2_40;

/**
 * Base class for password encryption and manipulation.
 *
 * @package ialopezg\Libraries\Encryption
 */
abstract class AbstractPassword implements PasswordInterface {
    /** @var int Algorithm cost. */
    protected $options = [];

    /**
     * Class constructor.
     *
     * @param	array	$params	Configuration parameters.
     */
    public function __construct($params = []) {
        if (!empty($params)) {
            if ($params instanceof Traversable) {
                $params = IteratorObject::toArray($params);
            }

            if (!is_array($params)) {
                throw new InvalidArgumentException('The options parameter must be an array or a Traversable object.');
            }

            foreach ($params as $key => $value) {
                $this->options[$key] = $value;
            }
        }
    }

    /**
     * @inheritDoc
     */
    public static function createKey($length, $capitalize = true) {
        $result = base64_encode(openssl_random_pseudo_bytes($length));
        if ($capitalize) {
            $result = strtoupper($result);
        }

        return $result;
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidArgumentException|Exception If data provided is not a valid string.
     */
    public function decrypt($data) {
        // check if data is a string
        if (!is_string($data)) {
            throw new InvalidArgumentException('The data parameter must be a string.');
        }

        return openssl_decrypt(
            $data,
            $this->getOption('cipher'),
            $this->getOption('encryption_key'),
            $this->getOption('options'),
            $this->getOption('iv'));
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidArgumentException|Exception If data provided is not a valid string.
     */
    public function encrypt($data) {
        // check if data is a string
        if (!is_string($data)) {
            throw new InvalidArgumentException('The data parameter must be a string.');
        }

        // get cipher method
        $cipher = $this->getOption('cipher', 'AES-128-CTR');

        // get OpenSSl encryption method length
        $iv_length = openssl_cipher_iv_length($cipher);

        // get iv
        $this->setOption('iv', $iv = openssl_random_pseudo_bytes($iv_length));

        // get key
        $key = $this->getOption('key', 'auto');
        if ($key === 'auto') {
            self::strlen($key) || $key = self::createKey($this->getOption('length'));
        }
        // get digest method
        $digest = $this->getOption('digest', 'SHA512');

        // encrypt key
        $this->setOption('encryption_key', $encryption_key = openssl_digest($key, $digest, true));

        // get OpenSSL options
        $options = $this->getOption('options', OPENSSL_CIPHER_RC2_40);

        // process and return result value
        return openssl_encrypt($data, $cipher, $encryption_key, $options, $iv);
    }

    /**
     * @inheritDoc
     */
    public function getOption($key, $default = null) {
        if (!key_exists($key, $this->options)) {
            return $default;
        }

        return $this->options[$key];
    }

    /**
     * @inheritDoc
     */
    public function setOption($key, $value) {
        if (is_null($value)) {
            unset($this->options[$key]);
        } else {
            $this->options[$key] = $value;
        }

        return $this;
    }

    /**
     * Get string length.
     *
     * @param string $str The string being checked for length.
     *
     * @return int The number of characters in string.
     */
    public static function strlen($str) {
        return extension_loaded('mbstring') && ini_get('mbstring.func_overload')
            ? mb_strlen($str, '8bit')
            : strlen($str);
    }
}