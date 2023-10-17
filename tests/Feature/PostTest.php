<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    private string $endpoint = "api/posts/";
    /**
     * A basic test example.
     */
    // public function testCreateStoreProduct(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testGetAllPost(): void
    {
        $posts = Post::factory(10)->create();

        $this->json('GET', $this->endpoint)
            ->assertSee(Post::find(random_int(1, 10))->title)
            ->assertStatus(200);
    }

    public function testPostCreate(): void
    {
        $payload = [
            'title' => 'srfgergd 123',
            'content' => 'hahahahahahaah',
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
        ];

        $this->json('POST', $this->endpoint, $payload)
            ->assertSee($payload['title'])
            ->assertStatus(200);
    }

    public function testShowPost(): void
    {
        $post = Post::factory()->create();

        $this->json('GET', $this->endpoint.$post->id)
            ->assertSee($post->title)
            ->assertStatus(200);
    }

    public function testUpdatePost(): void
    {
        $post = Post::factory()->create();
        $payload = [
            'title' => 'jfhsdjfhsk',
            'content' => 'ahahhahaah',
        ];
    
        $this->json('PATCH',$this->endpoint.$post->id, $payload)
            ->assertStatus(200)
            ->assertJson($payload);
    
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $payload['title'],
            'content' => $payload['content'],
        ]);
    }

    public function testDeletePost(): void
    {
        $post = Post::factory()->create();

        $response = $this->delete($this->endpoint.$post->id);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id
        ]);
    }
    
}
