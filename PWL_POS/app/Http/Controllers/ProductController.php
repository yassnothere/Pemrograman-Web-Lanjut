<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function food_beverage() {
        return view('product.category.food_beverage.index');
    }

    public function beauty_health() {
        return view('product.category.beauty_health.index');
    }

    public function home_care() {
        return view('product.category.home_care.index');
    }

    public function baby_kid() {
        return view('product.category.baby_kid.index');
    }
}
