<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function task_index_page_loads(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('admin.tasks.index'));
        $response->assertOk();
    }

    /** @test */
    public function task_create_page_loads(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('admin.tasks.create'));
        $response->assertOk();
    }

    /** @test */
    public function task_edit_page_loads(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.tasks.edit', $task->id));
        $response->assertOk();
    }

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.tasks.store'), [
            'title'       => 'Test Task',
            'description' => 'This is a test description',
            'status'      => 'pending',
            'priority'    => 'medium',
            'due_date'    => now()->addDays(5),
        ]);

        $response->assertRedirect(route('admin.tasks.index'));
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
    }

    /** @test */
    public function a_user_can_update_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->put(route('admin.tasks.update', $task->id), [
            'title'       => 'Updated Task',
            'description' => 'Updated description',
            'status'      => 'completed',
            'priority'    => 'high',
            'due_date'    => now()->addDays(10),
        ]);

        $response->assertRedirect(route('admin.tasks.index'));
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task', 'status' => 'completed']);
    }

    /** @test */
    public function a_user_can_delete_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.tasks.destroy', $task->id));

        $response->assertRedirect(route('admin.tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /** @test */
    public function validation_fails_if_title_is_missing()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.tasks.store'), [
            'title'       => '',
            'status'      => 'pending',
            'priority'    => 'medium',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function task_is_overdue_when_due_date_is_past_and_not_completed()
    {
        $task = Task::factory()
            ->pending()
            ->create(['due_date' => now()->subDay()]);

        $this->assertTrue($task->is_overdue);
    }

    /** @test */
    public function completed_task_is_not_overdue_even_if_due_date_is_past()
    {
        $task = Task::factory()
            ->completed()
            ->create(['due_date' => now()->subDay()]);

        $this->assertFalse($task->is_overdue);
    }

}
