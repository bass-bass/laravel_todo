
# todo

Todoアプリ用のプロジェクトになります。

# Folder Structure
説明するフォルダはMVCに関係するものに絞ります。

| フォルダ | 解説 |
| --- | --- |
| /routes/ | ルーティング用のファイルが配置されています。Controllerを |
| /app/Http/Controllers/ | Controller層のファイルが配置されています。Modelの呼び出し、viewの生成はこの階層で行ってください。 |
| /app/Models | Model層のファイルが配置されています。DB操作はこの階層で行ってください。 |
| /resources/views | View層のファイルが配置されています。画面用のファイルはここに配置してください。 |

# 補足

## よく使うコマンド
下記のコマンドはコンテナに入ってから行って下さい。
端末にphpとlaravelがインストールされている場合は実行できますが、コンテナ内での実行をおすすめします。

php artisan route:list
ルーティング設定を一覧表示するコマンド

php artisan make:controller {任意の名前}
コントローラークラス作成用のコマンド、任意の名前の部分に「HogeController」と指定した場合は
/app/Http/Controllers/直下に Controllerクラスを継承した HogeController.php が作成される。

php artisan make:model Models/{任意の名前}
モデルクラス作成用のコマンド、任意の名前の部分に「HogeModel」と指定した場合は
/app/Models直下に Modelクラスを継承した HogeModel.php が作成される。

## MVCの一通りの流れ
Todoリスト取得処理を作成するまでの流れを説明します。
(サンプルコード `feature/create_sample_code` を元に説明しています。実装内容を確認したい場合はそちらをどうぞ)
例：http://127.0.0.1:10081/todo/list にアクセスした際にTodoリスト一覧画面が表示されるアプリ
```
(1) Modelクラスを作成
下記コマンドを実行し空のModelクラスを作成する。
php artisan make:model Models/TodoModel
(2) ModelクラスにDBからレコードを取得する処理を作成する
(3) Controllerクラスを作成
下記コマンドを実行し空のControllerクラスを作成する。
php artisan make:controller TodoController
(4) Controllerクラスに関数を追加する
2で作成したModelの処理を呼び出し、viewファイルを用いて画面を生成する処理を作成する。
(5) viewファイルを作成する
(6) ルーティング設定を追加する
/routes/web.phpに↓を追記する。
Route::get('/todo', 'TodoController@{関数名}');

```
