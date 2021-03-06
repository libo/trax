<?php
/**
 *  File for the FormOptionsHelperTest class
 *
 * (PHP 5)
 *
 * @package PHPonTraxTest
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright (c) Walter O. Haas 2006
 * @version $Id$
 * @author Walt Haas <haas@xmission.com>
 */

echo "testing FormOptionsHelper\n";
require_once 'testenv.php';

// Call FormOptionsHelperTest::main() if this source file is executed directly.
if (!defined("PHPUnit2_MAIN_METHOD")) {
    define("PHPUnit2_MAIN_METHOD", "FormOptionsHelperTest::main");
}

require_once "PHPUnit2/Framework/TestCase.php";
require_once "PHPUnit2/Framework/TestSuite.php";

// You may remove the following line when all tests have been implemented.
require_once "PHPUnit2/Framework/IncompleteTestError.php";

require_once "action_view/helpers.php";
require_once "action_view/helpers/form_helper.php";
require_once "action_view/helpers/form_options_helper.php";

/**
 * Test class for FormOptionsHelper.
 * Generated by PHPUnit2_Util_Skeleton on 2006-03-01 at 13:17:32.
 */
class FormOptionsHelperTest extends PHPUnit2_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit2/TextUI/TestRunner.php";

        $suite  = new PHPUnit2_Framework_TestSuite("FormOptionsHelperTest");
        $result = PHPUnit2_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
    }

    /**
     *  @todo Write test for add_options()
     */
    public function testAdd_options() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for country_options_for_select()
     */
    public function testCountry_options_for_select() {

        //  Spot check a few countries
        $fo = new FormOptionsHelper;
        $countries = $fo->country_options_for_select();
        $this->assertContains('Bangladesh', $countries);
        $this->assertContains('Canada', $countries);
        $this->assertContains('Ecuador', $countries);
        $this->assertContains('France', $countries);

        //  Select a country
        $fo = new FormOptionsHelper;
        $countries = $fo->country_options_for_select(17);
        $this->assertContains('value="17" selected="selected"', $countries);

        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  Test the options_for_select() method
     */
    public function testOptions_for_select_method() {

        //  Test choices with none selected
        $fo = new FormOptionsHelper;
        $this->assertEquals('<option value="0">foo</option>' . "\n"
                            . '<option value="1">bar</option>',
                            $fo->options_for_select(array('foo','bar')));

        //  Test choices with one selected
        $fo = new FormOptionsHelper;
        $this->assertEquals('<option value="0">mumble</option>' . "\n"
                  . '<option value="1" selected="selected">grumble</option>',
                  $fo->options_for_select(array('mumble','grumble'),1));
    }

    /**
     *  @todo Write test for options_from_collection_for_select()
     */
    public function testOptions_from_collection_for_select() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for to_collection_select_tag()
     */
    public function testTo_collection_select_tag() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for to_country_select_tag()
     */
    public function testTo_country_select_tag() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for to_select_tag()
     */
    public function testTo_select_tag() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for collection_select()
     */
    public function testCollection_select() {
        echo collection_select(null,null,null,null,null);
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  @todo Write test for country_select()
     */
    public function testCountry_select() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     *  Test options_for_select() function
     */
    public function testOptions_for_select_function() {

        //  Test choices with none selected
        $this->assertEquals('<option value="0">foo</option>' . "\n"
                            . '<option value="1">bar</option>',
                            options_for_select(array('foo','bar')));

        //  Test choices with one selected by key
        $this->assertEquals('<option value="M">mumble</option>' . "\n"
                  . '<option value="G" selected="selected">grumble</option>',
                  options_for_select(array('M' => 'mumble',
                                           'G' => 'grumble'),'G'));
    }

    /**
     *  @todo Write test for select()
     */
    public function testSelect() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }
}

// Call FormOptionsHelperTest::main() if this source file is executed directly.
if (PHPUnit2_MAIN_METHOD == "FormOptionsHelperTest::main") {
    FormOptionsHelperTest::main();
}

// -- set Emacs parameters --
// Local variables:
// tab-width: 4
// c-basic-offset: 4
// c-hanging-comment-ender-p: nil
// indent-tabs-mode: nil
// End:
?>
