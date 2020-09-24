<h1 style="text-align: center;">Cryptography Library</h1>

<p style="text-align: center;">
    <a href="https://github.com/ialopezg/encryption/releases"><img alt="Version" src="https://img.shields.io/github/release/ialopezg/encryption.svg?label=version&color=green"></a>
    <a href="https://github.com/ialopezg/encryption/blob/master/LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a>
    <a href="https://github.com/ialopezg/encryption"><img src="https://img.shields.io/github/downloads/ialopezg/encryption/total.svg?color=green" alt="Total downloads"></a>
</p>

Cryptography Library for PHP

**Table of Contents**

- [Installation](#installation)
- [Features](#features)
- [Requirements](#requirements)
- [Usage instructions](#usage-instructions)
- [License](#license)

## Installation

1. Package manager
    - Composer
        ```shell script
        composer require ialopezg/encryption
        ```

2. Manually
    - **Github**
        ```shell script
        git clone https://github.com/ialopezg/encryption
        ```

## Features

| Library | Description |
|---|---|
| <a href="#iteratorobject">`Password`</a> | Library for password manipulation. |


## Requirements

* **PHP** *v5.6+*
* **ext-mbstring** PHP extension
* **ext-openssl** PHP extension
* **ialopezg/core** *v0.0.1+*
* **ialopezg/logger** *v0.0.4+*

## Usage instructions

### IteratorObject

### Methods

| Method | Description |
|---|---|
| <a href="#password_createKey">`createKey()`</a> | Creates a random key with the lengh provided. Optional the result could be returned with capital letters. |
| <a href="#password_getOption">`getOption()`</a> | Gets an option value. If value does not exists will return the default value. |
| <a href="#password_hash">`hash()`</a> | Encrypts a simple text password into a ciphered password. |
| <a href="#password_setOption">`setOption()`</a> | Sets an option value. |
| <a href="#password_verify">`verify()`</a> | Encrypts a plain text into cipher text. |

#### Method Details

##### <a name="password_createKey"></a> Method: `createdKey()`

```php
/**
 * Creates a random key with the length specified. Optional the result could be returned with capital letters.
 *
 * @param int $length       Output length.
 * @param bool $capitalize  Whether if the result key will be returned with capital letters.
 *
 * @throws Exception If it was not possible to gather sufficient entropy.
 * @return string A random key.
 */
public static function createKey($length, $capitalize = false): string
```

**Examples**

```php
$key = \ialopezg\Libraries\Encryption\Password::createKey(8, true);

// Display the encryption key string
echo "Encryption key: <strong>{$key}</strong><br>";
```

##### <a name="password_getOption"></a> Method: `getOption()`

```php
/**
 * Gets an option value. If value does not exists will return the default value.
 *
 * @param string $key Option key name.
 * @param null $default Option default value.
 *
 * @return mixed
 */
public function getOption($key, $default = null): string
```

**Examples**

```php
$encrypter->setOption('key', Password::createKey(8, true);

// Display the encryption key string
echo "Encryption key: <strong>{$encrypter->getOption('key')}</strong><br>";
```

##### <a name="password_hash"></a> Method: `hash()`

```php
/**
 * Encrypts a simple text password into a ciphered password.
 * 
 * @param string $password Plain text password.
 * 
 * @return string Ciphered password.
 * @throws Exception If data provided is not a string.
 */
public function hash($password): string
```

**Examples**

```php
$encrypter = new \ialopezg\Libraries\Encryption\Password([
    'cipher' => 'AES-128-CTR',
    'digest' => 'SHA512',
    'options' => OPENSSL_CIPHER_RC2_40,
    'key' => 'YOUR_SECRET_KEY'
]);
$encrypted_password = $encrypter->encrypt($password);

// Display the encrypted string
echo "Encrypted password: <strong>{$encrypted_password}</strong><br>";
```

##### <a name="password_setOption"></a> Method: `setOption()`

```php
/**
 * Sets an option value.
 *
 * @param string $key Option key name.
 * @param mixed $value Option value.
 *
 * @return void
 */
public function setOption($key, $value): string
```

**Examples**

```php
$encrypter = new \ialopezg\Libraries\Encryption\Password();
$encrypter->setOption('key', $key);
```

##### <a name="password_verify"></a> Method: `verify()`

```php
/**
 * Verifies if a hashed password is equal to the plain tex provided.
 *
 * @param string $password Plain text password.
 * @param string $hash Ciphered text
 *
 * @return bool true If password equals to hash, false otherwise.
 * @throws Exception If data provided is not a string.
 */
public function verify($password, $hash): bool
```

**Examples**

```php
$encrypter = new \ialopezg\Libraries\Encryption\Password();

$password = 'YOUR_PASSWORD';
$encrypted_password = 'YOUR_ENCRYPTED_PASSWORD';

// Display the encrypted string
echo 'Password are equals: <strong>' . ($encrypter->verify($password, $encrypted_password) ? 'true' : 'false') . '</strong>';
```

For more examples or options, see [examples](examples) directory. For live examples, run:

```shell script
### linux bash
./server.sh
``` 
or
```shell script
### windows prompt
server.bat
``` 

## License

This project is under the MIT license. For more information see [LICENSE](https://github.com/ialopezg/core/blob/master/LICENSE).

Copyright (c) [Isidro A. López G.](https://ialopezg.com/)
