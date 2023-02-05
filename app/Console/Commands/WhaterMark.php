<?php

namespace App\Console\Commands;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;

class WhaterMark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:whatermark';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        $files = File::get();
        foreach ($files as $file) {
            $imgFile = $file->image;
            $name = explode("/", $imgFile);

            $img = Image::make(public_path($imgFile));

            //$img->insert(public_path($imgFile), 'bottom-right', 10, 10);
            $img->text(Carbon::now(), $img->width() - 20, $img->height() - 20, function ($font) {
                // Using font family here
                $font->file(public_path("assets/fonts/nunito-v9-latin-600.ttf"));
                $font->size(40);
                $font->color('#202124');
                $font->align('right');
                $font->valign('bottom');
            });
            $img->save(public_path("images/new/") . $name[1]);
        }

        return 0;
    }
}
