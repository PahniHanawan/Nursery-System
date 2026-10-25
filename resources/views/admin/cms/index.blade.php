@extends('layouts.admin')

@section('title', 'CMS - Page Content & Notices')

@section('content')
<div class="space-y-8 max-w-5xl">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                Lightweight Website CMS
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Edit website notices, hero announcements, admissions contact numbers, and ethos copy without developer intervention.
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.cms.update') }}" class="space-y-8">
        @csrf

        @foreach($contents as $slug => $items)
        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-5">
            <div class="border-b border-stone-100 pb-3">
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md">Page Group</span>
                <h2 class="font-brand text-lg font-bold text-slate-900 mt-2 uppercase tracking-wide">
                    {{ ucfirst($slug) }} Content Keys
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-5">
                @foreach($items as $item)
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase font-mono">
                        {{ str_replace('_', ' ', $item->section_key) }}
                    </label>
                    @if(strlen($item->content_value) > 100 || str_contains($item->section_key, 'copy') || str_contains($item->section_key, 'ethos') || str_contains($item->section_key, 'standards') || str_contains($item->section_key, 'guidance'))
                        <textarea name="contents[{{ $item->id }}]" rows="3"
                            class="w-full p-3.5 rounded-2xl border border-stone-300 text-xs sm:text-sm text-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 leading-relaxed">{{ old('contents.' . $item->id, $item->content_value) }}</textarea>
                    @else
                        <input type="text" name="contents[{{ $item->id }}]" value="{{ old('contents.' . $item->id, $item->content_value) }}"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs sm:text-sm text-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="flex justify-end sticky bottom-6 z-20">
            <button type="submit" class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm shadow-xl shadow-emerald-600/30 hover:-translate-y-0.5 transition">
                Save All Content Changes
            </button>
        </div>
    </form>

</div>
@endsection
