<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Http\Controllers\betController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class betTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    use RefreshDatabase;
    
    public function testInsertBet()
    {
        $request = Request::create('/bet/insert', 'POST', [
            'bet_number' => '123',
            'bet_amount' => '500.00',
            'bet_type' => '0',
            'ticket_id' => '1234567890',
            'time_draw' => '10:00:00',
        ]);

        $betController = new betController();
        $response = $betController->insertBet($request);

        $this->assertTrue($response->isRedirect());
    }
}
