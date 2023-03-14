<?php
namespace vendor;

class Captcha{

    public static function getCaptcha($width = 450,$height = 65,$length = 4,$fonts = ''){
        // 实现生成验证码的功能
        if(empty($fonts)) $fonts = 'captcha.ttf';
        $fonts = __DIR__ . '/fonts/' . $fonts;
        // 创建图像资源
        $img = imagecreatetruecolor($width,$height);
        //随机生成背景色
        $bg_color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imagefill($img,0,0,$bg_color);
        //增加干扰点
        for($i = 0;$i < 50;$i++){
            $dots_color = imagecolorallocate($img,mt_rand(140,190),mt_rand(140,190),mt_rand(140,190));
           //写入内容
            imagestring($img,mt_rand(1,5),mt_rand(0,$width),
             mt_rand(0,$height),'*',$dots_color);
        }
        //增加干扰线
        for($i = 0;$i < 10;$i++){
            $line_color = imagecolorallocate($img, mt_rand(80,130),mt_rand(80,130), mt_rand(80,130));
            imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$line_color);
        }
        //获取随机字符
        $captcha = self::getString($length);
        //保存到session
        @session_start();
        $_SESSION['captcha'] = $captcha;
        //写入图片
        for($i = 0;$i < $length;$i++){
            //增加颜色
            $c_color = imagecolorallocate($img, mt_rand(0,60), mt_rand(0,60),
                mt_rand(0,60));
            //写入到图片
            imagettftext($img, mt_rand(15,25), mt_rand(-45,45),
                $width/($length+1)*($i+1), mt_rand(25,$height-25), $c_color,
                $fonts, $captcha[$i]);
        }
        //输出资源
        header('Content-type:image/png');
        imagepng($img);
        //销毁资源
        imagedestroy($img);


    }

    private static function getString($length = 4){
        //定义变量保存数据
        $captcha = '';
        //循环随机获取数据
        for($i=0; $i<$length; $i++){
            //随机确定数字、大写字母还是小写字母
            switch(mt_rand(1,3)){
                case 1:	// 49-57分别代表数组1-9
                    $captcha .= chr(mt_rand(49,57));
                    break;
                case 2:	// 65-90分别代表小写字母a-z
                    $captcha .= chr(mt_rand(65,90));
                    break;
                case 3:	// 65-90分别代表大写字母A-Z
                    $captcha .= chr(mt_rand(97,122));
                    break;
            }
        }
        return $captcha;
    }

    public static function checkCaptcha($captcha){
        @session_start();
        return (strtolower($captcha) === strtolower($_SESSION['captcha']));
    }

}
