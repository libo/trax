<?php
/**
 *  File for the AssetTagHelperTest class
 *
 * (PHP 5)
 *
 * @package PHPonTraxTest
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright (c) Walter O. Haas 2006
 * @version $Id$
 * @author Walt Haas <haas@xmission.com>
 */

echo "testing AssetTagHelper\n";

// Call AssetTagHelperTest::main() if this source file is executed directly.
if (!defined("PHPUnit2_MAIN_METHOD")) {
    define("PHPUnit2_MAIN_METHOD", "AssetTagHelperTest::main");
}

require_once "PHPUnit2/Framework/TestCase.php";
require_once "PHPUnit2/Framework/TestSuite.php";

// You may remove the following line when all tests have been implemented.
require_once "PHPUnit2/Framework/IncompleteTestError.php";

//  root Trax files in the test directory
define("TRAX_ROOT", dirname(__FILE__) . "/");
require_once 'testenv.php';
Trax::$public_path = dirname(__FILE__) . "/public";
Trax::$url_prefix = "/testprefix";

require_once "action_view/helpers.php";
require_once "inflector.php";
require_once "action_view/helpers/url_helper.php";
require_once "action_view/helpers/asset_tag_helper.php";
require_once "trax_exceptions.php";

//  parameters need by UrlHelper
$_SERVER['HTTP_HOST'] = 'www.example.com';
$_SERVER['SERVER_PORT'] = '80';

//  referenced by the AssetTagHelper constructor
$GLOBALS['JAVASCRIPT_DEFAULT_SOURCES'] = array('this', 'that');

/**
 * Test class for AssetTagHelper.
 * Generated by PHPUnit2_Util_Skeleton on 2006-03-01 at 13:17:32.
 */
