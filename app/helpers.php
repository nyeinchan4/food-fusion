<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('storage_url')) {
    /**
     * Return a URL for a file stored on the public filesystem disk.
     *
     * Returns a local /storage URL when the app runs on the local disk
     * (e.g. development) or a full S3 URL when FILESYSTEM_DISK=s3
     * (production), so views don't need to know which disk is active.
     */
    function storage_url(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return Storage::disk('public')->url($path);
    }
}