<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Social;
use App\Login;
use Socialite;
session_start();
use Carbon\Carbon;

class AdminController extends Controller
{
 public function admin_home(){
    $gamestotal= DB::table('books')->count();
     $ordertotal= DB::table('tbl_card_payment')->count();
      $usertotal= DB::table('users')->count();
    return view('admin.admin_home')->with('gamestotal',$gamestotal)->with('ordertotal',$ordertotal)->with('usertotal',$usertotal);
 }

    public function loginindex(){
        return view('admin.login.login');
    }

    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('/admin_dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function logout(){
         $this ->AuthLogin();
         Session::put('admin_name',null);
         Session::put('id',null);
         return Redirect::to('/admin');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password= md5($request->admin_password);
        $result= DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
           Session::put('admin_name',$result->admin_name);
           Session::put('id',$result->id);
            return Redirect::to('/show_table.1');
        }else{
            return Redirect::to('/admin')->with('error','Tên tài khoản hoặc mật khẩu bị sai !');
        }
    }


       public function show_table(){
          $this ->AuthLogin();
$publisherid = DB::table('publishers')->orderBy('publisherid','desc')->get();

        $allbooks = Book::join('publishers','publishers.publisherid','=','books.publisherid')->orderBy('books.id','desc')->paginate(6);
        return view('admin.show_table')->with('allbooks',$allbooks)->with('publisherid',$publisherid);
     }

      public function show_publisher(){
          $this ->AuthLogin();
        $allpublishers = DB::table('publishers')->orderBy('publisherid','desc')->paginate(6);
        return view('admin.show_publisher')->with('allpublishers',$allpublishers);
     }


 

     public function save_book(Request $request){
      $data=array();
       $data=$request->validate([
     'book_title' =>'unique:books',
     'video' =>'mimes:mp4|max:30000',
     'book_image' =>'mimes:jpg,png',
      ],   
     [
'book_title.unique' => 'Tên sản phẩm đã tồn tại !',
'video.max' => 'Dung lượng video tối đa 30MB',
'video.mimes' => 'Chỉ áp dụng video định dạng mp4',
'book_image.mimes' => 'Ảnh không hợp lệ',
      ],
  );
        $data['book_title']=$request->book_title;
        $data['book_author']=$request->book_author;
        $data['book_descr']=$request->book_descr;
        $data['book_price']=$request->book_price;
         $data['publisherid']=$request->publisherid;
         $get_image= $request-> file('book_image');
            $get_game_file= $request-> file('game_file');
              $get_game_video= $request-> file('video');
        if ($get_image && $get_game_file && $get_game_video) {
             $new_image = $data['book_title'].'.'.$get_image->getClientOriginalExtension();
             $get_image->move('resources/img/',$new_image);
             $data['book_image']= $new_image;

              $new_game = $data['book_title'].'.'.$get_game_file->getClientOriginalExtension();
             $get_game_file->move('resources/games/',$new_game);
             $data['game_file']= $new_game;

              $new_video = $data['book_title'].'.'.$get_game_video->getClientOriginalExtension();
             $get_game_video->move('resources/videos/',$new_video);
             $data['video']= $new_video;

              DB::table('books')->insert($data);
                return Redirect::to('/show_table.1')->with('success','Thêm sản phẩm thành công !');
         } 
         $data['book_image']= '';
          $data['game_file']= '';
         DB::table('books')->insert($data);
           return Redirect::to('/show_table.1')->with('success','Thêm sản phẩm thành công !');

     }


     public function save_publisher(Request $request){
        $data['publisher_name']=$request->publisher_name;
         $data=$request->validate([
     'publisher_name' =>'unique:publishers',
      ],   
     [
'publisher_name.unique' => 'Tên nhà phát hành đã tồn tại !',
      ],
  );
        $get_image= $request->file('image');
        if ($get_image) {
             $new_image =rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('resources/img/',$new_image);
             $data['image']= $new_image;
              DB::table('publishers')->insert($data);
              return Redirect::to('/show_publisher')->with('success','Đã thêm nhà phát hành mới !');
         } 

          $data['image']= '';
          DB::table('publishers')->insert($data);
        return Redirect::to('/show_publisher')->with('success','Đã thêm nhà phát hành mới !');
            
     }


     
      public function edit_book($book_id,$publisher_id){
         $this ->AuthLogin();
          $allbooks = Book::join('publishers','publishers.publisherid','=','books.publisherid')->where('books.id',$book_id)->orderBy('books.publisherid')->get();
$pub = DB::table('publishers')->orderBy('publisherid','desc')->get();
    
        return view('admin.edit_book')->with('allbooks',$allbooks)->with('pub',$pub); 
     }

     public function edit_publisher($publisher_id){
         $this ->AuthLogin();
          $allpublishers = DB::table('publishers')->where('publisherid',$publisher_id)->orderBy('publisherid')->get();
    
        return view('admin.edit_publisher')->with('allpublishers',$allpublishers); 
     }

     public function update_publisher(Request $request,$publisher_id){
         $data=array();
         $data['publisher_name']=$request->publisher_name;
         $get_image= $request->file('image');
        if ($get_image) {
             $new_image =rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('resources/img/',$new_image);
             $data['image']= $new_image;
              DB::table('publishers')->where('publisherid',$publisher_id)->update($data);
              return Redirect::to('/show_publisher')->with('success','Cập nhật nhà phát hành thành công !');
         } 

$data=$request->validate([
     'publisher_name' =>'unique:publishers',
      ],   
     [
'publisher_name.unique' => 'Tên nhà xuất bản đã tồn tại !',
      ],
  );

         DB::table('publishers')->where('publisherid',$publisher_id)->update($data);
        return Redirect::to('/show_publisher')->with('success','Cập nhật nhà xuất bản thành công !');
    
     }

     public function update_book(Request $request,$book_id){
         $data=array();
         $data=$request->validate([
     
     'video' =>'mimes:mp4|max:30000',
     'book_image' =>'mimes:jpg,png',
      ],   
     [

'video.mimes' => 'Chỉ áp dụng video định dạng mp4',
'video.max' => 'Video không được quá 30MB',
'book_image.mimes' => 'Ảnh không hợp lệ',
      ],
  );
     
        $data['book_title']=$request->book_title;
        $data['book_author']=$request->book_author;
        $data['book_descr']=$request->book_descr;
        $data['book_price']=$request->book_price;
         $data['publisherid']=$request->publisherid;
         $get_image= $request-> file('book_image');
         $get_video= $request-> file('video');
         $get_game= $request-> file('game');
        if ($get_image) {
             $new_image =$data['book_title'].'.'.$get_image->getClientOriginalExtension();
             $get_image->move('resources/img/',$new_image);
             $data['book_image']= $new_image;

              DB::table('books')->where('id',$book_id)->update($data);
              return Redirect::to('/show_table.1')->with('success','Cập nhật sản phẩm thành công !');;
         }
         else if($get_video){
            $new_video =$data['book_title'].'.'.$get_video->getClientOriginalExtension();
             $get_video->move('resources/videos/',$new_video);
             $data['video']= $new_video;

              DB::table('books')->where('id',$book_id)->update($data);
              return Redirect::to('/show_table.1')->with('success','Cập nhật sản phẩm thành công !');;
         } 

          else if($get_game){
            $new_game =$data['book_title'].'.'.$get_game->getClientOriginalExtension();
             $get_game->move('video/',$new_game);
             $data['game_file']= $new_game;

              DB::table('books')->where('id',$book_id)->update($data);
              return Redirect::to('/show_table.1')->with('success','Cập nhật sản phẩm thành công !');;
         }     
         DB::table('books')->where('id',$book_id)->update($data);
        return Redirect::to('/show_table.1')->with('success','Cập nhật sản phẩm thành công !');;
    
     }

     public function delete_publisher($publisher_id){
       DB::table('publishers')->where('publisherid',$publisher_id)->delete();
       return Redirect::to('/show_publisher')->with('success','Xóa nhà phát hành thành công !');
     }

     public function delete_book_table1($book_id){
       DB::table('books')->where('id',$book_id)->delete();
       return Redirect::to('/show_table.1')->with('success','Xóa sản phẩm thành công !');
     }


     public function order_manager(){
         $this ->AuthLogin();
        $allbooks = DB::table('tbl_card_payment')->orderBy('tbl_card_payment.payment_id','desc')->simplePaginate(20);
        return view('admin.order_manager')->with('allbooks',$allbooks);
     }

      public function view_order($payment_id){
         $this ->AuthLogin();
        $data1 = DB::table('tbl_card_payment')
        ->join('users','tbl_card_payment.customer_id','=','users.id')
        ->join('tbl_payment_details','tbl_card_payment.payment_id','=','tbl_payment_details.payment_id')
        ->where('tbl_card_payment.payment_id',$payment_id)->get();
         
         
        return view('admin.view_detail_order')->with('data1',$data1);
     }


  public function delete_order($payment_id){
       DB::table('tbl_card_payment')->where('payment_id',$payment_id)->delete();
       return Redirect::to('/order')->with('success','Xóa đơn hàng thành công !');
     }
    

    
     public function view_comment(){
        $allcomments= DB::table('post_comment')->join('books','post_comment.book_id','=','books.id')->get();
        $comments =DB::table('reply_comment')->get();
        return view('admin.show_comment')->with('allcomments',$allcomments)->with('comments',$comments);
     }

     public function reply_comment(Request $request){
         $data=array();
         $data['admin_id']= Session::get('id');
          $data['comment_id']=$request->comment_id;
        $data['reply_comment_content']=$request->reply_comment_content;
    DB::table('reply_comment')->insertGetId($data);

    return Redirect::to('/xembinhluan')->with('success','Đã trả lời bình luận');
     }

     public function check_comment($comment_id){
        $data=array();
         $data['status']= '1';
          DB::table('post_comment')
     ->where('comment_id',$comment_id)
     ->update($data);
              return Redirect::to('/xembinhluan')->with('success','Đã phê duyệt bình luận');
     }

     public function uncheck_comment($comment_id){
        $data=array();
         $data['status']= '0';
          DB::table('post_comment')
     ->where('comment_id',$comment_id)
     ->update($data);
              return Redirect::to('/xembinhluan')->with('success','Đã hủy chọn phê duyệt bình luận');
     }

     public function delete_comment($comment_id){
 DB::table('post_comment')->where('comment_id',$comment_id)->delete();
        return Redirect::to('/xembinhluan')->with('success','Đã xóa bình luận');
     }

     public function delete_reply_comment($comment_id){
 DB::table('reply_comment')->where('comment_id',$comment_id)->delete();
        return Redirect::to('/xembinhluan')->with('success','Đã xóa bình luận');;
     }

     public function thongke(){
        $games=DB::table('books')->get();
        $countgames=DB::table('tbl_payment_details')->get();

      
    }


