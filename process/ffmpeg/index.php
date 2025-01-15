<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

function ffmpeg($data) {
    // data
    $filename = $data['filename'];
    $resolution = $data['resolution'];
    echo "[Processing] Convert $filename to $resolution\n";
    try {
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open(STORAGE . "/$filename");
        $video
            ->filters()
            ->resize(new FFMpeg\Coordinate\Dimension(RESOLUTION[$resolution . '_WIDTH'], RESOLUTION[$resolution . '_HEIGHT']))
            ->synchronize();

        $video
            ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(5))
            ->save(dirname(STORAGE . "/$filename") . "/frame.jpg");
        $video
            ->save(new FFMpeg\Format\Video\X264(), dirname(STORAGE . "/$filename") . "/$resolution.mp4");
        echo "[Done] $filename\n";
        return true;
    } catch(\Exception $ex) {
        echo "[FAILED] {$ex->getMessage()}\n";
        return false;
    }
};
