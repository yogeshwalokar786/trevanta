<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Display the media library.
     */
    public function index(Request $request)
    {
        try {
            $query = Media::latest();

            if ($request->filled('search')) {
                $search = $request->query('search');
                $query->where('filename', 'like', "%{$search}%");
            }

            if ($request->query('type') === 'image') {
                $query->where('mime_type', 'like', 'image/%');
            }

            $media = $query->paginate(24)->withQueryString();
        } catch (\Throwable $e) {
            $media = collect();
        }

        // If requested via AJAX (for media picker modal in the blog editor)
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'media'   => $media->items(),
                'pagination' => [
                    'current_page' => $media->currentPage(),
                    'last_page'    => $media->lastPage(),
                ]
            ]);
        }

        return view('admin.media.index', compact('media'));
    }

    /**
     * Upload new media file(s).
     */
    public function store(Request $request)
    {
        $request->validate([
            'files'   => 'nullable|array',
            'files.*' => 'file|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:10240', // Max 10MB per file
            'file'    => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:10240',
        ]);

        $uploaded = [];
        $filesToProcess = [];

        if ($request->hasFile('files')) {
            $filesToProcess = $request->file('files');
        } elseif ($request->hasFile('file')) {
            $filesToProcess = [$request->file('file')];
        }

        if (empty($filesToProcess)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'No files provided for upload.'], 422);
            }
            return redirect()->back()->with('error', 'Please choose at least one file to upload.');
        }

        $destinationPath = public_path('uploads');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $dangerousExtensions = [
            'php', 'phtml', 'php3', 'php4', 'php5', 'php7', 'php8', 'phar',
            'cgi', 'pl', 'py', 'sh', 'bash', 'asp', 'aspx', 'jsp', 'html',
            'htm', 'js', 'exe', 'bat', 'cmd', 'vbs'
        ];

        foreach ($filesToProcess as $file) {
            $originalName = strip_tags(str_replace(["\0", "\\", "/"], '', $file->getClientOriginalName()));
            $extension = strtolower($file->getClientOriginalExtension());

            // Reject executable or unauthorized extensions
            if (in_array($extension, $dangerousExtensions)) {
                continue;
            }

            // Generate cryptographically secure random filename
            $filename = Str::random(32) . '.' . $extension;
            $mimeType = $file->getClientMimeType();
            $size = $file->getSize();

            $file->move($destinationPath, $filename);
            @chmod($destinationPath . '/' . $filename, 0644);

            try {
                $item = Media::create([
                    'filename'  => $originalName,
                    'path'      => 'uploads/' . $filename,
                    'mime_type' => $mimeType,
                    'size'      => $size,
                    'alt_text'  => pathinfo($originalName, PATHINFO_FILENAME),
                ]);
                $uploaded[] = $item;
            } catch (\Throwable $e) {
                // If DB fails, still track file
            }
        }
                $uploaded[] = [
                    'filename' => $originalName,
                    'path'     => 'uploads/' . $filename,
                    'url'      => asset('uploads/' . $filename),
                ];
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($uploaded) . ' file(s) uploaded successfully.',
                'files'   => $uploaded,
                'url'     => isset($uploaded[0]->url) ? $uploaded[0]->url : (is_array($uploaded[0]) ? $uploaded[0]['url'] : asset($uploaded[0]->path)),
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', count($uploaded) . ' media file(s) uploaded successfully.');
    }

    /**
     * Remove the specified media item.
     */
    public function destroy($id)
    {
        try {
            $media = Media::findOrFail($id);
            $fullPath = public_path($media->path);
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $media->delete();
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Could not delete media item: ' . $e->getMessage());
        }

        return redirect()->route('admin.media.index')->with('success', 'Media file removed successfully.');
    }
}

