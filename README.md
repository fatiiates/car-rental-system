## CANLI UYGULAMA
Free Web Hosting Area sitesi üzerinde ücretsiz olarak canlı yayındadır. Aşağıdaki linklerden de kodlara ulaşabilirsiniz.

> Link: http://demo-arac-kiralama.ueuo.com/  
> Admin: http://demo-arac-kiralama.ueuo.com/panel/login.php

## GEREKSİNİMLER
Php ile yazılmıştır dolayısıyla bir apache web sunucusuna ihtiyacınız olacaktır. Apache web sunucunuz yoksa indirmek için;
> Local Host: https://www.appserv.org/en/

Eğer ki sunucuyu yeni kurduysanız, bilgisayarınızın ana dizininde AppServ klasörünün içerisindeki "www" klasörüne gidin ve index.php adlı dosyayı index1.php olarak güncelleyin. Bu güncelleme sizin localhost dizinini tarayıcı üzerinden listelemenizi sağlayacaktır.

Veri tabanı olarak MySQL sunucusu gerektirmektedir. Yukarıdaki linkten kurulum yaptıysanız MySQL sunucunuz da varsayılan olarak localhost:3006 üzerinde çalışıyor olacaktır. Yerel MySQL sunucusu indirmek için;
> Mysql Workbench: https://www.mysql.com/products/workbench/

 ## KURULUM

1. Bilgisayarınızın ana dizininde bulunan AppServ klasörünün içerisindeki "www" klasörünün içerisine "car-rental-system" adında bir klasör oluşturun. 
2. Depoyu indirdikten sonra tüm .git, .gitignore ve .gitattributes dosyaları hariç tüm dosyaları "car-rental-system" klasörüne kopyalayın. 
3. Ardından "panel" dizinin içerisindeki vt.zip dosyasını başka bir dizine kopyalayın. 
4. Daha sonra arşivi çıkarın ve .sql dosyasını MySQL sunucunuz üzerinde restore edin. 
5. Restore etmek için şu adımları izleyebilirsiniz;
> https://support.managed.com/kb/a2034/how-to-backup-and-or-restore-your-mysql-database-using-phpmyadmin.aspx  
> https://help.fasthosts.co.uk/app/answers/detail/a_id/1404/~/back-up-and-restore-mysql-databases-using-mysql-workbench-5

Artık web sayfanız hazır. Tarayıcıya localhost yazarak listelenen dizinden "car-rental-system" linkine tıklayın ve karşınızda siteniz.
