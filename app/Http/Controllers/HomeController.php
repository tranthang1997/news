<?php

namespace App\Http\Controllers;

use Request, Cart;
use File;
use App\Cate;
use App\Product;
use App\Image;
use App\User;
use App\Http\Requests\ProductRequest;
use Auth, Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\ContactRequest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tin_moi = DB::table('products') -> select('id', 'name', 'alias', 'intro', 'price', 'image', 'cate_id') -> where('price', 1)-> orderBy('id', 'DESC') ->skip(0) -> take(4) -> get();
        $bai_viet_moi = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('price', 2)-> orderBy('id', 'DESC') ->skip(0) -> take(4) -> get();
        $bai_viet_pho_bien = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('price', 3) -> orderBy('id', 'DESC') ->skip(4) -> take(8) -> get();
        $xa_hoi = DB::table('products') -> select('id', 'name', 'alias', 'intro', 'image', 'cate_id') -> where('cate_id', 1) -> orderBy('id', 'DESC')  -> skip(0) -> take(4) -> get();
        $the_gioi = DB::table('products') -> select('id', 'name', 'alias', 'intro', 'image', 'cate_id') -> where('cate_id', 2) -> orderBy('id', 'DESC')  -> skip(0) -> take(4) -> get();
        $cong_nghe = DB::table('products') -> select('id', 'name', 'alias', 'intro', 'image', 'cate_id') -> where('cate_id', 4) -> orderBy('id', 'DESC')  -> skip(0) -> take(4) -> get();
        $game = DB::table('products') -> select('id', 'name', 'alias', 'intro', 'image', 'cate_id') -> where('cate_id', 6) -> orderBy('id', 'DESC')  -> skip(0) -> take(4) -> get();
        return view('user.pages.home', compact('tin_moi', 'bai_viet_moi', 'bai_viet_pho_bien', 'xa_hoi', 'the_gioi', 'cong_nghe', 'game'));
    }

    public function tintuc($id) {
        $tin = Product::select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('cate_id', $id) -> orderBy('id', 'DESC') -> paginate(6);
        if (count($tin) > 0) {
            $loai_tin = Cate::findOrFail($id);
            $tin_pho_bien = Product::select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('price', 3) -> orderBy('id', 'DESC') -> get();
            return view('user.pages.cate', compact('tin', 'loai_tin', 'tin_pho_bien'));
        }
        else {
            return view ('user.pages.empty');
        }
    }

    public function product($loai_tin, $id) {
        $tin_detail = DB::table('products') -> where('id', $id) -> first();
        $loai_tin = Cate::select('id', 'name', 'alias') -> where('id', $tin_detail -> cate_id) -> first();
        $bai_viet_pho_bien = DB::table('products') -> select('id', 'name', 'alias', 'image', 'cate_id') -> where('price', 3) -> orderBy('id', 'DESC') ->skip(0) -> take(4) -> get();
        $tin_lien_quan = Product::select('id', 'name', 'alias', 'cate_id', 'image') -> where('cate_id', $tin_detail -> cate_id)-> where('id', '<>', $id) -> skip(0) -> take(2) -> get();
        return view('user.pages.product_detail', compact('tin_detail', 'loai_tin', 'bai_viet_pho_bien', 'tin_lien_quan'));
    }

    public function getContact() {
        return view('user.pages.contact');
    }

    public function postContact(ContactRequest $request) {
        $mess = $request -> message;
        $data = ['username' => $request -> input('name'), 'email' => $request -> input('email'), 'me' => $mess];
        Mail::send('user.pages.email_blank', $data, function($msg) {
            $msg -> from('thangtr97@gmail.com', 'Hi');
            $msg -> to('thangtr97@gmail.com', 'Thắng') -> subject('gủi mail');
        });
        echo "<script>
            alert('Thanks for contacting us! We will get in touch with you shortly');
            window.location = '".url('/')."'
        </script>>";
    }
}

