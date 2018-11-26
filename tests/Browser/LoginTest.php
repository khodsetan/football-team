<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group login
     */
    public function testCanLogin (){
        $this->browse( function( Browser $browser ){
        $user = factory(User::class)->create();
           $browser->visit('/login')
                   ->type('email',$user->email)
                   ->type('password','secret')
                   ->press('Login')
                   ->assertPathIs('/home');
        });
    }
}