public function orderByDay()
    {   
        $range = \Carbon\Carbon::now()->calendar();
        $orderDay = DB::table('tbl_payment_details')
                    ->select(DB::raw('date(date) as getDay'), DB::raw('sum(product_price) as value'), DB::raw('COUNT(*) as value2'))
                    ->where('date', '>=', $range)
                    ->groupBy('getDay')
                    ->orderBy('getDay', 'ASC')
                    ->get();

$game = DB::table('books')->get();

         $gamePercent = DB::table('tbl_payment_details')
         ->join('books','books.id','tbl_payment_details.product_id')
                    ->select(DB::raw('sum(product_sales_quantity) as sumpr'),DB::raw('product_id as pid'),DB::raw('book_title as pname'))
                    ->groupBy('pid')
                    ->groupBy('pname')
                    ->get();  

        return view('admin.statistic', compact('orderDay'))->with('gamePercent',$gamePercent)->with('game',$game);
    }


    public function tk(Request $request){
        $data=$request->all();
            $start= $data['start'];
            $end=$data['end'];
             $orderDay = DB::table('tbl_payment_details')
                    ->select(DB::raw('date(date) as getDay'), DB::raw('sum(product_price) as val'), DB::raw('COUNT(*) as val'))
                   ->whereBetween('date',[$start,$end])
                    ->groupBy('getDay')
                    ->orderBy('getDay', 'ASC')
                    ->get();
                    return Redirect::to('/thongke')->with('orderDay',$orderDay);

                
    }

// function orderByYear() mình sẽ lấy tổng các order trong vòng 5 năm tính từ năm hiện tại và fill vào **bar chart**

   


}
