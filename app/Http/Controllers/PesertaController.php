<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Peserta;
use Alert;
use Illuminate\Support\Facades\Gate;

class PesertaController extends Controller
{

    public function main(Request $request){

        $pesertas = Peserta::when($request->search, function($query) use ($request) {
            $query->where('nama', 'LIKE' , "%{$request->search}%");
        })->when($request->delegasi, function($query) use ($request) {
            $query->where('delegasi', "{$request->delegasi}");
        })->when($request->kbk, function($query) use ($request) {
            $query->where('kbk', "{$request->kbk}");
        })->when($request->kelompok, function($query) use ($request) {
            $query->where('kelompok', "{$request->kelompok}");
        })->paginate(16);
        $pesertas->appends($request->only('search', 'delegasi', 'kbk', 'kelompok'));

        return view('peserta.main', compact('pesertas'))
            ->with('search', $request->search)
            ->with('delegasi', $request->delegasi)
            ->with('kelompok', $request->kelompok)
            ->with('kbk', $request->kbk);

    }

    public function index(){

        if(Gate::allows('isPanitia')){
            abort(404, "Sorry, you don't have permission for this page");
        }

    	$pesertas = Peserta::all();
    	return view('peserta.index', compact('pesertas'));
    }

    public function add(){

        if(Gate::allows('isPanitia')){
            abort(404, "Sorry, you don't have permission for this page");
        }

    	return view('peserta.add');
    }

    public function store(Request $request){

        if(Gate::allows('isPanitia')){
            abort(404, "Sorry, you don't have permission for this page");
        }

    	$validate = $request->validate([
            'nama' => 'required',
            'panggilan' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'alamat_kost' => 'required',
            'jurusan' => 'required',
            'delegasi' => 'required',
            'asal' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

    	// Upload Image
        if ($request->has('avatar')) {

            $image = $request->avatar;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);

            $image = base64_decode($image);
            $imageName = time().'.png';
            $path = public_path() . "/images/peserta/" . $imageName;
            file_put_contents($path, $image);

        } else {

            $imageName = 'defaultimage.png';

        }

        $peserta = Peserta::create([
            'imageurl' => $imageName,
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'nim' => $request->nim,
            'email' => $request->email,
            'alamat_kost' => $request->alamat_kost,
            'kbk' => $request->kbk,
            'kelompok' => $request->kelompok,
            'jurusan' => $request->jurusan,
            'delegasi' => $request->delegasi,
            'asal' => $request->asal,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hobi' => $request->hobi,
            'motto' => $request->motto,
            'bio' => $request->bio,
            'github' => $request->github,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'line' => $request->line,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        Alert::success('Success', 'Welcome');
        return redirect()->route('peserta.index');
    }

    public function edit($id){

        if(Gate::allows('isPanitia')){
            abort(404, "Sorry, you don't have permission for this page");
        }

    	$peserta = Peserta::findOrFail($id);

    	return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id){

        if(Gate::allows('isPanitia')){
            abort(404, "Sorry, you don't have permission for this page");
        }

        $validate = $request->validate([
            'nama' => 'required',
            'panggilan' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'alamat_kost' => 'required',
            'jurusan' => 'required',
            'delegasi' => 'required',
            'asal' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $peserta = Peserta::findOrFail($id);
        // Upload Image
        if ($request->pict != $peserta->imageurl) {
            if ($request->has('avatar')) {

                $imagePath = 'images/peserta/'.$peserta->imageurl;
                if ($peserta->imageurl != 'defaultimage.png') {
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
                $image = $request->avatar;

                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);

                $image = base64_decode($image);
                $imageName = time().'.png';
                $path = public_path() . "/images/peserta/" . $imageName;
                file_put_contents($path, $image);

            } else {

                $imageName = 'defaultimage.png';

            }
        } else {
            $imageName = $peserta->imageurl;
        }

        $peserta->update([
            'imageurl' => $imageName,
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'nim' => $request->nim,
            'email' => $request->email,
            'alamat_kost' => $request->alamat_kost,
            'kbk' => $request->kbk,
            'kelompok' => $request->kelompok,
            'panggilan' => $request->panggilan,
            'jurusan' => $request->jurusan,
            'delegasi' => $request->delegasi,
            'asal' => $request->asal,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hobi' => $request->hobi,
            'motto' => $request->motto,
            'bio' => $request->bio,
            'github' => $request->github,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'line' => $request->line,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        Alert::success('Success', 'Updated');
        return redirect()->route('peserta.index');
    }

    public function delete($id){

        if(Gate::allows('isAdmin') || Gate::allows('isPanitia')) {
            abort(404, "Sorry, you don't have permission for this page");
        }

        $peserta = Peserta::findOrFail($id);
        $imagePath = 'images/peserta/'.$peserta->imageurl;
        if ($peserta->imageurl != 'defaultimage.png') {
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $peserta->delete();

        Alert::success('Success', 'Deleted');
        return redirect()->route('peserta.index');
    }

    public function view($id){
        $peserta = Peserta::findOrFail($id);

        return view('peserta.view', compact('peserta'));
    }

    public function calendar(Request $request){

        $pesertas = Peserta::when($request->delegasi, function($query) use ($request) {
            $query->where('delegasi', "{$request->delegasi}");
        })->get();
    	return view('peserta.calendar', compact('pesertas'))
            ->with('delegasi', $request->delegasi);
    }

}
