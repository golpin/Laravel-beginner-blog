# Name
 
Laravel-beginner-blogはLravelBreezeを用いてマルチログインに対応した初歩的なCRUD機能を有するブログアプリです。  
ゲスト・ユーザー・管理者ごとに機能を分けています。　
 
# DEMO
 
 
# Features
 
 機能の紹介  
 1.ゲスト(ログインしていない状態)  
 ・ブログ一覧画面の閲覧  
 2.ユーザー  
 ・ブログ一覧画面の閲覧  
 ->自分の投稿のみ、モーダルに更新・削除ボタンが表示され機能の使用が可能  
 ・ブログ投稿画面  
 ->画像投稿も可能  
 3.管理者  
 ・ブログ一覧画面の閲覧  
 ->任意のブログ記事を削除可能。更新は不可。  
 ・ユーザーリスト  
 ->任意のユーザーを削除出来る  
 ->削除されたユーザーの記事は全て削除される  
 
# Installation
 
1.cd Laravel-beginner-blog  
2.composer install  
3.npm install  
4.npm run dev  
5.php artisan migrate (.envが必要です)
6.php artisan storage:link (シンボリックリンクをはります)  
7.php artisan serve

 
# Usage
 


# License

Laravel-beginner-blog is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).

