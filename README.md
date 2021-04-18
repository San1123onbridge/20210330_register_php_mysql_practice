# 20210330_register_php_mysql_practice

20210418 \
嘗試使用PHP-MySQL做會員註冊和登入系統 \
使用 20210202_html-css-bootstrap_practice 註冊頁做練習。

表單端可直接判別是否為具@的mail，PHP部分首先確認POST的值是否為空白，為非則使用trim()將值去空白並執行query。\
query部分嘗試使用替換符及使用PDO物件確保做到安全讀寫資料庫。


- 尚未練習AJAX，未能即時從資料庫驗證帳號存在與否？
- 未使用Session儲存登入資訊
- 登出功能？

AWS:\
www.example.com



![1242](https://user-images.githubusercontent.com/63532421/115153375-2b84b780-a0a8-11eb-818b-fb61304b7a7e.PNG)
