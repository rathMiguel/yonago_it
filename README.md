## i+開発について

ウェブサイト作成用のテンプレートです。主に以下の機能を実装しています。

* Pug,Scss,CoffeeScriptのコンパイル、ライブプレビュー
* 画像の最適化
* ファビコンの生成
* スタイルガイド（aigis）の作成

## 事前準備
動作には下記の環境が必要です。バージョンが古い場合、動作しない場合がありますのでご注意ください。

* [NodeJS](https://nodejs.org/) - ^4.2.4
* [Gulp](http://gulpjs.com/) - 3.9.1
* [Bower](http://bower.io/)

## セットアップ
ダウンロード、作成ディレクトリまで移動後、下記コマンドを入力してnpmパッケージをインストールします。

#### 1.npmパッケージのインストール

```
npm install
```

macの場合
```
sudo npm install
```

#### 2.Bowerパッケージのインストール

```
bower install
```

#### 3.ページのビルド、初期セットアップ

```
gulp build
```

## 主なGulpコマンド
### gulp
Scss,Pug,coffeeのファイルの監視、コンパイル。ブラウザが立ち上がります。

### gulp minify
css、jsファイルの圧縮。

### gulp cleanup
publicディレクトリ上の不要ファイルの削除。公開前に行う

### gulp styleguide
スタイルガイド（aigis）の生成、プレビュー。localhost:3002でスタイルガイドが見れるようになる。

### gulp imagemin
画像ファイルの最適化、public/へセットされる。

### gulp favicon
ファビコン、Apple Touch Icon等の生成、実装
