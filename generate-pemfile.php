<?php
header("Content-Type: text/html; charset=utf-8");

$filename = storage_path("privateKey.pem");//生成的公钥或私钥文件
@chmod($filename, 0777);
@unlink($filename);
$key = "*********imqPoTFntH/HMXDAQlddR1qT1aA13XedYrsgF82Mc1NhVVp5jgFGf25qTkvdS4JpIx2lBnhAw8yp82gevmiHmo5ze/bfH1QRSDRnJt6Ejux6sJra1WujfiFEqAc1JBO5xZQcDrUvo0AqJ5Q/uWZQzCdsbpD8ou98Bdf3X0KAVZEsOPxSNvLIh3lykzuccjdE9uYjv7QymGt6kb+HYwcozccpfTfMQWF1L9myWhwkg2KnAvI7yRu3gNZ/N06MUjtNTFolxkaQoDNnj/7OaIdr+ye3mLXRBxnCuLzAxDGU2q5G7VyZiJfFVXEaq6DAgMBAAECggEAGOmHonasqHAlCFnPocM5I+kj1GK1Snjd/X0qW4CPPzouvKt0rFqjM7Jf/60DrulvRjxxjm52VCuHGAAPnWevTgetcMaCw9qIxWfi1hTsGJIkyT8jUWquPGVelJuEa8+jhqg2w7rMT3tZaBH7sOyFWatLHQ4uqPT0Uq5g1ai/OpZsICcncZDoYoPsJvFULUZe5nYJh1gpUba5hwiJ5f25FtE0YN8obk9rhft4DFs+sHElr5PzjWcJ+NcClziK3hKv3b5hA7UdE34855PQpfvsMcq8KMi1pvCW0pjeITNgrxK64iKWg4+y8TQL2LkJ6LjgDRbH0sdJJqJuSfqOfrp9IQKBgQDggdWfxt5JzfMyLOUF8oJ/FnZESiXaRsZsiLkg+5tIDqn99hDRn8BatffHla919vwGNmuJCyl4wsKSGqunrKexYXBKgc4CKrchIYVrPs2RpkPRmMH1JvFybtmuT4g1EDLaNyFbTwzCcRwT6O3QXIEZ9jJQ+lRDjc7Gz/WyiJGIXwKBgQDd8pUCeQ70UvOMghq4mJ2kUeG/KrZ6SbMLltNpnC/HkuwyXLXYXOqpzLkGgZsLROhyd3EVbZOy7aUo4dkRLVO1VjxKeoSFocewHF7QNSuQ/RIHw6NCnYEYeODNylbuZhmktyUxiUAnZByl1EZBSl4MmvA9tgQ+EqC6xLDGebZcXQKBgQCtkjOCr9Gz5dIb/LGkA3X4o3kUGu9g7k8CIkJeyaen8g5jFhayunuQphbG62cYILeAZhqFfWe2wXyEULJdlBKiBN83+1s2OagTqULpQ0jTTmQoa52o107cVe9d4IdB3yAxrWXQnjETMzet/Ou/p4T4eWs1SBRVlhFDjAw813EMqQKBgQDVzKdD8Y+5Rer8kBvjdIhu0L2wpBmR5UrHQCw5UM4p5tsGjI5TdPZMSTx3CwRqr59nHK3fYWXk982geybZyBsZ1I9Rg4IDJFuyxzGCSaXFDjN/LTMoqYbBJzgOpPpmvg23wQDgHgGhsGt0Ru7CWDwO0nXYTGz7yn/wSiarmnVTtQKBgHmE8lv3xtTCv9rWHrA/QQWHPRPWaPaglO4i3yR6Ty/QLtfDA6xonqT+rjmsz0wtV+OtLUEI6G2euJubpvKIF+/LY+U18b3AKH5a8jOwlvDmfL7lXD/fnS/HXdC3+zcQZrkI4z**********";//公钥或私钥
$begin_key ="-----BEGIN PRIVATE KEY-----\r\n";//-----BEGIN PUBLIC KEY-----
$end_key ="-----END PRIVATE KEY-----\r\n";//-----END PUBLIC KEY-----
$fp = fopen($filename,'ab'); 
fwrite($fp,$begin_key,strlen($begin_key)); 
$raw = strlen($key)/64;
$index = 0; 
while($index <= $raw ) {
  $line = substr($key,$index*64,64)."\r\n"; 
  if(strlen(trim($line)) > 0)
  fwrite($fp,$line,strlen($line)); 
  $index++; 
} 
fwrite($fp,$end_key,strlen($end_key)); 
fclose($fp);
