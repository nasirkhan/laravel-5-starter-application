<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginTest extends TestCase
{

    public function testLoginMethod()
    {
        $this->visit('/auth/login');
        $this->seePageIs('/auth/login');
        $this->type('admin@admin.com', 'email');
        $this->type('1234', 'password');
        $this->press('Sign in');
        $this->seePageIs('/home');
    }

    public function test_failed_login()
    {
        $this->visit('/auth/login');
        $this->type('admin@admin.com', 'email');
        $this->type('password', 'password');
        $this->press('Sign in');
        $this->seePageIs('/auth/login');
        $this->see('There were some problems with your input.');
        $this->see('These credentials do not match our records.');
    }
}
