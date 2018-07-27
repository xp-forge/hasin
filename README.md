Hashing
=======

[![Build Status on TravisCI](https://secure.travis-ci.org/xp-forge/hashing.svg)](http://travis-ci.org/xp-forge/hashing)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Required PHP 5.6+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-5_6plus.png)](http://php.net/)
[![Supports PHP 7.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-7_0plus.png)](http://php.net/)
[![Supports HHVM 3.4+](https://raw.githubusercontent.com/xp-framework/web/master/static/hhvm-3_4plus.png)](http://hhvm.com/)
[![Latest Stable Version](https://poser.pugx.org/xp-forge/hashing/version.png)](https://packagist.org/packages/xp-forge/hashing)

Fluent interface to hashing functions provided by PHP, extended with Murmur3.

Examples
--------

Calculate hash for a string, output using base32:

```php
use text\hash\Hashing;

$hash= Hashing::murmur3_32()->new($seed= 0x2a);
$base32= $hash->digest('The quick brown fox jumps over the lazy dog.')->string();
```

Incrementally updating hash, output hex (much like the builtin `md5()` function does):

```php
use text\hash\Hashing;

$hash= Hashing::md5()->new();
while ($stream->available()) {
  $hash->update($stream->read());
}

$hex= $hash->digest()->hex();
```

Algorithms
----------
The following algorithms exist as shortcuts inside the entry point class:

* `Hashing::md5()`
* `Hashing::sha1()`
* `Hashing::sha256()`
* `Hashing::sha512()`
* `Hashing::murmur3_32()`

Other algorithms can be instantiated via `Hashing::algorithm(string $name, var... $args)`, which may raise an *IllegalArgumentException* if the given algorithm is not available.