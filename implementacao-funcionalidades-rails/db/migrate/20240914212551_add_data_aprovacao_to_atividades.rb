class AddDataAprovacaoToAtividades < ActiveRecord::Migration[7.1]
  def change
    add_column :atividades, :data_aprovacao, :date
  end
end
