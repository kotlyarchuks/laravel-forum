<?php

namespace Tests\Feature;

use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /** @test */
    public function user_can_see_all_threads()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }

    /** @test */
    public function user_can_see_one_thread()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
    }
}
