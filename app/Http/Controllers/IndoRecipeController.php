<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Category;
use App\Models\Origin;
use DB;

class IndoRecipeController extends Controller
{
     /**
     * Fungsi untuk memanggil homepage.
     * juga, resep yang tersedia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['recipes'] = Recipe::select('id', 'images', 'name')->orderBy('id', 'desc')->paginate(25, ['*'], 'recipes');
        $data['origins'] = Origin::select('id', 'name')->orderBy('id', 'desc')->paginate(25, ['*'], 'origins');
        $data['categories'] = Category::select('id', 'name')->orderBy('id', 'desc')->paginate(25, ['*'], 'categories');
        return view('home', $data);
    }
    /**
     * .
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchResult(Request $request)
    {
        $data['recipes'] = DB::table('recipes')
        ->select('id', 'name', 'images')
        ->where('name', 'like', '%'.$request->search.'%')
        ->orWhere('description', 'like', '%'.$request->search.'%')
        ->orWhereExists(function ($query) use ($request) {
            $query->select(DB::raw(1))
                  ->from('categories')
                  ->whereColumn('id', 'recipes.category_id')
                  ->where('name', 'like', '%'.$request->search.'%');
        })
        ->orWhereExists(function ($query) use ($request) {
            $query->select(DB::raw(1))
                  ->from('origins')
                  ->whereColumn('id', 'recipes.origin_id')
                  ->where('name', 'like', '%'.$request->search.'%');
        })
        ->orWhereExists(function ($query) use ($request) {
            $query->select(DB::raw(1))
                  ->from('ingredients')
                  ->whereColumn('recipe_id', 'recipes.id')
                  ->where('value', 'like', '%'.$request->search.'%');
        })
        ->orWhereExists(function ($query) use ($request) {
            $query->select(DB::raw(1))
                  ->from('steps')
                  ->whereColumn('recipe_id', 'recipes.id')
                  ->where('value', 'like', '%'.$request->search.'%');
        })
        ->orderByDesc('id')
        ->paginate(25, ['*'], 'results');
        return view('search_result', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailRecipe($recipeName,$recipeId)
    {
        $recipe = Recipe::where('id', $recipeId)->first();
        $ingredients = DB::select('select ingredients.group from ingredients where recipe_id = ? group by ingredients.group', [$recipeId]);
        $steps = DB::select('select id, value, images, recipe_id from steps where recipe_id = ?', [$recipeId]);
        $groupIngredients = [];
        foreach ($ingredients as $ingredient){
            array_push($groupIngredients, DB::select('select * from ingredients where recipe_id = ? and ingredients.group = ?', [$recipeId, $ingredient->group]));
        }
        $data['groupIngredients'] = $groupIngredients;
        $data['recipe'] = $recipe;
        $data['steps'] = $steps;
        return view('detail_recipe', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByCategory($categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        $data['recipes'] = Recipe::select('id', 'name', 'images')->where('category_id', $category->id)->paginate(25, ['*'], 'results');
        return view('search_result', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByOrigin($originId)
    {
        $origin = Origin::where('id', $originId)->first();
        $data['recipes'] = Recipe::select('id', 'name', 'images')->where('origin_id', $origin->id)->paginate(25, ['*'], 'results');
        return view('search_result', $data);
    }
}
