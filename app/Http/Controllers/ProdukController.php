<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProdukController extends Controller
{

    public function index()
    {
        $inventory = DB::table('inventory')->get();
        $produk = DB::table('produk')->orderBy('id_produk', 'DESC')->get();

        $path = public_path() . '/data_file';
        foreach ($produk as $key => $value) {
            $file = $path . '/' . $value->photo_produk;
            $produk[$key]->photo_produk = str_replace(public_path(), url('/'), $file);
        }

        return view('produk', ['produk' => $produk], ['inventory' => $inventory]);
    }

     public function edit($id_produk)
    {
        $produk =DB::table('produk')->where('id_produk', $id_produk)->get();        

            
        $data_dua = DB::table('inventory')
        // ->where('fakultas','=','fhisip')
        ->get();
        $inventory = DB::table('produk')
        ->select("lokasi_gudang")
        ->get();

        $path = public_path() . '/data_file';
        foreach ($produk as $key => $value) {
            $produk[$key]->photo_produk_tampil = null;

            if (!empty($value->photo_produk)) {
                $file = $path . '/' . $value->photo_produk;
                if (file_exists($file)) {
                    $produk[$key]->photo_produk_tampil = str_replace(public_path(), url('/'), $file);
                }
            }
        }
        
        return view('editProduk', ['produk' => $produk, 'lokasi_gudang' => $inventory, 'data_dua' => $data_dua]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required',
            'no_seri' => 'required',
            'nama_produk' => 'required',
            'jenis_produk' => 'required',
            'kategori_produk' => 'required',
            'harga' => 'required',
            'modal' => 'required',
            'dimensi' => 'required',
            'berat' => 'required',
            'unit_pembelian' => 'required',
            'lokasi_gudang' => 'required',
            // 'lokasi_rak' => 'required',
            // 'lokasi_barisRak' => 'required',
            // 'lokasi_kolomRak' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }
        // ambil foto lama. Saya buat model untuk memudahkan
        $foto_lama  = Product::where('id_produk', $request->id_produk)
            ->first()
            ->photo_produk;

        if($request->hapus_foto) {
            // kalau hapus foto
            // kolom foto jadiin nullable
            $tujuan_upload = public_path() . '/data_file';
            $old = $tujuan_upload . '/' . $foto_lama;
            if (file_exists($old)) {
                unlink($old);
            }

            $nama_file = NULL;
        } elseif ($request->file('photo_produk') !== NULL) {
            $photo_produk = $request->file('photo_produk');
            // ubah nama file agar tidak kepanjangan
            $nama_file = time() . "." . $photo_produk->getClientOriginalExtension();
            $tujuan_upload = public_path() . '/data_file';
            $photo_produk->move($tujuan_upload, $nama_file);
            $old = $tujuan_upload . '/' . $foto_lama;
            if (file_exists($old)) {
                unlink($old);
            }
        } elseif ($request->file('photo_produk') == NULL) {
            $nama_file = $foto_lama;
        }

        DB::table('produk')->where('id_produk', $request->id_produk)->update([
            'kode_produk' => $request->kode_produk,
            'no_seri' => $request->no_seri,
            'nama_produk' => $request->nama_produk,
            'photo_produk' => $nama_file,
            'jenis_produk' => $request->jenis_produk,
            'kategori_produk' => $request->kategori_produk,
            'harga' => str_replace(',','',$request->harga),
            'modal' => str_replace(',','',$request->modal),
            'dimensi' => $request->dimensi.'cm',
            'berat' => $request->berat.'kg',
            'unit_pembelian' => $request->unit_pembelian,
            'lokasi_gudang' => $request->lokasi_gudang,
            // 'lokasi_rak' => $request->lokasi_rak,
            // 'lokasi_barisRak' => $request->lokasi_barisRak,
            // 'lokasi_kolomRak' => $request->lokasi_kolomRak,
            'qty' => $request->qty,
        ]);

        return redirect('/produk');
    }
    public function hapus($id_produk)
    {
        DB::table('produk')->where('id_produk', $id_produk)->delete();
        return redirect('/produk');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $produk = DB::table('produk')
            ->where('kode_produk', 'like', "%" . $cari . "%")
            ->orWhere('no_seri', 'like', "%" . $cari . "%")
            ->orWhere('nama_produk', 'like', "%" . $cari . "%")
            ->orWhere('jenis_produk', 'like', "%" . $cari . "%")
            ->orWhere('kategori_produk', 'like', "%" . $cari . "%")
            ->orWhere('harga', 'like', "%" . $cari . "%")
            ->orWhere('modal', 'like', "%" . $cari . "%")
            ->orWhere('dimensi', 'like', "%" . $cari . "%")
            ->orWhere('berat', 'like', "%" . $cari . "%")
            ->orWhere('unit_pembelian', 'like', "%" . $cari . "%")
            ->orWhere('lokasi_gudang', 'like', "%" . $cari . "%")
            // ->orWhere('lokasi_rak', 'like', "%" . $cari . "%")
            // ->orWhere('lokasi_barisRak', 'like', "%" . $cari . "%")
            // ->orWhere('lokasi_kolomRak', 'like', "%" . $cari . "%")
            ->orWhere('qty', 'like', "%" . $cari . "%")
            ->orderBy('id_produk', 'DESC')
            ->paginate();

        $path = public_path() . '/data_file';
        foreach ($produk as $key => $value) {
            $file = $path . '/' . $value->photo_produk;
            $produk[$key]->photo_produk = str_replace(public_path(), url('/'), $file);
        }

        return view('produk', ['produk' => $produk]);
    }

    public function tambah()
    {
        $inventory = DB::table('inventory')->get();

        return view('addProduk', ['inventory' => $inventory]);
    }
    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required',
            'no_seri' => 'required',
            'nama_produk' => 'required',
            'photo_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'jenis_produk' => 'required',
            'kategori_produk' => 'required',
            'harga' => 'required',
            // modal jangan integer soalnya dah dikasih masking. masking wajib text
            'modal' => 'required',
            'dimensi' => 'required',
            'berat' => 'required',
            'unit_pembelian' => 'required',
            'lokasi_gudang' => 'required',
            // 'lokasi_rak' => 'required',
            // 'lokasi_barisRak' => 'required',
            // 'lokasi_kolomRak' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }

        $id_inv = DB::table('inventory')->where('lokasi_gudang', $request->lokasi_gudang)->first();

        $photo_produk = $request->file('photo_produk');
        // ubah nama file agar tidak kepanjangan
        $nama_file = time() . "." . $photo_produk->getClientOriginalExtension();
        $tujuan_upload = public_path() . '/data_file';
        $photo_produk->move($tujuan_upload, $nama_file);

        // perubahan pada insert
        DB::table('produk')->insert([
            'kode_produk' => $request->kode_produk,
            // barcode pastikan punya default value di tablenya
            'barcode'       => '23498',
            "id_inventory" => $id_inv->id_inventory ?? 0,
            'no_seri' => $request->no_seri,
            'nama_produk' => $request->nama_produk,
            'photo_produk' => $nama_file,
            'jenis_produk' => $request->jenis_produk,
            'kategori_produk' => $request->kategori_produk,
            'harga' => str_replace(',','',$request->harga),
            'modal' => str_replace(',','',$request->modal),
            'dimensi' => $request->dimensi.'cm',
            'berat' => $request->berat.'kg',
            'unit_pembelian' => $request->unit_pembelian,
            'lokasi_gudang' => $request->lokasi_gudang,
            // 'lokasi_rak' => $request->lokasi_rak,
            // 'lokasi_barisRak' => $request->lokasi_barisRak,
            // 'lokasi_kolomRak' => $request->lokasi_kolomRak,
            'qty' => $request->qty,
        ]);
        // perubahan pada insert

        return redirect('/produk');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table('produk')->whereIn('id_produk', explode(",", $ids))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
