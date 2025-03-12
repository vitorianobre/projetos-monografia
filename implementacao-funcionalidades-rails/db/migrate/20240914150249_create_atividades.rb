class CreateAtividades < ActiveRecord::Migration[7.1]
  def change
    create_table :atividades do |t|
      t.string :acao_extensao
      t.string :tipo
      t.date :data_submissao, default: -> { 'CURRENT_DATE' }
      t.integer :horas
      t.string :situacao, default: "Em análise"

      t.timestamps
    end
  end
end
