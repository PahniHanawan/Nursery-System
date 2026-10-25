<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery images.
     */
    public function index(): View
    {
        $images = GalleryImage::orderBy('sort_order')->latest()->get();

        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Store a newly uploaded gallery image.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'alt_text' => ['required', 'string', 'max:150'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $path,
            'alt_text' => $validated['alt_text'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Gallery image uploaded successfully.');
    }

    /**
     * Remove the specified gallery image.
     */
    public function destroy(GalleryImage $galleryImage): RedirectResponse
    {
        if (! str_starts_with($galleryImage->image_path, 'http')) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return back()->with('success', 'Gallery image removed.');
    }
}
