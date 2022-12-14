<?php
namespace Drupal\bible;

/**
 * Tests the functionality of the Bible module.
 */
class BibleTestCase extends DrupalWebTestCase {

  protected $privileged_user;

  public static function getInfo() {
    // Note: getInfo() strings are not translated with t().
    return array(
      'name' => 'Bible Test',
      'description' => 'Test to make sure Bible tests are loading.',
      'group' => 'Bible',
    );
  }

  public function setUp() {
    // Enable any modules required for the test. This should be an array of
    // module names.
    parent::setUp(array('bible'));
    $this->privileged_user = $this->drupalCreateUser(array(
      'access administration pages',
      'administer bible',
    ));
  }

  public function testConfigLinksArePresent() {
    $this->drupalLogin($this->privileged_user);
    $this->drupalGet('admin/config');
    $this->assertRaw('<h3>Bible module settings</h3>',
      'A configuration section for Bible is on the admin/config page');
    $this->assertLink('Configure Bible', 0,
      'The Bible configuration link appears on the page');
  }

}
