<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BookController extends Controller
{
     public function view(){
$games = Book::get();
$buycount=DB::table('tbl_payment_details')->select(DB::raw('COUNT(*) as count'),DB::raw('product_id as product_id'))->groupBy('product_id')->get();
$rating = DB::table('post_comment')
->select(DB::raw('avg(rating) as rate'),DB::raw('book_id as book_id'),DB::raw('status as status'))
->groupBy('book_id','status')->get();

return view('pages.game.games')->with('games',$games)->with('rating',$rating)->with('buycount',$buycount);
     }

     public function fps_games(){
$games = Book::where('id','=','0')->orWhere('id','=','3')->orWhere('id','=','4')->orWhere('id','=','5')->orWhere('id','=','8')->orWhere('id','=','9')->get();
return view('pages.game.games_fps')->with('games',$games);
     }

     public function rpg_games(){
$games = Book::where('id','=','0')->orWhere('id','=','3')->orWhere('id','=','4')->orWhere('id','=','5')->orWhere('id','=','8')->orWhere('id','=','9')->orWhere('id','=','7')->orWhere('id','=','2')->get();
return view('pages.game.games_rpg')->with('games',$games);
     }

    public function rts_games(){
$games = Book::where('id','=','0')->orWhere('id','=','3')->orWhere('id','=','4')->orWhere('id','=','5')->orWhere('id','=','8')->orWhere('id','=','9')->get();
return view('pages.game.games_rts')->with('games',$games);
     }

      public function sport_games(){
$games = Book::where('id','=','25')->get();
return view('pages.game.games_sport')->with('games',$games);
     }

      public function view6(){
        $rating = DB::table('post_comment')
->select(DB::raw('avg(rating) as rate'),DB::raw('book_id as book_id'),DB::raw('status as status'))
->groupBy('book_id','status')->get();
$buycount=DB::table('tbl_payment_details')->select(DB::raw('COUNT(*) as count'),DB::raw('product_id as product_id'))->groupBy('product_id')->get();
$books = Book::orderBy('id','desc')->paginate(3);
$games =DB::table('books')->paginate(4);
return view('welcome')->with('books',$books)->with('games',$games)->with('rating',$rating)->with('buycount',$buycount );
     }

     public function chitietsach($id){
        $relative_books = Book::inRandomOrder()->limit(6)->get();
          $book = Book::find($id);
          $bookdetail =DB::table('books')->where('id',$id)->first();
          $comment=DB::table('post_comment')->where('post_comment.book_id','=',$id)->get();

          $reply_comment=DB::table('reply_comment')->get();
          $user=DB::table('users')->get();
          return view('pages.game.game',compact('bookdetail'))->with('relative_books',$relative_books)->with('comment',$comment)->with('reply_comment',$reply_comment)->with('user',$user);
     }

       public function search(){
        $buycount=DB::table('tbl_payment_details')->select(DB::raw('COUNT(*) as count'),DB::raw('product_id as product_id'))->groupBy('product_id')->get();
$rating = DB::table('post_comment')
->select(DB::raw('avg(rating) as rate'),DB::raw('book_id as book_id'),DB::raw('status as status'))
->groupBy('book_id','status')->get();
          $search_text = $_GET['country_name'];
           $games = Book::where('book_title','LIKE','%'.$search_text.'%')->get();
return view('pages.game.games',compact('games'))->with('rating',$rating)->with('buycount',$buycount)->with('success','Kết quả tìm kiếm cho từ ');
     }

      public function show_cart(){
            return view('pages.cart.show_cart');
     }

public function save_cart(Request $request){
     $relative_books = Book::paginate(4);
          $productId = $request->productid_hidden;
           $quantity =$request->qty;
           $bookdetail=DB::table('books')->where('id',$productId)->first(); 
           $data['id']=$bookdetail->id;
              $data['qty']=$quantity;
             $data['name']=$bookdetail->book_title;
             $data['price']=$bookdetail->book_price;
             $data['weight']=$bookdetail->book_price;    
             $data['options']['image']=$bookdetail->book_image;
             Cart::add($data); 
      return Redirect::to('/chitietgame.'.$bookdetail->id)->with('suss','Đã thêm vào giỏ hàng !');

     }

     public function delete_to_cart($rowId){
          Cart::update($rowId,0);
             return Redirect::to('/giohang')->with('success','Đã xóa giỏ hàng !');
     }

     public function delete_all_cart(){
        Cart::destroy();
        return Redirect::to('/giohang')->with('success','Đã xóa giỏ hàng !');
     }


     public function autocomplete_ajax(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('books')
            ->where('book_title', 'LIKE', "%{$query}%")
            ->get();
            $output = '<div class="ui relaxed divided list" style="padding:10px;font-size:2ch;" >';
            foreach($data as $row)
            {
               $output .= '
               <li class="item" >
<div class="content" >
      <a class="header"  href="chitietgame.'.$row->id .'">'.$row->book_title.'</a>
    </div>

              </li>
               ';
           }
           $output .= '</div>';
           echo $output;
       }

     }

     public function send_contact(Request $request){
        $data['email'] = $request->email;
        $data['content'] = $request->content;
          DB::table('contact')->insert($data);
          return Redirect::to('/lienhe')->with('success','');
     }
}