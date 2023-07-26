<?php

namespace App\UseCases\Api;

use Google\Cloud\Language\LanguageClient;

class AnalyzeText
{
    public function __invoke($text)
    {
        $client = new LanguageClient([
            'projectId' => 'modified-badge-350707',
            'keyFile' => json_decode(file_get_contents(config_path('modified-badge-350707-35b55f5abf04.json')),true),
        ]);
        $annotation = $client->analyzeSentiment($text);
        $sentiment = $annotation->sentiment();
        $score = $sentiment['score'];
        $magnitude = $sentiment['magnitude'];
        if($score<-0.4){
            $emotion_id = 2;
            if($score*$magnitude<-1.0){
                $emotion_id = 1;
            }
        }
        if(-0.4<=$score && $score<=0.4){
            $emotion_id = 3;
            if($magnitude>1.9){
                $emotion_id = 4;
            }
        }
        if(0.4<$score){
            $emotion_id = 5;
            if($score*$magnitude>1.0){
                $emotion_id = 6;
            }
        }
        return array('score'=>$score,'magnitude'=>$magnitude,'emotion_id'=>$emotion_id);
    }
}