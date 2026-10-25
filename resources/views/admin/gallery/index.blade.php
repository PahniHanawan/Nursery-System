@extends('layouts.admin')

@section('title', 'Manage Photo Gallery')

@section('content')
<div class="space-y-8 max-w-5xl">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                Photo Gallery Media Manager
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Upload facility photos, classroom previews, and outdoor play images. Supported formats: JPG, PNG, WebP (max 2MB).
            </p>
        </div>
    </div>

    <!-- Upload New Image Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-4">
        <h2 class="font-brand text-lg font-bold text-slate-900">Upload New Photo</h2>

        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-start">
                <div class="sm:col-span-5">
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Image File (JPG, PNG, WebP &le; 2MB)</label>
                    <input type="file" name="image" required accept="image/jpeg,image/png,image/webp"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                </div>

                <div class="sm:col-span-5">
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Alt Text / Caption</label>
                    <input type="text" name="alt_text" required placeholder="e.g. Toddler painting studio with natural wooden easels"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-emerald-500/20">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" min="0"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-emerald-500/20">
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-md transition">
                    Upload & Publish Photo
                </button>
            </div>
        </form>
    </div>

    <!-- Active Gallery Grid -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-4">
        <h2 class="font-brand text-lg font-bold text-slate-900">Current Gallery Photos ({{ $images->count() }})</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 pt-2">
            @forelse($images as $img)
            <div class="rounded-2xl border border-stone-200 overflow-hidden bg-stone-50 flex flex-col justify-between group shadow-xs">
                <div class="h-44 overflow-hidden relative">
                    <img src="{{ $img->url }}" alt="{{ $img->alt_text }}" class="w-full h-full object-cover">
                    <span class="absolute top-2 left-2 px-2 py-0.5 rounded-md bg-black/60 text-white text-[10px] font-mono">
                        #{{ $img->sort_order }}
                    </span>
                </div>
                <div class="p-3.5 flex-1 flex flex-col justify-between space-y-3">
                    <p class="text-xs text-slate-700 line-clamp-2">{{ $img->alt_text }}</p>
                    <div class="flex items-center justify-between pt-2 border-t border-stone-200 text-xs">
                        <span class="text-[11px] text-slate-400 font-mono">{{ $img->created_at->format('M d, Y') }}</span>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Remove this image from gallery?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-slate-500 text-xs">
                No gallery pictures uploaded yet.
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
