<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker;
use App\Post;
use App\User;
use Auth;
use App\Achievements\Normie;
use App\Achievements\MemeZacetnik;

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
			$p->user_id = Auth::user()->id;
			$p->save();
			$user = User::find(Auth::user()->id);
		    if ($user->rank == "9GAG podpornik") {
		    	$user->addProgress(new Normie(), 1);
		    } elseif ($user->rank == "Normie") {
		    	$user->addProgress(new MemeZacetnik(), 1);
		    }
	    }
	    return 'Dodano ' . $num . ' objav';
    }
}
