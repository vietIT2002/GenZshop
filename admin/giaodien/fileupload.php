<?php
    $upload_dir = array(
        'img' => 'upload/'
    );

    $imgset = array(
        'maxsize' => 5000,
        'maxwidth' => 4096,
        'minwidth' => 10,
        'minheight' => 10,
        'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png')
    );

    define('RENAME_F', 1);

    $site = '';

    function setFNAME($p, $fn, $ex, $i){
        if(RENAME_F == 1 && file_exists($p .$fn .$ex)){
           return setName($p, F_NAME ."_". ($i +1), $ex, ($i +1));

        }else{
            return $fn .$ex;
        }
    }

    $re = '';
    if(isset($_FILES['upload']) && strlen($_FILES['upload']['name'])>1){
        define('F_NAME', preg_replace('/\.(.+?)$/i','', basename($_FILES['upload']['name'])));

        $sepext =  explode('.', strtolower($_FILES['upload']['name']));
        $type = end($sepext);

        $upload_dir = in_array($type, $imgset['type'])? $upload_dir['img']: $upload_dir['audio'];
        $upload_dir = trim($upload_dir, '/').'/';

        if(in_array($type, $imgset['type'])){
            list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);

            if(isset($width) && isset($height)){
                if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']){
                    $re .= 'width x height =' .$width .'x' . $height.' >>> the maximum width x height must
                    be: ' . $imgset['maxwidth'].'x'. $imgset['maxheight'];
                }
                if($width < $imgset['minwidth'] || $height > $imgset['minheight']){
                    $re .= 'width x height =' .$width .'x' . $height.' >>> the minimum width x height must
                    be: ' . $imgset['minwidth'].'x'. $imgset['minheight'];
                }

                if($_FILES['upload']['size'] > $imgset['maxsize']*1000){
                    $re .= '>>> Maximum file size must be: '. $imgset['maxsize'].'KB.';
                } 
            }
        }else{
            $re .='The file: '. $_FILES['upload']['name']. 'has not the allowed extension type.';
        }

        
    }
?>
