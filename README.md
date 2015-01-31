# PHP Utility Library

PHPでよく使うような処理とかクラスとかをざっくりとまとめて行く予定。
基本的な機能はutil.phpをベースに、必要な物を付け加えていく方針

ターゲットとしてはモックアップ制作時用のスピード改善Utilityをメインに

## Chatbox\Arr

配列操作。fuelphp Arrクラスベース

## Chatbox\CDN

各種CDN文字列の生成。モックアップ製作用

## Chatbox\HTTP

各種HTTP関連処理。ヘッダの出力、リダイレクト等

### TODO

- content type関連ヘルパー
- json header
- ダウンロードヘッダー

## Chatbox\Input

スーパーグローバルの操作

### TODO

- インプットフィルタ
- hydrate関連の処理

## Chatbox\PHPUtil

カテゴリに入らないもの

## Chatbox\Str

文字列関連処理。ランダム文字列生成等

### TODO

- レターテーブルの差し込み

### TODO

- ロレム生成器

## Chatbox\View

ビュー関連処理。

### TODO

- オブジェクト対応
- ビューフィルタ



## 謝辞

構成にあたり、以下のコードを参考にさせて頂いています。

[https://github.com/brandonwamboldt/utilphp](https://github.com/brandonwamboldt/utilphp)
[https://github.com/fuel/core](https://github.com/fuel/core)