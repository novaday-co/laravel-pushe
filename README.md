<p align="center">
<img src="https://raw.githubusercontent.com/farazin-co/laravel-pushe/23b10dc125ecaa85808b1346570f9bc41df0afa3/assets/pushe-logo.svg" height="70" alt="Laravel Pushe Package" /><br>
Laravel Pushe - لاراول پوشه
</p>

<hr>

<p dir="rtl">
  ارسال نوتیفیکیشن <b>پوشه</b> در لاراول  <br>
</p>

```php

  $pushe = new Pushe;
  $response = $pushe->setFilters([
      'tags' => [
          'user_id' => '123',
      ]
  ])
  ->setData([
      "title" => "This is a filtered notification",
      "content" => "Only users already subscribed to filter can see me",
  ])->send();

```

<hr>

<p dir="rtl">
  نصب پکیج
</p>

```composer
composer require farazin-co/laravel-pushe
```

<p dir="rtl">
  ایجاد فایل کانفیگ - توکن و اپ آی دی را حتما تنظیم کنید
</p>


```composer
php artisan vendor:publish --provider="farazin-co\laravel-pushe\PusheServiceProvider"
```

<p dir="rtl">
  متد های قابل استفاده
</p>


```
setToken توکن جدیدی را روی توکن کانفیگ بیندازید
setAppIds آی دی اپ جدیدی را روی توکن کانفیگ بندازید
setData ست کردن دیتا
setFilters ست کردن فیلتر - دسته بندی
setTags ست کردن مستقیم تگ
setTopics ست کردن تاپیک
send ارسال نوتیفیکیشن

```
  
  
