<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class betTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function bet_test()
    {

        $betData = [
            'ticket_id' => 1000,
            'bet_number' => 100,
            'bet_amount' => 10,
            'bet_type' => 0,
            'time_draw' => "10:00:00",
        ];

        $response = $this->get('/insertBet', $betData);

        $response->assertStatus(200);
    }
}
