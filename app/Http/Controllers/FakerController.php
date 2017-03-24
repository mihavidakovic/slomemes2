<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker;
use App\Post;
class FakerController extends Controller
{
    public function addPosts($num) {
		$faker = Faker\Factory::create();

		$velikosti = [400, 500, 600, 700, 800];
		$type = ['technics', 'cats', 'nature', 'abstract', 'animals', 'business', 'nightlife', 'food'];
		

	    for ($i = 0; $i < $num; $i++) {
			$width = array_rand($velikosti,1);
			$height = array_rand($velikosti,1);
			$rand_type = array_rand($type,1);
			$p = new Post;
			$p->title = $faker->realText($maxNbChars = 120, $indexSize = 5);
			$p->url = $faker->imageUrl($velikosti[$width], $velikosti[$height], $type[$rand_type]);
			$p->user_id = 1;
			$p->save();
	    }
    }
}
