## html+phpのCRUDサンプル
---

##### 1. Create(登録)
##### 2. Read(一覧)
##### 3. Update(編集)
##### 4. Delete(削除)  

これを頭文字をとって**『CRUD(クラッド)』**というみたいです。  
webサイトを構築する上で必ず必要な機能なので振り返りように...  
- my_items  
  - id  
  :primarykey
  - maker_id
  - item_name
  - price
  - keyword
  - created
  - modified  
- makers
  - id  
  :primarykey
  - name
  - address
  - tel
- crats
  - id  
  :primarykey
  - item_id
  - count
