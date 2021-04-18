# 20210330_register_php_mysql_practice

20210418 \
嘗試使用PHP-MySQL做會員註冊和登入系統 \
使用 20210202_html-css-bootstrap_practice 註冊頁做練習。

將資料庫資訊置於config.php，未連接則報錯。\
表單端可直接判別是否為具@的mail，PHP部分首先確認POST的值是否為空白，為非則使用trim()將值去空白並執行query。\
query部分嘗試使用替換符及使用PDO物件確保做到安全讀寫資料庫。\
註冊密碼於寫入前使用password_hash()將密碼雜湊後才寫入。


- 尚未練習AJAX，未能即時從資料庫驗證帳號存在與否？
- 未使用Session儲存登入資訊
- 登出功能？

AWS:\
www.example.com


![0110](https://user-images.githubusercontent.com/63532421/115154159-0a25ca80-a0ac-11eb-9868-3c56add34f2e.PNG)

