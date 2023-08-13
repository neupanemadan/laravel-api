<?php

namespace Tests\Unit;

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Mockery;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    
    public function testShow()
    {
        $mockedTask = Mockery::mock(Task::class);
        $mockedTask->shouldReceive('find')->with(1)->andReturn(null);
    
        $controller = new TaskController($mockedTask);
        $response = $controller->show(1);
    
        $responseData = $response->getData();
    
        $this->assertSame('success', $responseData->status);
        $this->assertNull($responseData->task);
    }
}

