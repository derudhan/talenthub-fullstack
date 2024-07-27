<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use App\Models\Category;
use App\Models\Region;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'region'])->latest()->get();

        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $randomNews = News::with('category')->inRandomOrder()->take(3)->get();
        $categories = Category::all();
        $regions = Region::all();

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'regions', 'randomNews'));
    }

    public function category($category)
    {
        $categoryModel = Category::where('name', $category)->firstOrFail();
        $paginatedNews = News::where('category_id', $categoryModel->id)->latest()->paginate(6);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $randomNews = News::with('category')->inRandomOrder()->take(3)->get();
        $categories = Category::all();
        $regions = Region::all();

        return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories', 'regions', 'randomNews'));
    }


    public function region($region)
    {
        $regionModel = Region::where('name', $region)->firstOrFail();
        $paginatedNews = News::where('region_id', $regionModel->id)->latest()->paginate(6);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $randomNews = News::with('category')->inRandomOrder()->take(3)->get();
        $categories = Category::all();
        $regions = Region::all();

        return view('user.region', compact('region', 'paginatedNews', 'popularNews', 'categories', 'regions', 'randomNews'));
    }

    public function detail($id)
    {
        $newsItem = News::with(['category', 'region'])->findOrFail($id);
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $randomNews = News::with('category')->inRandomOrder()->take(3)->get();
        $categories = Category::all();
        $regions = Region::all();
        $relatedNews = News::where('category_id', $newsItem->category_id)->where('id', '!=', $id)->take(3)->get();

        return view('user.detail', compact('newsItem', 'popularNews', 'categories', 'regions', 'relatedNews', 'randomNews'));
    }
}
