<?php
#Constant
// class Web {
//     const NAMA_WEB ="ZairanWeb.com";
// }
// echo Web::NAMA_WEB;

// echo '<hr>';
#Static
// class Web {
//     public static $title = "My Page";
// }
// echo Web::$title;
?>

<?php
// class Web {
//     public static $title = "My Page";

//     public function changeTitle() {
//         self::$title = 'My Page2';
//         return self::$title;
//     }

//     public function changeTitle2 () {
//         return self::$title;
//     }
// }

// class YourWeb extends Web {
//     public function changeTitle() {
//         self::$title = 'Your Page';
//         return self::$title;
//     }

//     public function changeTitle2() {
//         self::$title = "Wikrama";
//         return self::$title;
//     }
// }


// echo Web::$title . "<br>";
// $myweb = new Web;
// echo $myweb->changeTitle() ."<br>" .
// $myweb->changeTitle2();
// echo "<br>";
// $yourweb = new YourWeb;
// echo $yourweb->changeTitle() . "<br>" . 
// $yourweb->changeTitle2();
?>

<?php
class Web {
    public static $title = "First Page";

    public static function getTitlePage() {
        return "Nama Halaman Depan ini adalah '" . self::$title . "'";
    }
}

class YourWeb extends Web {
    public static function getTitlePage() {
        return"Nama Halaman Depan ini adalah '" . self::$title . 
        "'";
    }
}

echo Web::$title;
echo "<br>";
echo Web::getTitlePage();
echo "<br>";
echo YourWeb::getTitlePage();
echo "<br>";
echo Web::getTitlePage();
?>