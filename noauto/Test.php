<?php

use COREPOS\pos\lib\FormLib;

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new StripeDotCom();
    }

    public function testParser()
    {
        $p = new StripeParser();
        $this->assertEquals(true, $p->check('BITCOIN'));
        $json = $p->parse('BITCOIN');
        $this->assertNotEquals(false, strstr($json['main_frame'], 'StripeAmountPage'));
    }

    public function testPages()
    {
        $page = new StripeAmountPage();
        $this->assertEquals(true, $page->preprocess());
        FormLib::set('reginput', 'CL');
        $this->assertEquals(false, $page->preprocess());
        FormLib::set('reginput', '');
        $this->assertEquals(false, $page->preprocess());
        FormLib::set('reginput', 'FOO');
        $this->assertEquals(true, $page->preprocess());
        FormLib::set('reginput', '1');
        $this->assertEquals(false, $page->preprocess());
        FormLib::clear();
        ob_start();
        $page->body_content();
        ob_get_clean();

        $page = new StripePaymentPage();
        $this->assertEquals(true, $page->preprocess());
        ob_start();
        $page->head_content();
        $page->body_content();
        ob_get_clean();
    }
}

