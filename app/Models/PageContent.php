<?php

namespace App\Models;

use Database\Factories\PageContentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    /** @use HasFactory<PageContentFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'page_slug',
        'section_key',
        'content_value',
    ];

    /**
     * Retrieve a content value by slug and key with fallback.
     */
    public static function get(string $pageSlug, string $sectionKey, ?string $default = null): ?string
    {
        $item = static::where('page_slug', $pageSlug)
            ->where('section_key', $sectionKey)
            ->first();

        return $item?->content_value ?? $default;
    }

    /**
     * Store or update a content value.
     */
    public static function set(string $pageSlug, string $sectionKey, ?string $value): void
    {
        static::updateOrCreate(
            ['page_slug' => $pageSlug, 'section_key' => $sectionKey],
            ['content_value' => $value]
        );
    }
}
