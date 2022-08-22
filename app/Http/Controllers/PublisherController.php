<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Book;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PublisherController extends Controller
{
	   public function publishersindex()
    {
     $publisher = Publisher::get();
     $game = Book::get();
return view('pages.publisher.game_publishers')->with('publisher',$publisher)->with('game',$game);
    }


      public function publisherbooks($id)
    {   
    	$publisher = Publisher::where('publisherid',$id)->get();
          $books =DB::table('books')->where('publisherid',$id)->get();
          return view('pages.publisher.publisherbooks',compact('books','publisher'));
    }
}