<?php

namespace App\Services\Material;

use App\Models\Material;
use App\Models\Webinar;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MaterialService
{
    public function upload(
        Webinar $webinar,
        UploadedFile $file,
        string $title
    ): Material {

        return DB::transaction(function () use ($webinar, $file, $title) {

            $extension =
                $file->getClientOriginalExtension();

            $storedFilename =
                Str::uuid() . '.' . $extension;

            $path = $file->storeAs(
                'materials',
                $storedFilename,
                'private'
            );

            return Material::create([
                'webinar_id' => $webinar->id,
                'title' => $title,
                'original_filename' =>
                    $file->getClientOriginalName(),
                'stored_filename' =>
                    $storedFilename,
                'file_path' => $path,
                'file_size' =>
                    $file->getSize(),
                'mime_type' =>
                    $file->getMimeType(),
            ]);
        });
    }
}
