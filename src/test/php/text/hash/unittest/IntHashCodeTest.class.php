<?php namespace text\hash\unittest;

use text\hash\IntHashCode;
use unittest\{Test, TestCase, Values};
use util\Bytes;

class IntHashCodeTest extends TestCase {

  #[Test]
  public function can_create() {
    new IntHashCode(0);
  }

  #[Test]
  public function as_int() {
    $this->assertEquals(0, (new IntHashCode(0))->int());
  }

  #[Test]
  public function as_base32() {
    $this->assertEquals('cnd0ue', (new IntHashCode(427197390))->base32());
  }

  #[Test]
  public function string_cast() {
    $this->assertEquals('197683ce', (string)new IntHashCode(427197390));
  }

  #[Test, Values([[0, '00000000'], [1, '00000001'], [2130854655, '7f0242ff'],])]
  public function as_hex($hash, $expected) {
    $this->assertEquals($expected, (new IntHashCode($hash))->hex());
  }

  #[Test, Values([[0, "\0\0\0\0"], [1, "\0\0\0\1"], [2130854655, "\177\2\102\377"],])]
  public function as_bytes($hash, $expected) {
    $this->assertEquals(new Bytes($expected), (new IntHashCode($hash))->bytes());
  }

  #[Test]
  public function crc32() {
    $this->assertEquals(hash('crc32b', 'Test'), (new IntHashCode(crc32('Test')))->hex());
  }

  #[Test]
  public function string_representation() {
    $this->assertEquals('text.hash.IntHashCode(7f0242ff)', (new IntHashCode(2130854655))->toString());
  }

  #[Test]
  public function hashcode_is_hex() {
    $this->assertEquals('7f0242ff', (new IntHashCode(2130854655))->hashCode());
  }
}