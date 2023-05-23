<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = Yii::t('app', 'Video-Audio-File');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-video-audio-file mt-5">

    <div class="book-top">
        <a href="<?=Url::to(['library/week','n'=>$library->library_id])?>" class="back">
            BACK
        </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
        <div></div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!empty($audio)): ?>
    <h1>Audio</h1>
        <div class="row">
            <?php $isFirstAudio = true; ?>
            <?php foreach ($audio as $a): ?>
                <?php if ($a->audio_voice): ?>
                    <?php if ($isFirstAudio): ?>
                       <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                          <div class="card" style="border:1px solid #cccccc;">
                              <h1 class="text-center">
                                  <?=$a->audio_title?>
                              </h1>
                             <div class="card-body">
                                 <div class="text-center">
                                     <audio  controls>
                                         <source src="/Just/just/frontend/web/upload/audio/<?= $a->audio_voice ?>" type="audio/mpeg">
                                     </audio>
                                 </div>
                             </div>
                          </div>
                       </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($audio)): ?>
        <h1>Books</h1>
        <div class="row">
            <?php $isFirstAudio = true; ?>
            <?php foreach ($audio as $a): ?>
                <?php if ($a->video): ?>
                    <?php if ($isFirstAudio): ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card"  style="border:1px solid #cccccc;">
                                <h1 class="text-center">
                                    <?=$a->file_title?>
                                </h1>
                                <img src="/Just/just/frontend/web/upload/books/image/<?=$a->image?>" alt="">

                                <a href="/Just/just/frontend/web/upload/books/image/<?=$a->file_upload?>" class="btn btn-primary">
                                    ko'rish
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($audio)): ?>
        <h1>Video</h1>
        <div class="row">
            <?php $isFirstAudio = true; ?>
            <?php foreach ($audio as $a): ?>
                <?php if ($a->video): ?>
                    <?php if ($isFirstAudio): ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="card"  style="border:1px solid #cccccc;">
                               <h1 class="text-center">
                                   <?=$a->video_title?>
                               </h1>

                               <div class="text-center">
                                   <video controls width="100%" height="100%">
                                       <source src="/Just/just/frontend/web/upload/video/<?php echo $a->video ?>" type="video/mp4">
                                   </video>
                               </div>
                           </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>








</div>