class AssetTagHelperTest extends PHPUnit2_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit2/TextUI/TestRunner.php";

        $suite  = new PHPUnit2_Framework_TestSuite("AssetTagHelperTest");
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
     *  Test __construct() method
     *
     *  Test the {@link AssetTagHelper::__construct()} method
     */
    public function test__construct() {
        $ath = new AssetTagHelper;        
        $this->assertTrue(is_object($ath));
        $this->assertEquals('AssetTagHelper', get_class($ath));
        $this->assertEquals(array('this','that'),
                            $ath->javascript_default_sources);        
    }

    /**
     *  Test javascript_path() method
     *
     *  Test the {@link AssetTagHelper::javascript_path()} method
     */
    public function testJavascript_path() {
        $ath = new AssetTagHelper;
        $this->assertEquals('/testprefix/javascripts/foo.js',
                           $ath->javascript_path('foo'));
        $this->assertEquals('/testprefix/javascripts/foo.bar',
                           $ath->javascript_path('foo.bar'));
        $this->assertEquals('/testprefix/foo.js',
                           $ath->javascript_path('/foo'));
        $this->assertEquals('http://foo/bar',
                           $ath->javascript_path('http://foo/bar'));
    }

    /**
     *  Test javascript_include_tag() method
     *
     *  Test the {@link AssetTagHelper::javascript_include_tag()} method
     */
    public function testJavascript_include_tag_method() {
        $ath = new AssetTagHelper;
        $this->assertEquals("<script src=\"/testprefix/javascripts/foo.js\""
                            . " type=\"text/javascript\"></script>\n",
                           $ath->javascript_include_tag('foo'));
        $this->assertEquals("<script src=\"/testprefix/javascripts/foo.js\""
                            . " type=\"text/javascript\"></script>\n"
                            . "<script src=\"/testprefix/javascripts/bar.js\""
                            . " type=\"text/javascript\"></script>\n",
                            $ath->javascript_include_tag('foo','bar'));
        $this->assertEquals("<script src=\"/testprefix/javascripts/this.js\""
                            . " type=\"text/javascript\"></script>\n"
                            . "<script src=\"/testprefix/javascripts/that.js\""
                            . " type=\"text/javascript\"></script>\n"
                    . "<script src=\"/testprefix/javascripts/application.js\""
                            . " type=\"text/javascript\"></script>\n",
                            $ath->javascript_include_tag('defaults'));
    }

    /**
     *  Test the javascript_include_tag() function
     *
     *  Test the {@link javascript_include_tag()} function in
     *  procedural file {@link asset_tag_helper.php}
     */
    public function testJavascript_include_tag_function() {
        $this->assertEquals("<script src=\"/testprefix/javascripts/foo.js\""
                            . " type=\"text/javascript\"></script>\n",
                            javascript_include_tag('foo'));
    }

    /**
     *  Test stylesheet_path() method
     *
     *  Test the {@link AssetTagHelper::stylesheet_path()} method
     */
    public function testStylesheet_path() {
        $ath = new AssetTagHelper;
        $this->assertEquals('/testprefix/stylesheets/foo.css',
                           $ath->stylesheet_path('foo'));
        $this->assertEquals('/testprefix/stylesheets/foo.bar',
                           $ath->stylesheet_path('foo.bar'));
        $this->assertEquals('/testprefix/foo.css',
                           $ath->stylesheet_path('/foo'));
        $this->assertEquals('http://foo/bar',
                           $ath->stylesheet_path('http://foo/bar'));
    }

    /**
     *  Test stylesheet_link_tag() method
     *
     *  Test the {@link AssetTagHelper::stylesheet_link_tag()} method
     */
    public function testStylesheet_link_tag_method() {
        $ath = new AssetTagHelper;
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/css" />'."\n",
                            $ath->stylesheet_link_tag("foo"));
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/css" />'."\n"
                            . '<link href="/testprefix/stylesheets/bar.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/css" />'."\n",
                            $ath->stylesheet_link_tag("foo","bar"));
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="screen" rel="Screenstyle"'
                            . ' type="text/css" />'."\n",
                            $ath->stylesheet_link_tag("foo",
                                            array("rel"=>"Screenstyle")));
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="all" rel="Stylesheet"'
                            . ' type="text/css" />'."\n",
                            $ath->stylesheet_link_tag("foo",
                                                array("media"=>"all")));
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/plain" />'."\n",
                            $ath->stylesheet_link_tag("foo",
                                       array("type"=>"text/plain")));
        $this->assertEquals('<link href="/bar/mumble.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/css" />'."\n",
                            $ath->stylesheet_link_tag("foo",
                                       array("href"=>"/bar/mumble.css")));
    }

    /**
     *  Test stylesheet_link_tag() function
     *
     *  Test the {@link stylesheet_link_tag()} function in procedural
     *  file {@link asset_tag_helper.php}
     */
    public function testStylesheet_link_tag_function() {
        $this->assertEquals('<link href="/testprefix/stylesheets/foo.css"'
                            . ' media="screen" rel="Stylesheet"'
                            . ' type="text/css" />'."\n",
                            stylesheet_link_tag("foo"));
    }

    /**
     *  Test image_path() method
     *
     *  Test the {@link AssetTagHelper::image_path()} method
     */
    public function testImage_path() {
        $ath = new AssetTagHelper;
        $this->assertEquals('/testprefix/images/foo.png',
                           $ath->image_path('foo'));
        $this->assertEquals('/testprefix/images/foo.bar',
                           $ath->image_path('foo.bar'));
        $this->assertEquals('/testprefix/foo.png',
                           $ath->image_path('/foo'));
        $this->assertEquals('http://foo/bar',
                           $ath->image_path('http://foo/bar'));
    }

    /**
     *  Test image_tag() method
     *
     *  Test the {@link AssetTagHelper::image_tag()} method
     */
    public function testImage_tag_method() {
        $ath = new AssetTagHelper;
        $this->assertEquals('<img alt="Foo"'
                            . ' src="/testprefix/images/foo.png" />'."\n",
                           $ath->image_tag('foo'));
        $this->assertEquals('<img alt="Bar"'
                            . ' src="/testprefix/images/foo.png" />'."\n",
                            $ath->image_tag('foo', array('alt' => 'Bar')));
        $this->assertEquals('<img alt="Foo" height="45"'
                            . ' src="/testprefix/images/foo.png"'
                            . ' width="30" />'."\n",
                            $ath->image_tag('foo', array('width' => '30',
                                                         'height' => '45')));
        $this->assertEquals('<img alt="Foo" height="45"'
                            . ' src="/testprefix/images/foo.png"'
                            . ' width="30" />'."\n",
                            $ath->image_tag('foo', array('size' => '30x45')));
    }

    /**
     *  Test the image_tag() function
     *
     *  Test the {@link image_tag()} function in procedural file
     *  {@link asset_helper.php}
     */
    public function testImage_tag_function() {
        $this->assertEquals('<img alt="Foo"'
                            . ' src="/testprefix/images/foo.png" />'."\n",
                           image_tag('foo'));
    }

    /**
     * @todo Implement testAuto_discovery_link_tag_method().
     */
    public function testAuto_discovery_link_tag_method() {
        $ath = new AssetTagHelper;
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }

    /**
     * @todo Implement testAuto_discovery_link_tag_function().
     */
    public function testAuto_discovery_link_tag_function() {
        // Remove the following line when you implement this test.
        throw new PHPUnit2_Framework_IncompleteTestError;
    }
}

// Call AssetTagHelperTest::main() if this source file is executed directly.
if (PHPUnit2_MAIN_METHOD == "AssetTagHelperTest::main") {
    AssetTagHelperTest::main();
}

// -- set Emacs parameters --
// Local variables:
// tab-width: 4
// c-basic-offset: 4
// c-hanging-comment-ender-p: nil
// indent-tabs-mode: nil
// End:
?>
