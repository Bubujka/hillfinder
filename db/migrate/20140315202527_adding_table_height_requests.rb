class AddingTableHeightRequests < ActiveRecord::Migration
  def up
    create_table "height_requests" do |t|
      t.timestamp :created, null:  false
      t.decimal :latitude, precision: 10, scale: 6
      t.decimal :longitude, precision: 11, scale: 6
      t.decimal :height, precision: 7, scale: 2
      t.integer :ip, limit: 5
    end

    execute "
      ALTER TABLE 
        height_requests
      CHANGE 
        created created 
      TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
  end

  def down
  end
end
