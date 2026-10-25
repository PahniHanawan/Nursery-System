@extends('layouts.public')

@section('title', 'Photo Gallery & Virtual Tour - Little Sprouts Nursery')
@section('meta_description', 'View photographs of our nursery classrooms, baby sensory suites, toddler discovery zones, outdoor garden, and nutritious meals.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Visual Tour
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            Life at Little Sprouts
        </h1>
        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
            Glimpse daily moments of wonder, joy, laughter, and discovery across our Kensington classrooms and outdoor play areas.
        </p>
    </div>
</section>

<!-- Gallery Grid with Lightbox Preview -->
<section class="py-16 bg-white" x-data="{
    activeImage: null,
    activeAlt: '',
    openLightbox(url, alt) {
        this.activeImage = url;
        this.activeAlt = alt;
    },
    closeLightbox() {
        this.activeImage = null;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($galleryImages as $img)
            <div class="group relative rounded-3xl overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 bg-stone-100 cursor-pointer border border-stone-200"
                 @click="openLightbox('{{ $img->url }}', '{{ addslashes($img->alt_text) }}')">
                <div class="aspect-4/3 overflow-hidden">
                    <img src="{{ $img->url }}" alt="{{ $img->alt_text }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" loading="lazy">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-6 flex flex-col justify-end text-white">
                    <p class="text-xs font-medium text-emerald-300 mb-1">Click to enlarge</p>
                    <p class="text-sm font-bold line-clamp-2">{{ $img->alt_text }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-slate-500">
                <p>New gallery photos are currently being uploaded.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-16 text-center bg-stone-50 rounded-3xl p-8 border border-stone-200">
            <h3 class="font-brand text-2xl font-bold text-slate-900">Want to See Our Facilities in Person?</h3>
            <p class="text-sm text-slate-600 mt-2 max-w-lg mx-auto">
                Photographs can only capture a fraction of the warm, inspiring atmosphere. We would love to welcome you for a personalized show-around.
            </p>
            <div class="mt-6">
                <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg transition">
                    Book a Nursery Show-Around &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- Lightbox Modal -->
    <div x-show="activeImage" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="closeLightbox()"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-slate-950/80 backdrop-blur-md">
        
        <div class="relative max-w-4xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-slate-700"
             @click.away="closeLightbox()">
            
            <button type="button" @click="closeLightbox()" class="absolute top-4 right-4 z-10 p-2 rounded-full bg-slate-800/80 text-white hover:bg-slate-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="max-h-[75vh] flex items-center justify-center bg-black/40">
                <img :src="activeImage" :alt="activeAlt" class="max-h-[75vh] w-auto max-w-full object-contain">
            </div>

            <div class="p-4 sm:p-6 bg-slate-900 text-slate-200 text-sm">
                <p x-text="activeAlt" class="font-medium"></p>
            </div>
        </div>
    </div>
</section>
@endsection
