<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     */
    public function test_fail(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(404);
    }
    public function testDetailRecipe()
{
    // Prepare test data
    $recipe = factory(Recipe::class)->create();
    $ingredients = factory(Ingredient::class, 3)->create([
        'recipe_id' => $recipe->id,
    ]);
    $steps = factory(Step::class, 3)->create([
        'recipe_id' => $recipe->id,
    ]);

    // Call the method
    $response = $this->get(route('recipe.detail', [
        'recipeName' => Str::slug($recipe->title),
        'recipeId' => $recipe->id,
    ]));

    // Check the response status
    $response->assertStatus(200);

    // Check the response content
    $response->assertViewIs('detail_recipe');
    $response->assertViewHas('groupIngredients');
    $response->assertViewHas('recipe');
    $response->assertViewHas('steps');

    // Check the recipe data
    $responseData = $response->original->getData();
    $this->assertEquals($recipe->id, $responseData['recipe']->id);
    $this->assertEquals($recipe->title, $responseData['recipe']->title);
    $this->assertEquals($recipe->description, $responseData['recipe']->description);
    $this->assertEquals($recipe->image, $responseData['recipe']->image);
    $this->assertEquals($recipe->duration, $responseData['recipe']->duration);
    $this->assertEquals($recipe->servings, $responseData['recipe']->servings);

    // Check the ingredients data
    $groupIngredients = $responseData['groupIngredients'];
    $this->assertCount(1, $groupIngredients);
    $this->assertCount(3, $groupIngredients[0]);
    foreach ($ingredients as $i => $ingredient) {
        $this->assertEquals($ingredient->name, $groupIngredients[0][$i]->name);
        $this->assertEquals($ingredient->quantity, $groupIngredients[0][$i]->quantity);
        $this->assertEquals($ingredient->unit, $groupIngredients[0][$i]->unit);
        $this->assertEquals($ingredient->group, $groupIngredients[0][$i]->group);
    }

    // Check the steps data
    $this->assertCount(3, $responseData['steps']);
    foreach ($steps as $i => $step) {
        $this->assertEquals($step->id, $responseData['steps'][$i]->id);
        $this->assertEquals($step->value, $responseData['steps'][$i]->value);
        $this->assertEquals($step->images, $responseData['steps'][$i]->images);
        $this->assertEquals($step->recipe_id, $responseData['steps'][$i]->recipe_id);
    }
}
}
