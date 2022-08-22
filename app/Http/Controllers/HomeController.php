<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

       public function checkout()
    {
         return view('pages.checkout.checkout');
    }

      public function save_checkout(Request $request)
    {


//payment
 $data4=array();
  $data4=$request->validate([
    'buy_name' =>'string',
    'card_name' =>'string',
     'phone_number' =>'numeric|min:10',
     'card_number' =>'numeric|min:8',
     'cvv' =>'numeric|min:3',
      ],   
     [
'buy_name.string' => 'Tên người mua không hợp lệ !',
'card_name.string' => 'Tên chủ thẻ không hợp lệ !',
'phone_number.min' => 'Số điện thoại có ít nhất 10 số !',
'phone_number.numeric' => 'Số điện thoại không hợp lệ !',
'card_number.numeric' => 'Số tài khoản phải là kiểu số !',
'card_number.min' => 'Số tài khoản tối thiểu 8 số !',
'cvv.min' => 'Mã CVV phải có 3 số !',
'cvv.numeric' => 'Mã CVV không hợp lệ !',
      ],
  );
         $data4['customer_id']=$request->customer_id; 
          $data4['buy_name']=$request->buy_name;
              $data4['card_name']=$request->card_name; 
           $data4['phone_number']=$request->phone_number; 
            $data4['card_number']=$request->card_number;    
            $data4['exp_month']=$request->exp_month;
              $data4['exp_year']=$request->exp_year;
        $data4['cvv']=$request->cvv;  
        $data4['paypal_total']=Cart::subtotal();
        $data4['paypal_status']='Đang chờ xác nhận'; 
    $payment_id =DB::table('tbl_card_payment')->insertGetId($data4);

        
//order_details

        $data3=array();
        $content= Cart::content();
        foreach($content as $v_content){
            $data3['customer_id']=$request->customer_id; 
         $data3['payment_id']=$payment_id; 
        $data3['product_id']=$v_content->id; 
        $data3['product_name']=$v_content->name;  
        $data3['product_price']=$v_content->price.' đ';  
        $data3['product_sales_quantity']=$v_content->qty;
         $order_details_id = DB::table('tbl_payment_details')->insertGetId($data3);
        } 

 //card_payment


      

Cart::destroy();
         return Redirect('/complete_payment.'.$payment_id); 
    }

    public function complete_payment($payment_id)   {
         $game = DB::table('tbl_payment_details')->join('books','books.id','=','tbl_payment_details.product_id')->where('payment_id',$payment_id)->get();
         return view('pages.checkout.complete_payment')->with('game',$game);
    }

    public function update_user(Request $request,$id){
         $data=array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         DB::table('users')->where('id',$id)->update($data);
         return Redirect::back()->withErrors(['msg' => 'Đã cập nhật thông tin tài khoản']);
    }

   public function change_pass(Request $request,$id){
    $data=array();
    $pass=DB::table('users')->where('password',$id)->get();
    if($pass= bcrypt($request->old_pass)){
        $data['password']=bcrypt($request->password);
    }
       DB::table('users')->where('id',$id)->update($data);
        return Redirect::back();
   }

   public function user_order($user_id){
     $data = DB::table('users')  
        ->join('tbl_payment_details','tbl_payment_details.customer_id','=','users.id')
        ->join('books','books.id','=','tbl_payment_details.product_id')
        ->join('tbl_card_payment','tbl_card_payment.payment_id','=','tbl_payment_details.payment_id')
        ->where('tbl_payment_details.customer_id',$user_id)->get();


    return view('pages.user.user_order')->with('data',$data);
   }


     public function load_comment(Request $request){
      $book_id=$request->book_isbn;
      $comment=DB::table('post_comment')->where('book_id',$book_id)->get();
      $output='';
      foreach($comment as $key => $comm){
        $output.=' 
    ';
      }
      echo $output;
     }

    public function post_comment(Request $request,$book_id){
        $this->middleware('auth');
        $data=array();
        $data['book_id']=$request->book_id;
        $data['user_post_id']=Auth::user()->id;
         $data['user_post_name']=Auth::user()->name;
          $data['comment_content']=$request->comment_content;   
            $data['rating']=$request->rating;
              $data['status']='0';   
    DB::table('post_comment')->insertGetId($data);

    return Redirect::to('/chitietgame.'.$book_id)->with('success','Cảm ơn bạn đã bình luận cho sản phẩm, bình luận của bạn sẽ được quản trị viên phê duyệt và phản hồi nhanh chóng <3');
    }


}

