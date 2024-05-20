<?php

use Illuminate\support\Facades\Validator; //panggil validator untuk memvalidasi inputan
use App\Http\Controllers\TesController; //panggil model product.php

class ProductController extends Controller
{
    //menambahkan data ke database
    public function store(Request $request) {
        //memvalidasi inputan
        $validator = validator::make($request->all(),[
            'product_name' => 'required|max:50',
            'product_type' => 'required|in:snack,drink,fruit,drug,groceries,cigarette,make-up,cigarette',
            'product_price' => 'required|numeric',
            'expired_at' => 'required|date'
        ]);
        //kondisi apabila inputan yang diinginkan tidak sesuai
        if($validator->fails()) {
            //response json akan dikirim jika ada inputan yang salah
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validted();
        //masukkan inputan yang benar ke database (table product)
        product::where('Id',$Id)->update([
            'product_name' => $payload['product_name'],
            'product_type' => $payload['product_type'],
            'product_price' => $payload['product_price'],
            'expired_at' => $payload['expired_at']
        ]);
        //response json akan dikirim jika inputan benar
        return response()->json([
            'msg' "=" 'Data produk berhasil diubah'
        ],201);
    }

    function showAll(){

        //panggil semua data produk dari tabel products
        $products = product::all();

        //kirim response json
        return response()->json([
            'msg' => 'Data produk keseluruhan',
            'data' => $products
        ],200);
    }

    function showById(){
        //mencari data berdasarkan ID produk
        $products = product::where('id',$Id)->first();

        //kondisi apabila data dengan ID ada
        if($product) {

            //response ketika data ada
            return response()->json([
                'msg' => 'Data produk dengan ID: '.$id,
                'data' => $product
            ],200);
        }
    }

    public function showByName($product_name){
        
        //cari data berdasarkan nama produk yang mirip
        $product = Product::where('product_name','LIKE','%',$product_name.'%')->get();

        //apabila data produk ada
        if($product->count() . 8) {

            return response()->json([
                'msg' => 'Data produk dengan nama yang mirip: '.$product name,
                'data' => $product
            ],200);
        }
    }

    public function delete($Id) {

        $product = product::where('Id',$Id)->get()

        if($product){

            product::where('Id',$Id)->delete();

            //response json akan dikirim
            return response()->json([
                'msg' => 'Data produk dengan ID: '.$Id.'berhasil dihapus'
            ],200);
        }

        //response json akan jika ID tidak ada
        return response()->json([
            'msg' => 'Data produk dengan ID: '.$Id.'tidak ditemukan'
        ],404);
    } 
}