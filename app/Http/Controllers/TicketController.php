<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input pencarian dari request
        $search = $request->input('search');

        // Mengambil tiket dengan pencarian
        $data_konser = Tickets::when($search, function ($query) use ($search) {
            return $query->where('nama_konser', 'like', "%{$search}%");
        })->paginate(10); // Gunakan paginate untuk paginasi

        // Kembalikan view dengan data konser dan input pencarian
        return view('tickets.index', compact('data_konser', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    // @dd($request->all());
    $request->validate([
        'nama_konser' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'date' => 'required',
        'location' => 'required',
        'description' => 'required',
        'image' => 'required|image',
    ]);

    $nama_file  = Str::random(32);
    $extension_file   = $request->file('image')->getClientOriginalExtension();
    $nama_file_upload  = "{$nama_file}.{$extension_file}";

    $request->file('image')->storeAs('images/tickets', $nama_file_upload);

    Tickets::create([
        'nama_konser' => $request->input('nama_konser'),
        'harga' => $request->input('price'),
        'jumlah_tiket' => $request->input('quantity'),
        'tanggal' => $request->input('date'),
        'lokasi' => $request->input('location'),
        'deskripsi' => $request->input('description'),
        'image' => $nama_file_upload,
    ]);

        return redirect()->route('admin.dashboard')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ticket = Tickets::find($id);

        // Cek apakah tiket ditemukan
        if (!$ticket) {
            return redirect()->route('admin.index')->with('error', 'Tiket tidak ditemukan.');
        }

        // Kembalikan view dengan data tiket
        return view('tickets.show', compact('ticket'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data_konser = Tickets::find($id);
        return view('tickets.edit', compact('data_konser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_konser' => 'required',
            'harga' => 'required',
            'jumlah_tiket' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image',
        ]);

        $ticket = Tickets::where('id', $id)->firstOrFail();
        $nama_file_upload = $ticket->image;

        if ($request->has('image')) {
            $nama_file  = Str::random(32);
            $extension_file   = $request->file('image')->getClientOriginalExtension();
            $nama_file_upload  = "{$nama_file}.{$extension_file}";

            $request->file('image')->storeAs('images/tickets', $nama_file_upload);
        }

        // Update data konser
        $ticket->update([
            'nama_konser' => $request->input('nama_konser'),
            'harga' => $request->input('harga'),
            'jumlah_tiket' => $request->input('jumlah_tiket'),
            'tanggal' => $request->input('tanggal'),
            'lokasi' => $request->input('lokasi'),
            'deskripsi' => $request->input('deskripsi'),
            'image' => $nama_file_upload
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Tiket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Tickets::where('id', $id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Tiket deleted successfully.');
    }
}
