# capsuleLink
### 推し活をより安全に。トイカプセル専門の個人間交換プラットフォーム

<table>
  <tr>
    <td width="50%" align="center">
      <img src="https://github.com/user-attachments/assets/67cfc9b7-b0f4-4067-a6be-d76183f0e45b" alt="トップ画面" style="max-width:100%;">
      <br><b>トップ画面</b>
    </td>
    <td width="50%" align="center">
      <img src="https://github.com/user-attachments/assets/fc3b26de-4006-4497-858e-42bb50d4c2d1" alt="出品画面" style="max-width:100%;">
      <br><b>出品画面</b>
    </td>
  </tr>
  <tr>
    <td width="50%" align="center">
      <img src="https://github.com/user-attachments/assets/58099b83-78c6-4ef7-983c-15173dda76d7" alt="検索画面" style="max-width:100%;">
      <br><b>検索画面</b>
    </td>
    <td width="50%" align="center">
      <img src="https://github.com/user-attachments/assets/ff7ace27-b372-4235-b0ee-bbe53ddbf034" alt="メッセージ画面" style="max-width:100%;">
      <br><b>メッセージ画面</b>
    </td>
  </tr>
</table>

## 📋 サービス概要
[cite_start]「ダブったガチャガチャを交換したい」「SNSでの個人間取引は住所公開などの心理的ハードルが高い」という課題を解決するための、トイカプセル交換専用のマッチングサービスです。 [cite: 6, 7]

## ✨ 主な機能
- [cite_start]**アイテム出品・管理機能**: 最大4枚の画像投稿に対応。商品の細かな状態まで共有可能です。 [cite: 24]
- [cite_start]**トレンド表示**: 「人気の商品」や「最新の商品」をトップページに配置し、今注目されているアイテムを一目で把握できます。 [cite: 9, 13]
- [cite_start]**リアルタイムチャット**: 交換の待ち合わせや詳細確認のための専用スレッド。 [cite: 16]
- [cite_start]**安全ガイドライン表示**: トラブル防止のため、公共の場での取引を促すメッセージを常設。 [cite: 66, 68]
- **お気に入り機能**: 気になるアイテムを保存し、後から比較検討が可能。

## 💡 こだわったポイント（課題解決）

### 1. 取引の透明性を高める画像複数投稿（1対多リレーション）
- **課題**: 1枚の画像では商品の裏面の傷やパッケージの有無が判別できず、取引トラブルの原因になっていました。
- [cite_start]**解決**: `ListedItem`テーブルと`Images`テーブルを1対多で構成。最大4枚の画像を投稿可能にし、DBトランザクションを用いてデータの整合性を高めました。 [cite: 24]

### 2. ユーザーを迷わせない動線設計
- **課題**: 初めてのユーザーが「何をすればいいか」迷い、離脱してしまう懸念。
- [cite_start]**解決**: トップ画面の最も目立つ位置に「使い方を見る」ボタンを配置し、直感的なコピーと併せてスムーズな利用開始をサポートします。 [cite: 8]

### 3. モバイルファーストなUI/UX設計
- **課題**: 交換場所（イベント会場付近など）ではスマホ操作が主となるため、PC向けの複雑な操作は不向きでした。
- [cite_start]**解決**: 親指一本で主要機能へアクセスできる「ボトムナビゲーション」を採用。 [cite: 16, 45, 81] また、画像閲覧にはCSSのスクロールスナップを活用し、片手でスワイプして状態を確認できるスライダーを実装しました。

### 4. トラブルを未然に防ぐ安全設計
- **課題**: 個人間取引における「密室での接触」や「マナー違反」のリスク。
- [cite_start]**解決**: チャット画面上部に「駅や公園などの公共施設」での交換を具体的に推奨するガイドラインを常設。 [cite: 68] システム面からユーザーの安全意識を高める工夫をしました。

## 🛠 使用技術
### Backend
- [cite_start]**PHP 8.2 / Laravel 10.x** [cite: 20]
- **MySQL** (データベース設計・Eloquent ORM)
- **DB Transaction**: 複数テーブルへのデータ整合性を担保

### Frontend
- **Tailwind CSS**: レスポンシブデザインの高速実装
- **Blade Template Engine**: コンポーネント化によるコードの再利用
- **JavaScript (Alpine JS / Vanilla JS)**