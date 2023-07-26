
# laravelを用いた簡易SNSアプリケーション

# Requirements

・Docker for Mac

<https://docs.docker.com/docker-for-mac/install/>

・brew

```
/bin/bash -c "$(curl -fsSL <https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh>)"
```

・docker-compose

`brew install docker-compose`

# Folder Structure

| フォルダ | 解説 |
| --- | --- |
| apps | Laravelのプロジェクトが配置されています。 |
| docker | 各サーバーの設定ファイル(Dockerfile)等が配置されています。 |

# How To Use

## 環境構築手順

(1) リポジトリをクローンする。
ターミナルを開いて適当なディレクトリで下記コマンドを実行する。
* `git clone git@github.com:bass-bass/laravel_todo.git`

(2) コンテナを起動する
クローンしたディレクトリの直下に移動して下記コマンドを実行する
* `docker-compose up -d --build`

(3) 環境ファイルを置換
下記コマンドを実行して環境定義ファイルを置換する。
* `cp apps/todo/.env.example apps/todo/.env`

(4) appコンテナの整備
* アプリケーション用のコンテナに入る
    * `docker exec -it app bash `
* laravelをインストール
    * `composer update`
* マイグレーション実行
    * `php artisan migrate`

(5) WebブラウザでLaravelの画面を確認

http://127.0.0.1:10081/


## よく使うコマンド

`docker ps` : 起動しているコンテナを一覧表示する

`php artisan migrate` : マイグレーションを実行してテーブルを作成・更新する

`php artisan migrate:rollback` : マイグレーションで実行した内容を戻す
